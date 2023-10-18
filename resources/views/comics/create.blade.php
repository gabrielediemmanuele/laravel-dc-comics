@extends('layouts.app')

@section('font-awesome')
    <div class="container">
        <a href="{{ route('comics.index')}}" class="btn btn-primary"> 
            Back Home
        </a>
        <h1 class="text-primary">Create new comic!</h1>
        {{--! form con metodo post che si collega alla funzione store di comicsController --}}
        <form action="{{ route('comics.store') }}" method="POST" class="row g-3">
            <div class="col-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>

            <div class="col-3">
                <label for="thumb" class="form-label">Thumb</label>
                <input type="text" id="thumb" name="thumb" class="form-control">
            </div>

            <div class="col-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" id="price" name="price" class="form-control">
            </div>

            <div class="col-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" id="series" name="series" class="form-control">
            </div>

            <div class="col-3">
                <label for="sale_date" class="form-label">Sale Date</label>
                <input type="text" id="sale_date" name="sale_date" class="form-control">
            </div>

            <div class="col-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" id="type" name="type" class="form-control">
            </div>

            <div class="col-12" class="form-label">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" class="form-control">
            </div>

            <div class="col-3" class="form-label">
                <button class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>
@endsection