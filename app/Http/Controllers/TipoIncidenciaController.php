<?php

namespace App\Http\Controllers;

use App\TipoIncidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TipoIncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tipo_incidencias'] = TipoIncidencia::paginate(10);

        return view('tipo_incidencias.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_incidencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
        ]);

        TipoIncidencia::create($request->all());

        return Redirect::to('tipo_incidencias')
       ->with('success','Bien! tipo creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoIncidencia  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoIncidencia  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['tipo'] = TipoIncidencia::where($where)->first();

        return view('tipo_incidencias.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoIncidencia  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required',
        ]);

        $update = ['tipo' => $request->tipo];
        TipoIncidencia::where('id',$id)->update($update);

        return Redirect::to('tipo_incidencias')
       ->with('success','Bien! TipoIncidencia actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoIncidencia  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoIncidencia::where('id',$id)->delete();

        return Redirect::to('tipo_incidencias')->with('success','TipoIncidencia eliminada con éxito');
    }
}
