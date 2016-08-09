@extends('layouts.app')

@section('content')
{{ csrf_field() }}
<a href="/grupos/create"  class="btn btn-success" >Crear Grupo</a>
<br>
<table class="table table-condensed">
  <tr>
    <th>Id</th>
    <th>Nombre Profesor</th>
    <th>Código Curso</th>
    <th>Descripción Curso</th>
    <th>Acciones</th>
  </tr>
  @foreach($grupos as $item)
  <tr id="{{$item->id}}">
    <td>{{$item->id}}</td>
    <td>{{$item->nombre}}</td>
    <td>{{$item->codigo}}</td>
    <td>{{$item->descripcion}}</td>
    <td><a class="btn btn-warning" href='grupos/{{$item->id}}/edit'><i class="fa fa-pencil" aria-hidden="true"> Editar</i></a>
      <button data-target="modal1" class="btn btn-danger" onclick="imprimir({{$item->id}}, 'Profesor: {{$item->nombre}} y curso: {{$item->descripcion}}')"><i class="fa fa-trash-o" aria-hidden="true"> Eliminar</i></button>
       <a class="btn btn-primary" href='grupos/{{$item->id}}'><i class="fa fa-pencil" aria-hidden="true"> Ver</i></a>
      </td>
    </tr>
    @endforeach
  </table>

  <script type="text/javascript">
   function imprimir(id, name) {
     swal({   title: "Desea eliminar el grupo?",   text: name,   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, function(){
      $.ajax({
        type: "delete",
        url: '/grupos/'+id,
        data: {'_token': $('input[name=_token]').val()},
        success: function(response) {
          if(response=='ok'){
            $("#"+id).remove();
            swal("Eliminado!", "Su grupo ha sido eliminda con éxito.", "success");
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
