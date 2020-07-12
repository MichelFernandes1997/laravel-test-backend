<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contrato;
use App\Imovel;
use Carbon\Carbon;

class VerifiedEmail extends Controller
{
    public function verifiedShow()
    {
        return view('email.hasVerified');
    }

    public function verifyEmailContratante(Request $request)
    {
        $contrato = Contrato::where('id', $request->id)->first();

        if (hash('sha512', $contrato->emailContratante) === $request->token) {
            $contrato->email_verified_at = Carbon::now()->toDateTimeString();
            
            $contrato->save();
        }

        return redirect()->route('hasVerified.show');
    }

    public function verifyEmailProprietario(Request $request)
    {
        $imovel = Imovel::where('id', $request->id)->first();
        
        if (hash('sha512', $imovel->emailProprietario) === $request->token) {
            $imovel->email_verified_at = Carbon::now()->toDateTimeString();
            
            $imovel->save();
        }

        return redirect()->route('hasVerified.show');
    }
}
