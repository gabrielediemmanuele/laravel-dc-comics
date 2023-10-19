@extends('layouts.app')

@section('main-content')
    <div class="container">
        <a href="{{ route('comics.index')}}" class="btn btn-primary mt-3 mb-4"> 
            Back to Comics
        </a>
        <h1 class="text-primary mb-3">Create a new comic!</h1>
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
                <button class="btn btn-primary">Edit 
                    <i class="fa-solid fa-pencil fa-lg m-2 text-light"></i>
                </button>
            </div>
        </form>
    </div>
@endsection