@extends('layouts.app')

@section('content')
{{ csrf_field() }}
<a href="/profesores/create"  class="btn btn-success" >Crear Profesor</a>
<br>
<table class="table table-condensed">
  <tr>
    <th>Nombre</th>
    <th>Acciones</th>
  </tr>
  @foreach($profesores as $item)
  <tr id="{{$item->id}}">
   <td>{{$item->nombre}}</td>
   <td><a class="btn btn-warning" href='profesores/{{$item->id}}/edit'><i class="fa fa-pencil" aria-hidden="true"> Editar</i></a>
    <button data-target="modal1" class="btn btn-danger" onclick="imprimir({{$item->id}}, '{{$item->nombre}}')"><i class="fa fa-trash-o" aria-hidden="true"> Eliminar</i></button>
    <a class="btn btn-primary" href='profesores/{{$item->id}}'><i class="fa fa-pencil" aria-hidden="true"> Ver</i></a>
    </td>
  </tr>
  @endforeach
</table>

<script type="text/javascript">
 function imprimir(id, name) {
   swal({   title: "Desea eliminar el Profesor?",   text: name,   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, function(){
    $.ajax({
      type: "delete",
      url: '/profesores/'+id,
      data: {'_token': $('input[name=_token]').val()},
      success: function(response) {
        if(response=='ok'){
          $("#"+id).remove();
          swal("Eliminado!", "Su Profesor ha sido eliminda con éxito.", "success");
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
