<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Response;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $grupos = DB::select('select t1.id, t2.codigo, t2.descripcion, t3.nombre FROM grupos AS t1, cursos AS t2, profesores AS t3 WHERE (t3.id = t1.idProfesor) AND (t2.id = t1.idCurso)');
       return view('grupos.index', array('grupos'=> $grupos));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $cursos = DB::table('cursos')
       ->select('*')
       ->get();
       $profesores = DB::table('profesores')
       ->select('*')
       ->get();
       return view('grupos.crear', array('cursos'=> $cursos, 'profesores'=> $profesores));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->input('profesor')=='')
           return response()->json('Seleccione el profesor');
       elseif ($request->input('curso')=='') 
           return response()->json('Seleccione el curso');
       else{
           DB::table('grupos')->insert([
            ['idProfesor' => $request->input('profesor'),'idCurso' => $request->input('curso')]
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
        $grupo = DB::select('select t1.id, t2.codigo, t2.descripcion, t3.nombre FROM grupos AS t1, cursos AS t2, profesores AS t3 WHERE (t3.id = t1.idProfesor and t2.id = t1.idCurso) and t1.id=?',[$id]);
       return view('grupos.show', array('grupo'=> $grupo));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesores = DB::table('profesores')
        ->select('*')
        ->get();
        $cursos = DB::table('cursos')
        ->select('*')
        ->get();
        $grupo = DB::table('grupos')->where('id', $id)->first();
        return view('grupos.editar', array('profesores'=> $profesores, 'cursos'=>$cursos, 'grupo'=>$grupo)); 
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
        
       DB::table('grupos')->where('id', $id)
       ->update(array('idProfesor' => $request->input('profesor'),'idCurso' => $request->input('curso')));
       return redirect('grupos');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       DB::table('grupos')->where('id', '=', $id)->delete();
       return response()->json('ok');
   }
}
