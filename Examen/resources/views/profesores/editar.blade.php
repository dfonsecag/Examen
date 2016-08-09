
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form action="/profesor/actualizar/{{$profesor->id}}" method="POST">
       {{ csrf_field() }}
       <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{$profesor->nombre}}">        
    </div>  

     <button type="submit" class="btn btn-success form-control" >Actualizar Profesor</button>
  </form>

</div>
</div>
</div>

@endsection