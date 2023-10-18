@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
   <h1> Comics List </h1>
   <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Series</th>
        <th scope="col">Sale Date</th>
        <th scope="col">Type</th>
        <th scope="col">Creation Date</th>
        <th scope="col">Last Update</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comics as $comic)
      <tr>
        <td scope="col">{{$comic->id}}</td>
        <td scope="col">{{$comic->title}}</td>
        <td scope="col">{{$comic->price}}</td>
        <td scope="col">{{$comic->series}}</td>
        <td scope="col">{{$comic->sale_date}}</td>
        <td scope="col">{{$comic->type}}</td>
        <td scope="col">{{$comic->created_at}}</td>
        <td scope="col">{{$comic->updated_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  </section>
@endsection