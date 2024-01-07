<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class CheckOTP
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('user_otp')) {
            return redirect()->route('otp_index');
        }

        return $next($request);
    }
}
