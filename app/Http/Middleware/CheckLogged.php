<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CheckLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // nếu tồn tại session
        if ($request->session()->exists('id')) {
            // Thi cho no di tiep
            return Redirect::route('welcome');
        } else {
            // Nguoc lai thi quay ve trang login
            return $next($request);
        }
    }
}
