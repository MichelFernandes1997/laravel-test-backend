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
        if ((!is_null(Contrato::find($request->id))) && (Contrato::find($request->id)->email_verified_at !== null))
            dd('Olá');// return redirect()->route('hasVerified.show');
        else if (Imovel::find($request->id)->email_verified !== null)
            return redirect()->route('hasVerified.show');
        else
            return $next($request);
    }
}
