@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form >
       {{ csrf_field() }}
      <div class="form-group">
        <label for="placa">Profesores</label>
        <select class="form-control" id="profesor" name="profesor">
         @foreach( $profesores as $item )
         <option value={{$item->id}}>{{$item
          ->nombre}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="placa">Cursos</label>
        <select class="form-control" id="curso" name="curso">
         @foreach( $cursos as $item )
         <option value={{$item->id}}>{{$item
          ->descripcion}}</option>
          @endforeach
        </select>
      </div>

     <button type="button" class="btn btn-success form-control" onclick="Crear();">Guardar</button>
  </form>

</div>
</div>
</div>
<script type="text/javascript">
  function Crear(){
    $.ajax({
      type: "POST",
      url: '/grupos',
      data: {
        curso: $('#curso').val(),
        profesor: $('#profesor').val(),
      '_token': $('input[name=_token]').val()},
        success: function(response) {
          if(response=='creado'){
            swal({   title: "",   text: response,   timer: 2000, type: "success",  showConfirmButton: false});
          }

          else{
            swal(response, "", "error")
          }
        }
      });
  }
</script>
@endsection