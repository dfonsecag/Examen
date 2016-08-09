
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form >
       {{ csrf_field() }}
       <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">        
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
      url: '/profesores',
      data: {
        nombre: $('input[name=nombre]').val(),
      '_token': $('input[name=_token]').val()},
        success: function(response) {
          if(response=='creado'){
            swal({   title: "",   text: response,   timer: 2000, type: "success",  showConfirmButton: false});
             $('input[name=nombre]').val('');
          }

          else{
            swal(response, "", "error")
          }
        }
      });
  }
</script>
@endsection