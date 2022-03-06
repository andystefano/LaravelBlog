@extends('layouts.app')

@section('content')

<h1 class="display-4 fw-bold lh-1">Listado de Articulos</h1>

<table class="table">
    <thead>
        <tr>
<th>Id</th>
<th>Titulo</th>
<th>Fecha</th>
<th>Acción</th>
        </tr>
    </thead>

    <tbody>

@foreach($articles as $article)
    <tr>

<td>{{$article->id}}</td>
<td>{{$article->title}}</td>
<td>{{$article->created_at}}</td>
<td><a href="{{url('/articles/'.$article->id.'/edit')}}">Editar</a>

<form action="{{url('/articles/'.$article->id.'/')}}" method="POST">
@csrf
@method('DELETE')
<input type="submit" value="Eliminar" />

</form>


</td>
        
</tr>
@endforeach

    </tbody>

</table>


<div class="pagination">
{{$articles->links()}}
</div>

<a href="/articles/create" class="float">
<i class="fa fa-plus my-float"></i>
</a>


<style>


.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#0C9;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top:22px;
}
 
 </style>

@endsection('content')
