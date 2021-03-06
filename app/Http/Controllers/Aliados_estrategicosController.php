<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AliadosEstrategicos;

class Aliados_estrategicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /*  $lis_aliados = AliadosEsrtrategicos::all()->toArray();
        return view('aliados_estrategicos.index',compact('lis_aliados')); */

        return view('aliados_estrategicos.index',[
            'lis_aliados' => AliadosEstrategicos::all()->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aliados_estrategicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $fields = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'logo' => 'required',
        ]);
        AliadosEstrategicos::create($fields); */ 

        /*  AliadosEstrategicos::create([
            'nombre' => request('nombre'),
            'descripcion' => request('descripcion'),
            'logo' => request('logo'), 
    
        ]); */

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
        }

        $lis_aliados = new AliadosEstrategicos();
        $lis_aliados->nombre = $request->input('nombre');
        $lis_aliados->descripcion = $request->input('descripcion');
        $lis_aliados->logo = $name;
        $lis_aliados->save();
        
        return redirect()->route('aliados_estrategicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AliadosEstrategicos  $lis_aliados)
    { 
        return view('aliados_estrategicos.show',[
            'lis_aliados' => $lis_aliados
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AliadosEstrategicos  $lis_aliados)
    {
        return view('aliados_estrategicos.edit',[
            'lis_aliados' => $lis_aliados
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AliadosEstrategicos  $lis_aliados)
    {
        /* $lis_aliados->update([
            'nombre' => request('nombre'),
            'descripcion' => request('descripcion'),
            'logo' => request('logo'),
        ]); */

        $lis_aliados->fill($request->except('logo'));
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $name = time().$file->getClientOriginalName();
            $lis_aliados->logo = $name;
            $file->move(public_path().'/images/',$name);
        }
        $lis_aliados->save();

        return redirect()->route('aliados_estrategicos.index', $lis_aliados);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( AliadosEstrategicos  $lis_aliados)
    {
        $lis_aliados->delete();
        return redirect()->route('aliados_estrategicos.index');
    }
}
