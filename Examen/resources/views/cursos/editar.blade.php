@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form action="/curso/actualizar/{{$curso->id}}" method="POST">
       {{ csrf_field() }}
       <div class="form-group">
        <label for="nombre">Codigo</label>
        <input type="text" class="form-control" id="codigo" placeholder="Código" name="codigo" value="{{$curso->codigo}}">        
    </div>  
    <div class="form-group">
        <label for="nombre">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" placeholder="Descripcion" name="descripcion"  value="{{$curso->descripcion}}">        
    </div>  

     <button type="submit" class="btn btn-success form-control">Actualizar</button>
  </form>

</div>
</div>
</div>
@endsection