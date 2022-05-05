<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use http\Env\Response;
use Illuminate\Http\Request;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //dd($request);

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log'=>"IP $ip requisitou rota $rota"]);
        //return $next($request);


        $resposta = $next($request);
        $resposta->setStatusCode(201, 'Resposta HTTP alterada');
        //dd($resposta);
        return $resposta;


        //return Response('Cheguamos no Middleware sem dar prosseguimento');
    }
}
