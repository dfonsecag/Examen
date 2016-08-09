<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Auth;
use DB;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cursos = DB::table('cursos')
       ->select('*')
       ->get();
       return view('cursos.index', array('cursos'=> $cursos));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('codigo')=='')
           return response()->json('Digite el código del curso');
       elseif ($request->input('descripcion')=='') 
           return response()->json('Digite la descripcion del curso');
       else{

        DB::table('cursos')->insert([
            ['codigo' => $request->input('codigo'),'descripcion' => $request->input('descripcion')]
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
        $curso = DB::table('cursos')->where('id', $id)->first();
        return view('cursos.show', array('curso'=> $curso));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = DB::table('cursos')->where('id', $id)->first();
        return view('cursos.editar', array('curso'=> $curso));
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
        if($request->input('codigo')=='')
           return response()->json('Digite el código del curso');
       elseif ($request->input('descripcion')=='') 
           return response()->json('Digite la descripcion del curso');
       else{
        DB::table('cursos')->where('id', $id)
        ->update(array('codigo' => $request->input('codigo'),'descripcion' => $request->input('descripcion')));
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
        $cursos = DB::table('grupos')->where('idCurso', $id)->first(); 
        if($cursos==null){
         DB::table('cursos')->where('id', '=', $id)->delete();
         return response()->json('ok');
     }
     else
        return response()->json('Este curso esta relacionado a un grupo.');
}

}

