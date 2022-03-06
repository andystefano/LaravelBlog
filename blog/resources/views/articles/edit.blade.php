@extends('layouts.app')

@section('content')

<h1 class="display-4 fw-bold lh-1">Editar de Articulos</h1>


<div class="container white">

 

<div class="bd-example">
<form action="{{route('articles.update',$article->id)}}" method="POST">
	@csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="" value="{{$article->title}}">
    <small id="titleHelp" class="form-text text-muted">titulo.</small>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción</label>
    <textarea class="form-control" id="content"  name="content" rows="3">
    {{$article->content}}
    </textarea>
  </div>

  <input type="hidden" name="id" id="id" value="{{$article->id}}" />


  <button type="submit" class="btn btn-primary">Crear</button>
</form>
</div>



</div>


@endsection('content')
