@extends('layouts.app')

@section('font-awesome')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('main-content')
  <section class="container mt-5">
    <a href="{{ route('comics.create')}}" class="btn btn-primary">
      + Add New Comic
  </a>
   <h1> Comics List </h1>
   <table class="table table-bordered">
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
        <th scope="col">View</th>
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
        <td scope="col" class="d-flex">
           {{--*  connection to "show" in ComicController and id  --}}
            <a href="{{ route('comics.show', $comic) }}">
                <i class="fa-solid fa-eye fa-xl mx-2"></i>
            </a>
            <a href="{{ route('comics.edit', $comic) }}">
              <i class="fa-solid fa-pencil fa-xl mx-2 text-success"></i>
            </a>
            <a href="{{ route('comics.show', $comic) }}">
              <i class="fa-solid fa-trash fa-xl mx-2 text-danger"></i>
            </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  </section>
@endsection