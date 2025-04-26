<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasswordProtected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $password = 'rahasia123'; // Ganti dengan password yang diinginkan

        if ($request->session()->get('auth_pass') !== $password) {
            if ($request->isMethod('post') && $request->input('password') === $password) {
                $request->session()->put('auth_pass', $password);
                return redirect($request->url()); // Redirect ke halaman yang sama
            }

            return response()->view('auth.password_protected');
        }

        return $next($request);
    }
}
