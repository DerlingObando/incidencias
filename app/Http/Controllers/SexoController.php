<?php

namespace App\Http\Controllers;

use App\Sexo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sexos'] = Sexo::paginate(10);

        return view('sexos.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sexos.create');
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
            'sexo' => 'required',
        ]);

        Sexo::create($request->all());

        return Redirect::to('sexos')
       ->with('success','Bien! sexo creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['sexo'] = Sexo::where($where)->first();

        return view('sexos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sexo' => 'required',
        ]);

        $update = ['sexo' => $request->sexo];
        Sexo::where('id',$id)->update($update);

        return Redirect::to('sexos')
       ->with('success','Bien! Sexo actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sexo::where('id',$id)->delete();

        return Redirect::to('sexos')->with('success','Sexo eliminada con éxito');
    }
}
