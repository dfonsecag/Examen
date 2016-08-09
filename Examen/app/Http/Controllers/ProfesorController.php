<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Auth;
use DB;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = DB::table('profesores')
        ->select('*')
        ->get();
        return view('profesores.index', array('profesores'=> $profesores));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesores.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     if($request->input('nombre')=='')
         return response()->json('Digite el nombre del profesor');
     else{
         DB::table('profesores')->insert([
            ['nombre' => $request->input('nombre')]
            ]);
         return response()->json('creado');
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
        $profesor = DB::table('profesores')->where('id', $id)->first();
        return view('profesores.show', array('profesor'=> $profesor));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesor = DB::table('profesores')->where('id', $id)->first();
        return view('profesores.editar', array('profesor'=> $profesor));
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
     if($request->input('nombre')=='')
         return response()->json('Digite el nombre del profesor');
     else{
        DB::table('profesores')->where('id', $id)
        ->update(array('nombre' => $request->input('nombre')));
        return response()->json('ok');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
       $profesores = DB::table('grupos')->where('idProfesor', $id)->first(); 
       if($profesores==null){
       DB::table('profesores')->where('id', '=', $id)->delete();
       return response()->json('ok');
    }
       else
        return response()->json('Este profesor esta relacionado a un grupo.');
   }
}
