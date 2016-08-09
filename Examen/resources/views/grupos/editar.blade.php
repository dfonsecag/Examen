@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form action="/grupo/actualizar/{{$grupo->id}}" method="POST">
       {{ csrf_field() }}
       <div class="form-group">
        <label for="profesor">Profesores</label>
        <select class="form-control" id="profesor" name="profesor">
         @foreach( $profesores as $item )
         <option @if($item->id == $grupo->idProfesor) selected @endif  value={{$item->id}}>{{$item
          ->nombre}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
      <label for="curso">Cursos</label>
        <select class="form-control" id="curso" name="curso">
         @foreach( $cursos as $item )
         <option @if($item->id == $grupo->idCurso) selected @endif  value={{$item->id}}>{{$item
          ->descripcion}}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-success form-control">Actualizar Grupo</button>
    </form>

  </div>
</div>
</div>

@endsection