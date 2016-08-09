@extends('layouts.app')

@section('content')
{{ csrf_field() }}
<a href="/cursos/create"  class="btn btn-success" >Crear Curso</a>
<br>
<table class="table table-condensed">
  <tr>
    <th>Codigo</th>
    <th>Descripcion</th>
    <th>Acciones</th>
  </tr>
  @foreach($cursos as $item)
  <tr id="{{$item->id}}">
   <td>{{$item->codigo}}</td>
   <td>{{$item->descripcion}}</td>
   <td><a class="btn btn-warning" href='cursos/{{$item->id}}/edit'><i class="fa fa-pencil" aria-hidden="true"> Editar</i></a>
    <button data-target="modal1" class="btn btn-danger" onclick="imprimir({{$item->id}}, '{{$item->descripcion}}')"><i class="fa fa-trash-o" aria-hidden="true"> Eliminar</i></button>
    <a class="btn btn-primary" href='cursos/{{$item->id}}'><i class="fa fa-pencil" aria-hidden="true"> Ver</i></a>
    </td>
  </tr>
  @endforeach
</table>

<script type="text/javascript">
 function imprimir(id, name) {
   swal({   title: "Desea eliminar el curso?",   text: name,   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, function(){
    $.ajax({
      type: "delete",
      url: '/cursos/'+id,
      data: {'_token': $('input[name=_token]').val()},
      success: function(response) {
        if(response=='ok'){
          $("#"+id).remove();
          swal("Eliminado!", "Su curso ha sido eliminda con éxito.", "success");
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
