@extends('admin.layout.master')

@section('page-title', 'Uredi cijenu za ' . $price->type)

@section('content')
    <div class="title flex-between">
        <h1>
            Uredi cijenu za {{ $price->type }}
        </h1>
    </div>

    <hr>

    <form class="row g-3 mt-3" method="POST" action="/prices/{{ $price->id }}">
        @csrf
        @method('PUT')
        <div class="col-md-4">
            <label for="type" class="form-label">Tip Filma</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ $price->type }}">
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="price" class="form-label">price</label>
            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $price->price }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="late_fee" class="form-label">Zakasnina</label>
            <input type="number" step="0.01" class="form-control @error('late_fee') is-invalid @enderror" id="late_fee" name="late_fee" value="{{ $price->late_fee }}">
            @error('late_fee')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 d-flex mt-4 justify-content-between">
            <a href="/prices" class="btn btn-primary mb-3">Povratak</a>
            <button type="submit" class="btn btn-success mb-3">Spremi</button>
        </div>
    </form>
@endsection