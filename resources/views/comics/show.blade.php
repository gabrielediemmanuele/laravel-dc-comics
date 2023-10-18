@extends('layouts.app')

@section('main-content')
<div class="container mt-4 mb-3">
    <a href="{{ route('comics.index')}}" class="btn btn-primary"> 
        Back to Comics
    </a>
   <a href="{{ route('comics.create')}}" class="btn btn-primary">
    + Add New Comic
</a>
    <div class="card mt-3" style="width: 20rem;">
        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
        <div class="card-header">
        <div><strong>ID: {{ $comic->id}} </strong></div>
        <div><strong>Title: {{ $comic->title}}</strong></div>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Price: </strong>{{$comic->price}}</li>
            <li class="list-group-item"><strong>Series: </strong>{{$comic->series}}</li>
            <li class="list-group-item"><strong>Sale Date: </strong>{{$comic->sale_date}}</li>
            <li class="list-group-item"><strong>Type: </strong>{{$comic->type}}</li>
            <li class="list-group-item"><strong>Create at: </strong>{{$comic->created_at}}</li>
            <li class="list-group-item"><strong>Update at: </strong>{{$comic->updated_at}}</li>
            <li class="list-group-item"><strong>Description: </strong>{{$comic->description}}</li>
        </ul>
    </div>
</div>
@endsection