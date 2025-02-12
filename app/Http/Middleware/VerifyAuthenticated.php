<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()) {
            return redirect('/nutricion')
                ->with('message', 'Debes iniciar sesión para acceder a esta página');
        }
        
        $user = Auth::user();
        if($user->email === 'admin@admin.com'){
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
