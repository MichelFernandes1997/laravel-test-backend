<?php

namespace App\Http\Middleware;

use Closure;
use App\Contrato;
use App\Imovel;

class HasVerified
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
        if ((Contrato::find($request->id) !== null) && (Contrato::find($request->id)->email_verified_at !== null) && ($request->getPathInfo() === '/verify-email/contrato/'))
            return redirect()->route('hasVerified.show');
        else if ((Imovel::find($request->id) !== null) && (Imovel::find($request->id)->email_verified_at !== null) && ($request->getPathInfo() === '/verify-email/imovel/'))
            return redirect()->route('hasVerified.show');
        else
            return $next($request);
    }
}
