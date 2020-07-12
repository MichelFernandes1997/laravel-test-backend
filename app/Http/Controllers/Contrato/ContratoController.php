<?php

namespace App\Http\Controllers\Contrato;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contrato;

class ContratoController extends Controller
{
    /**
     * Method with responsability of the return a list of contracts
     * 
     * @return \Illuminate\Http\Response response
     */
    public function index()
    {

    }

    /**
     * Method with responsability of the create a new contract
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response response
     */
    public function store(Request $request)
    {
        $contrato = Contrato::create($request->toArray());

        return response()->json(['data' => $contrato], 201);
    }
}
