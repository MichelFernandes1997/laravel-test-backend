<?php

namespace App\Http\Controllers\Imovel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateImovelRequest;
use App\Http\Resources\ImovelCollection;
use Illuminate\Support\Facades\Input;
use App\Imovel;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $imoveis = Imovel::orderByDesc('id')->paginate('8');
        
        return new ImovelCollection($imoveis);
    }

    /**
     * Display a listing of the resource with orderBy especific attribute.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function orderBy($order)
    {
        $search = explode(',', $order);
        
        $ordered = Imovel::orderBy($search[0], $search[1])->paginate('8');

        return new ImovelCollection($ordered);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateImovelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateImovelRequest $request)
    {
        try {
            $newImovel = Imovel::create($request->toArray());

            return response()->json(['data' => $newImovel], 201);
        } catch (\Exception $e) {
            return response()->json(['err' => $e], $e->getStatusCode ?? 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleted = Imovel::destroy($id);

            return response()->json("deleted", 201);
        } catch (Exception $e) {
            return response()->json(['err' => $e->getMessage()], $e->getStatusCode ?? 500);
        }
    }
}
