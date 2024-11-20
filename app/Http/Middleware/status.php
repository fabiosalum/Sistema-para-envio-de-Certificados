<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class status
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && (int) Auth::user()->status === 0) {
            Auth::logout();

            // Redireciona o usuário com uma mensagem de erro na sessão
            return redirect()->route('login')->with([
                'swal_error' => 'Sua conta está desativada. Por favor, contate o administrador.',
            ]);
        }

        // Retorna a próxima ação no pipeline
        return $next($request);
    }
}
