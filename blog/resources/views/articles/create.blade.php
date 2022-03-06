@extends('layouts.app')

@section('content')

<h1 class="display-4 fw-bold lh-1">Listado de Articulos</h1>


<div class="container white">



@if (Auth::check())

<form method="POST" action="/articles/"  enctype="multipart/form-data">


<div class="bd-example">
	@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Enter email">
    <small id="titleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción</label>
    <textarea class="form-control" id="content"  name="content" rows="3"></textarea>
  </div>


  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Archivo:</label>
    <input id="input-b2" name="pic" type="file" class="file" data-show-preview="false">

  </div>


  <button type="submit" class="btn btn-primary">Crear</button>
</div>
</div>

</form>
@else

<h2>Debe estar logueado</h2>

@endif


@endsection('content')
