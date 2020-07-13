<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class Check419 {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $response = $next($request);

        $acceptable = $request->getAcceptableContentTypes();

        if ($response->status() === 419) {
            Auth::logout();
            Session::flush();

            if (isset($acceptable[0]) && Str::contains($acceptable[0], ['/json', '/html', '+xml'])) {
                $response->setContent('<script>window.parent.location="/login"</script>');
                return $response;
            }

            return redirect()->to('/login');
        }

        return $response;
    }
}
