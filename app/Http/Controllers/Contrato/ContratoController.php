<?php

namespace App\Http\Controllers\Contrato;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contrato;
use App\Imovel;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

class ContratoController extends Controller
{
    /**
     * Method with responsability of the return a list of contracts
     * 
     * @return \Illuminate\Http\Response response
     */
    public function index()
    {
        return response()->json(['contratos' => Contrato::all()]);
    }

    /**
     * Method with responsability of the create a new contract
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response response
     */
    public function store(Request $request)
    {
        try {    
            $contrato = Contrato::create([
                'tipo_pessoa' => $request->tipo_pessoa,
                'emailContratante' => $request->emailContratante,
                'documento' => $request->documento,
                'imovel_id' => $request->imovel_id,
                'nomeContratante' => $request->nomeContratante,
                'email_verified_at' => null
            ]);
            
            $imovel = Imovel::find($request->imovel_id);

            $imovel->contrato_id = $contrato->id;

            $imovel->save();

            $data = ['message' => 'Confirme o e-mail por favor!', 'uri' => 'contrato', 'emailToConfirm' => $contrato->emailContratante, 'id' => $contrato->id];
            
            Mail::to($contrato->emailContratante)->send(new VerifyEmail($data));
            
            return response()->json(['data' => $request->toArray()], 201);
        } catch (Exception $e) {
            return response()->json(['err' => $e], $e->getStatusCode ?? 500);
        }
    }
}
