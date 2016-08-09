
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form >
       {{ csrf_field() }}
       <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{$profesor->nombre}}">        
      </div>  


      <button type="button" class="btn btn-success form-control" onclick="actualizar({{$profesor->id}});">Actualizar Profesor</button>  
    </form>

  </div>
</div>
</div>
<script type="text/javascript">
  function actualizar(id){
    $.ajax({
      type: "POST",
      url: '/profesor/actualizar/'+id,
      data: {
        nombre: $('input[name=nombre]').val(),
        '_token': $('input[name=_token]').val()},
        success: function(response) {
          if(response=='ok'){
            window.location='/profesores';  
          }

          else{
            swal(response, "", "error")
          }
        }
      });
  }
</script>
@endsection