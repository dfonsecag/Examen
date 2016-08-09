@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form >
       {{ csrf_field() }}
       <h1>Detalle del curso {{$curso->codigo}}</h1>
       <div class="form-group">
        <label for="nombre">Codigo</label>
        <input type="text" class="form-control" disabled value="{{$curso->codigo}}">        
      </div>  
      <div class="form-group">
        <label for="nombre">Descripcion</label>
        <input type="text" class="form-control" value="{{$curso->descripcion}}" disabled>        
      </div>  
      <a class="btn btn-warning" href='/cursos/{{$curso->id}}/edit'><i class="fa fa-pencil" aria-hidden="true"> Editar</i></a>
      <button type="button" class="btn btn-danger" onclick="eliminar({{$curso->id}},'{{$curso->descripcion}}');">Eliminar Curso</button> 
      <a class="btn btn-default" href='/cursos'><i class="glyphicon glyphicon-fast-backward" aria-hidden="true"> Cursos</i></a>

       </form>

    </div>
  </div>
</div>
<script type="text/javascript">
 function eliminar(id, name) {
   swal({   title: "Desea eliminar el curso?",   text: name,   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, function(){
    $.ajax({
      type: "delete",
      url: '/cursos/'+id,
      data: {'_token': $('input[name=_token]').val()},
      success: function(response) {
        if(response=='ok'){
         window.location='/cursos';
        }
        else{
          swal(response, "", "error")
        }
      }
    });
  });
 }
</script>
@endsection