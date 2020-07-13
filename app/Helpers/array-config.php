<?php

use Illuminate\Support\Facades\App;

if (!function_exists('google_bar_chart_options')) {
    function google_bar_chart_options($params = []) {
        $default = [
            "chartArea"       => [
                "width"           => '65%',
                "height"          => '85%',
                "backgroundColor" => "none",
            ],
            "bar"             => [
                "groupWidth" => "20",
            ],
            "backgroundColor" => "none",
            "opacity"         => 0.7,
            "legend"          => "none",
            "theme"           => "maximized",
            "vAxis"           => [
                "textPosition" => "out",
                "textStyle"    => [
                    "auraColor" => "none",
                    "color"     => "black",
                    "bold"      => true,
                ],
            ],
            "hAxis"           => [
                "textPosition" => "out",
                "textStyle"    => [
                    "auraColor" => "none",
                    "color"     => "black",
                    "bold"      => true,
                ],
                "baseline"     => "automatic",
                "logScale"     => true,
            ],
            "annotations"     => [
                "alwaysOutside" => true,
            ],
        ];

        if (!empty($params['colors']))
            $default["colors"] = [$params['colors']];

        return $default;
    }
}

if (!function_exists('google_donut_chart_options')) {
    function google_donut_chart_options($params = []) {
        $default = [
            "chartArea"       => [
                "width"           => '95%',
                "backgroundColor" => "none",
            ],
            "backgroundColor" => "none",
            "opacity"         => 0.5,
            "legend"          => [
                "position"  => "right",
                "alignment" => "center",
                "maxLines"  => 5,
            ],
            "pieSliceText"    => "label"
//            "colors"          => [
//                "#2AB7CA",
//                "#FE4A49",
//                "#FED766",
//                "#9046CF",
//                "#E6E6EA",
//                "#555555",
//            ],
        ];

        if (Agent::isMobile()) {
            $default['chartArea']['height'] = "80%";
        } else {
            $default['chartArea']['height'] = "90%";
        }

        if ($params && is_array($params)) {
            foreach ($params as $key => $value) {
                $default[$key] = $value;
            }
        }

        return $default;
    }
}


if (!function_exists('google_line_chart_options')) {
    function google_line_chart_options($params = []) {
        $default = [
            "pointsVisible"   => true,
            "lineWidth"       => 3,
            "chartArea"       => [
                "width"           => '95%',
                "height"          => '75%',
                "backgroundColor" => "none",
            ],
            "backgroundColor" => "none",
            "legend"          => "none",
            "theme"           => "maximized",
            "vAxis"           => [
                "textPosition" => "none",
                "textStyle"    => [
                    "auraColor" => "none",
                    "color"     => "black",
                    "bold"      => true,
                ],
                "baseline"     => 0,
            ],
            "hAxis"           => [
                "textPosition" => "out",
                "textStyle"    => [
                    "auraColor" => "none",
                    "color"     => "black",
                    "bold"      => true,
                ],
                "baseline"     => "automatic",
            ],
            "annotations"     => [
                "alwaysOutside" => true,
            ],
        ];

        if (!empty($params['colors']))
            $default["colors"] = $params['colors'];

        return $default;
    }
}

if (!function_exists('no_annotation')) {
    function no_annotation($from, $to) {
        $from = \Carbon\Carbon::create($from);
        $to = \Carbon\Carbon::create($to);
        return $from->diffInDays($to) > config('app.dashboard.sub_day', 7);
    }
}
