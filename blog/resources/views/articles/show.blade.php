@extends('layouts.app')

@section('content')

<h1 class="display-4 fw-bold lh-1">Articulos N° {{$article->id}}</h1>


<div class="container white">

 

<div class="bd-example">
 
  <div class="form-group">
    <label for="exampleInputEmail1">Title:</label>
    <p>{{$article->title}}</p>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción:</label>
    {{$article->content}}
  </div>



  <div class="form-group">
    <label for="exampleFormControlTextarea1">Total Lecturas:</label>
    {{$article->views}}
  </div>   
 

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Usuario:</label>
    {{$user->name}}
  </div>   
 
</div>



</div>


@endsection('content')
