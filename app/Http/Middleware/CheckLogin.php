<?php

namespace App\Http\Middleware;

use App\Http\Controllers;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CheckLogin
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
        // neu ton tai session 
        if ($request->session()->exists('id')) {
            // Thi cho no di tiep
            return $next($request);
        } else {
            // nguoc lai thi quay ve trang loginProcess
            return Redirect::route("login")->with('error', [
                "message" => 'Bạn chưa đăng nhập',
            ]);
        }
    }
}
