@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form >
       {{ csrf_field() }}
        @foreach($grupo as $grupo)
       <h1>Grupo: {{$grupo->codigo}}</h1>
       <div class="form-group">
        <label for="nombre">Profesor</label>
        <h4>{{$grupo->nombre}}</h4>
      </div>  
      <div class="form-group">
        <label for="nombre">Curso</label>
        <h4>{{$grupo->id}}</h4>
      </div>
      <div class="form-group">
        <label for="nombre">Descripcion</label>
        <h4>{{$grupo->descripcion}}</h4>
      </div>
       <a class="btn btn-warning" href='/grupos/{{$grupo->id}}/edit'><i class="fa fa-pencil" aria-hidden="true"> Editar</i></a>
      <button type="button" class="btn btn-danger" onclick="eliminar({{$grupo->id}},'Profesor: {{$grupo->nombre}} y curso: {{$grupo->descripcion}}');">Eliminar Curso</button> 
      <a class="btn btn-default" href='/cursos'><i class="glyphicon glyphicon-fast-backward" aria-hidden="true"> Cursos</i></a>
      @endforeach

       </form>

    </div>
  </div>
</div>
<script type="text/javascript">
 function eliminar(id, name) {
     swal({   title: "Desea eliminar el grupo?",   text: name,   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, function(){
      $.ajax({
        type: "delete",
        url: '/grupos/'+id,
        data: {'_token': $('input[name=_token]').val()},
        success: function(response) {
          if(response=='ok'){
            window.location='/grupos';
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