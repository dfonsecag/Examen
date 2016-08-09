
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <h1>Detalle del profesor</h1>
      <form >
       {{ csrf_field() }}
       <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" disabled value="{{$profesor->nombre}}">        
      </div>  
      <a class="btn btn-warning" href='/profesores/{{$profesor->id}}/edit'><i class="fa fa-pencil" aria-hidden="true"> Editar</i></a>
      <button type="button" class="btn btn-danger" onclick="eliminar({{$profesor->id}},'{{$profesor->nombre}}');">Eliminar Curso</button> 
      <a class="btn btn-default" href='/profesores'><i class="glyphicon glyphicon-fast-backward" aria-hidden="true"> Profesores</i></a> 
    </form>

  </div>
</div>
</div>
<script type="text/javascript">
 function eliminar(id, name) {
   swal({   title: "Desea eliminar el Profesor?",   text: name,   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, function(){
    $.ajax({
      type: "delete",
      url: '/profesores/'+id,
      data: {'_token': $('input[name=_token]').val()},
      success: function(response) {
        if(response=='ok'){
          window.location='/profesores';
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