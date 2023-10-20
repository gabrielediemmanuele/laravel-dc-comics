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
            
              <a href="#" class="mx-1" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$comic->id}}">
                <i class="fa-solid fa-trash fa-xl text-danger"></i>
              </a>

              {{--* MODAL --}}
              <div class="modal fade" id="delete-modal-{{ $comic->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina Comics</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Do you want to delete "<strong>{{$comic->title}}</strong>"? Click <span class="text-danger">"Delete"</span> to continue or go <span class="text-primary">"Back"</span>  to comics.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Back</button>

                      <form action="{{ route('comics.destroy', $comic) }}" method="POST" class="mx-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{ $comics->links('pagination::bootstrap-5')}}

  </section>
@endsection