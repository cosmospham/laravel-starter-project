<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

if (!function_exists('string_sanitize')) {
    function string_sanitize($string) {
        if (empty(trim($string))) return '';

        $string = str_replace(
            [
                '-', '(', ')', ' )', '( ', '（', '）', '–', '—', '?'
            ],
            [
                ' - ', ' (', ') ', ') ', ' (', ' (', ') ', '-', '-', ''
            ],
            $string
        );
        $string = preg_replace('/—$/u', '', $string);
        $string = mb_smart_case_title(mb_convert_case(
            mb_strtolower(
                trim(
                    remove_multiple_white_space($string),
                    " \t\n\r\0\x0B-_"
                ),
                'UTF-8'
            ),
            MB_CASE_TITLE_SIMPLE
        ));
        return $string;
    }
}

if (!function_exists('remove_multiple_white_space')) {
    function remove_multiple_white_space($string) {
        if (empty(trim($string))) return '';
        return preg_replace('/[\s\t]+/', ' ', preg_replace('/–$/u', '', $string));
    }
}

if (!function_exists('mb_smart_case_title')) {
    function mb_smart_case_title($string) {
        if (empty(trim($string))) return '';

        $string_arr = explode(' ', $string);

        if (!$string_arr) return trim($string);

        foreach ($string_arr as $key => $value) {
            if (
                preg_match('/^[0-9]+/', $value)
                || preg_match('/^\(.+\)$/', $value)
                || string_uppercase_exception($value)
            )
                $string_arr[ $key ] = mb_strtoupper($value);
        }

        return implode(' ', $string_arr);
    }
}

if (!function_exists('string_uppercase_exception')) {
    function string_uppercase_exception($string) {
        if (empty(trim($string))) return false;

        return in_array(mb_strtolower($string), ['ttkt', 'vn', 'cdp', 'sla', 'test', 'fb', 'hq']);
    }
}

if (!function_exists('santinize_lookalike_characters')) {
    function santinize_lookalike_characters($string) {
        if (empty(trim($string))) return '';

        $string = str_replace(
            [
                '-', '(', ')', ' )', '( ', '（', '）', '–', '—',
            ],
            [
                ' - ', ' (', ') ', ') ', ' (', ' (', ') ', '-', '-',
            ],
            $string
        );
        return trim(
            remove_multiple_white_space($string),
            " \t\n\r\0\x0B-_—"
        );
    }
}

if (!function_exists('num_format')) {
    function num_format($number) {
        $number = (int)$number;
        return number_format($number, 0, '.', ',');
    }
}

if (!function_exists('remove_han')) {
    function remove_han($string) {
        if (empty(trim($string))) return '';

        return trim(
            preg_replace("/\p{Han}+/u", '', remove_multiple_white_space($string)),
            " \t\n\r\0\x0B-_—"
        );
    }
}

if (!function_exists('remove_not_han')) {
    function remove_not_han($string) {
        if (empty(trim($string))) return '';

        return trim(
            preg_replace("/[^\p{Han}+]/u", '', remove_multiple_white_space($string)),
            " \t\n\r\0\x0B-_—"
        );
    }
}

function auto_remove_not_lang($value) {
    return (App::isLocale('en') || App::isLocale('vi'))
        ? remove_han($value)
        : remove_not_han($value);
}

if (!function_exists('number_format_short')) {
    function number_format_short($n, $precision = 1, $translate = false) {
        if (!is_numeric($n)) return $n;

        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 900000) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'K';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'M';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'B';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 'T';
        }

        // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
        // Intentionally does not affect partials, eg "1.50" -> "1.50"
        if ($precision > 0) {
            $dotzero = '.' . str_repeat('0', $precision);
            $n_format = str_replace($dotzero, '', $n_format);
        }

        if ($suffix && $translate) {
            $suffix = trans('dashboard.number-suffix.'.$suffix);
        }

        return $n_format . $suffix;
    }
}

if (!function_exists('simplify_district_name')) {
    function simplify_district_name($value) {
        if (empty(trim($value))) return '';

        if (preg_match('/[0-9]+/', $value)) return $value;
        return str_replace(['Huyện', 'Quận', 'Thị Xã', 'Thành Phố'], '', $value);
    }
}


if (!function_exists('acronym')) {
    function acronym($value) {
        if (empty(trim($value))) return '';

        $acronym = "";
        $words = explode(" ", $value);
        unset($words[ count($words)-1 ]);
        if (is_array($words) && count($words)) {
            foreach ($words as $w) {
                if (!preg_match('/[a-zA-Z]/u', $w[0])) return $value;
                $acronym .= $w[0];
            }
        } else {
            return $value;
        }
        return $acronym;
    }
}

if (!function_exists('percentage_diff')) {
    function percentage_diff($new, $old) {
        $text = '-';
        if ($new > $old && $old) {
            $text = '+'.( round((double)$new / (double)$old, 2) ).'%';
        }
        if ($new > $old && !$old) {
            $text = '+100%';
        }
        if ($new < $old && $new) {
            $text = '-'.( round((double)$old / (double)$new, 2) ).'%';
        }
        if ($new < $old && !$new) {
            $text = '-100%';
        }

        return $text;
    }
}

if (!function_exists('calc_percentage_from_report')) {
    function calc_percentage_from_report($bill, $col, $reverse = false) {
        $a = $bill->get(0, $col);
        $b = $bill->get(1, $col);
        if ($a + $b == 0) return 0;
        if ($reverse)
            return round( ( $b/($a + $b))*100, 0 );
        else
            return round( ( $a/($a + $b))*100, 0 );
    }
}


if (!function_exists('get_cache_key_from_params')) {
    function get_cache_key_from_params($params) {
        return md5(serialize($params).".".Auth::user()->id);
    }
}
