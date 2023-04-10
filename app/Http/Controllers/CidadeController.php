<?php

namespace App\Http\Controllers;

use App\Models\Cidade;

use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return Cidade::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $cidade = new Cidade();
        $cidade->nome = $request->nome;
        $cidade->estado = $request->estado;
        $cidade->sinal = $request->sinal;
        $status = $cidade->save();

        if($status){
            return response("Cidade adicionada", 201);
        }
        return response("Ocorreu algum erro",400);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCidadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCidadeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
     $cidade = Cidade::where('nome', '=', $request->nome)->first();
        if (!$cidade) {
            return response()->json([
                'message' => 'Cidade não encontrada!',
            ], 404);
        }

        return response()->json($cidade, 200);
    }

    public function update(Request $request) {
        $cidade = Cidade::where('nome', '=', $request->nome)->first();
        $cidade->estado = $request->estado;
        $status = $cidade->save();

        if($status){
            return response("Cidade alterada", 200);
        }
        return response("Ocorreu algum erro",400);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $cidade = Cidade::where('nome', '=', $request->nome)->first();
        $status = $cidade->delete();
        if($status) {
            return response("Cidade deletada com Sucesso", 200);
        }
        return response("Ocorreu algum erro",400);
        
    }
}
