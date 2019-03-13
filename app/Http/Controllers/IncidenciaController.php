<?php

namespace App\Http\Controllers;

use App\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['incidencias'] = Incidencia::paginate(10);

        return view('incidencias.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incidencias.create');
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
            'entidad' => 'required',
        ]);

        Incidencia::create($request->all());

        return Redirect::to('incidencias')
       ->with('success','Bien! entidad creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incidencia  $entidad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incidencia  $entidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['entidad'] = Incidencia::where($where)->first();

        return view('incidencias.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incidencia  $entidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'entidad' => 'required',
        ]);

        $update = ['entidad' => $request->entidad];
        Incidencia::where('id',$id)->update($update);

        return Redirect::to('incidencias')
       ->with('success','Bien! Incidencia actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incidencia  $entidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Incidencia::where('id',$id)->delete();

        return Redirect::to('incidencias')->with('success','Incidencia eliminada con éxito');
    }
}
