@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form >
       {{ csrf_field() }}
       <div class="form-group">
        <label for="nombre">Codigo</label>
        <input type="text" class="form-control" id="codigo" placeholder="Código" name="codigo" value="{{$curso->codigo}}">        
    </div>  
    <div class="form-group">
        <label for="nombre">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" placeholder="Descripcion" name="descripcion"  value="{{$curso->descripcion}}">        
    </div>  

<button type="button" class="btn btn-success form-control" onclick="actualizar({{$curso->id}});">Actualizar Curso</button>  </form>

</div>
</div>
</div>
<script type="text/javascript">
  function actualizar(id){
    $.ajax({
      type: "POST",
      url: '/curso/actualizar/'+id,
      data: {
        codigo: $('input[name=codigo]').val(),
        descripcion: $('input[name=descripcion]').val(),
      '_token': $('input[name=_token]').val()},
        success: function(response) {
          if(response=='ok'){
            window.location='/cursos';  
          }

          else{
            swal(response, "", "error")
          }
        }
      });
  }
</script>
@endsection