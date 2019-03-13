<?php

namespace App\Http\Controllers;

use App\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['modulos'] = Modulo::paginate(10);

        return view('modulos.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulos.create');
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
            'modulo' => 'required',
        ]);

        Modulo::create($request->all());

        return Redirect::to('modulos')
       ->with('success','Bien! modulo creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['modulo'] = Modulo::where($where)->first();

        return view('modulos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'modulo' => 'required',
        ]);

        $update = ['modulo' => $request->modulo];
        Modulo::where('id',$id)->update($update);

        return Redirect::to('modulos')
       ->with('success','Bien! Modulo actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Modulo::where('id',$id)->delete();

        return Redirect::to('modulos')->with('success','Modulo eliminada con éxito');
    }
}
