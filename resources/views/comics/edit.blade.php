@extends('layouts.app')

@section('font-awesome')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('main-content')
    <div class="container mb-5">
        <a href="{{ route('comics.index')}}" class="btn btn-success mt-3 mb-4"> 
            Back to Comics
        </a>
        <a href="{{ route('comics.show', $comic)}}" class="btn btn-success mt-3 mb-4"> 
            Show Details
        </a>
        <h1 class="text-success mb-3">Edit Comic!</h1>
        {{--! form con metodo post che si collega alla funzione store di comicsController --}}
        <form class="row g-3" action="{{ route('comics.update', $comic) }}" method="POST" >
            @csrf 
            {{-- for visualize correct the form use @csrf protect from fake dates --}}
            <div class="col-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $comic->title }}">
            </div>

            <div class="col-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" id="price" name="price" class="form-control"  value="{{ $comic->price }}">
            </div>

            <div class="col-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" id="series" name="series" class="form-control"  value="{{ $comic->series }}">
            </div>

            <div class="col-3">
                <label for="sale_date" class="form-label">Sale Date</label>
                <input type="text" id="sale_date" name="sale_date" class="form-control" value="{{ $comic->sale_date }}">
            </div>

            <div class="col-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" id="type" name="type" class="form-control"  value="{{ $comic->type }}">
            </div>

            <div class="col-12" class="form-label">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" class="form-control" value="{{ $comic->description }}"></textarea>
            </div>

            <div class="col-12">
                <label for="thumb" class="form-label">Thumb</label>
                <input type="text" id="thumb" name="thumb" class="form-control"  value="{{ $comic->thumb }}">
            </div>

            <div class="col-3">
                <button class="btn btn-success">Edit 
                    <i class="fa-solid fa-pencil fa-sm mx-2 text-light"></i>
                </button>
            </div>
        </form>
    </div>
@endsection