@extends('layouts.app')


@section('main-content')
    <div class="container">
        <a href="{{ route('comics.index')}}" class="btn btn-primary mt-3 mb-4"> 
            Back to Comics
        </a>
        <h1 class="text-primary mb-3">Create a new comic!</h1>
        {{--* Validator conditions to show at screen error message - go to controllers > ComicController > n°49  --}}
        @if ($error->any())
            <div class="alert alert-danger">
                <h3>Correggi i seguenti errori: </h3>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{--! form con metodo post che si collega alla funzione store di comicsController --}}
        <form class="row g-3" action="{{ route('comics.store') }}" method="POST" >
            @csrf 
            {{-- for visualize correct the form use @csrf protect from fake dates --}}
            <div class="col-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ olg('') }}">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ olg('') }}">
                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" id="series" name="series" class="form-control @error('series') is-invalid @enderror" value="{{ olg('') }}">
                @error('series')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-3">
                <label for="sale_date" class="form-label">Sale Date</label>
                <input type="text" id="sale_date" name="sale_date" class="form-control @error('sale_date') is-invalid @enderror" value="{{ olg('') }}">
                @error('sale_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" id="type" name="type" class="form-control @error('type') is-invalid @enderror" value="{{ olg('') }}">
                @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12" class="form-label">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ olg('') }}" ></textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="thumb" class="form-label">Thumb</label>
                <input type="text" id="thumb" name="thumb" class="form-control @error('thumb') is-invalid @enderror" value="{{ olg('') }}">
                @error('thumb')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12">
                <img src="" id="thumb-preview" class="img-fluid w-25">
            </div>

            <div class="col-3">
                <button class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    const thumbPrev = document.getElementById('thumb-preview');
    const thumbInput = document.getElementById('thumb');

    thumbInput.addEventListener('change', function(){
        thumbPrev.src = this.value;
    })
</script>
@endsection