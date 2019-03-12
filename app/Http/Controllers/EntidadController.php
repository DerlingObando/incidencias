<?php

namespace App\Http\Controllers;

use App\Entidad;
use Illuminate\Http\Request;

class EntidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$rs = Entidad::all();
        //ORM TRANSFORMA UN REGISTRO DE LA DB EN OBJETO
        //return $rs;
        $entidades=Entidad::all();
        return view('Entidad.index',compact('entidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Entidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $entidad = new Entidad();
       // $entidad ->entidad = $request['entidad'];
       // $entidad ->save();
        //return $entidad;
        $this->validate($request,[ 'nombre'=>'required']);
        Entidad::create($request->all());
        return redirect()->route('entidad.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function show(Entidad $entidad, $id)
    {
        //$registroEncontrado = Entidad::find($id);
        //return $registroEncontrado;
        $entidades=Entidad::find($id);
        return  view('entidad.show',compact('entidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Entidad $entidad, $request)
    {
        //$entidad = Entidad::find(1);
        //$entidad->entidad = $request['entidad'];
        //$entidad->save();
        $entidad=entidad::find($id);
        return view('entidad.edit',compact('entidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entidad $entidad)
    {
        //$this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required', 'npagina'=>'required', 'edicion'=>'required', 'autor'=>'required', 'npagina'=>'required', 'precio'=>'required']);

        entidad::find($id)->update($request->all());
        return redirect()->route('entidad.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entidad::find($id)->delete();
        return redirect()->route('entidad.index')->with('success','Registro eliminado satisfactoriamente');
    }
    }

