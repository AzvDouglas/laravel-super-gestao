<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $auth_method, $perfil, $parametro3,)
    {
        //Verifica se o usuário tem acesso a rota
        echo $auth_method.'<br>';

        if ($auth_method == 'padrao') {
            echo 'Verificar o usuário e senha no banco.'.'<br>';
        }
        if ($auth_method == 'ldap') {
            echo 'Verificar Usuário e Senha no Active Directory.'.'<br>';
        }
        if ($perfil == 'visitante') {
            echo 'Exibir apenas alguns recursos'.'<br>';
        }

        if (false) {
            return $next($request);
        } else {
            return Response('Acesso Negado! Usuário não autenticado para esta rota. '.'<br>');
        }
    }
}
