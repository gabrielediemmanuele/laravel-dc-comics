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
        {{--* Validator conditions to show at screen error message - go to controllers > ComicController > n°49  --}}
        @if ($errors->any())
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
        <form class="row g-3" action="{{ route('comics.update', $comic) }}" method="POST" >
            @csrf
            @method('PATCH') 
            {{-- for visualize correct the form use @csrf protect from fake dates --}}
            <div class="col-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('') ?? $comic->title }}">
                {{--* error method  --}}
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('') ?? $comic->price }}">
                {{--* error method  --}}
                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" id="series" name="series" class="form-control @error('series') is-invalid @enderror" value="{{ old('') ?? $comic->series }}">
                {{--* error method  --}}
                @error('series')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-3">
                <label for="sale_date" class="form-label">Sale Date</label>
                <input type="text" id="sale_date" name="sale_date" class="form-control @error('sale_date') is-invalid @enderror" value="{{ old('') ?? $comic->sale_date }}">
                {{--* error method  --}}
                @error('sale_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" id="type" name="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('') ?? $comic->type }}">
                {{--* error method  --}}
                @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12" class="form-label">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description @error('description') is-invalid @enderror" value="{{ old('') ?? $comic->description }}"></textarea>
                {{--* error method  --}}
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="thumb" class="form-label">Thumb</label>
                <input type="text" id="thumb" name="thumb" class="form-control @error('thumb') is-invalid @enderror" value="{{ old('') ?? $comic->thumb }}">
                {{--* error method  --}}
                @error('thumb')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <div class="col-12">
                <img src="{{ $comic->thumb }}" id="thumb-preview" class="img-fluid w-25">
            </div>
            
            <div class="col-3">
                <button class="btn btn-success">Edit 
                    <i class="fa-solid fa-pencil fa-sm mx-2 text-light"></i>
                </button>
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
