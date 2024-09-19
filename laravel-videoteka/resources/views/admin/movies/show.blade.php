@extends('admin.layout.master')

@section('title', $movie->title)

@section('content')

    <h1>{{$movie->title}}</h1>
    <hr>
    <form class="row g-3 mt-3">
        <div class="row mt-3">
            <div class="col-1">
                <label for="id" class="mt-1">Id</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="id" name="id" value="{{$movie->id}}" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-1">
                <label for="title" class="mt-1">Naslov</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="title" name="title" value="{{$movie->title}}" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-1">
                <label for="year" class="mt-1">Godina</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="year" name="year" value="{{$movie->year}}" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-1">
                <label for="genre" class="mt-1">Žanr</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="genre" name="genre" value="{{$movie->genre->name}}" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-1">
                <label for="movie_type" class="mt-1">Tip filma</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="movie_type" name="movie_type" value="{{$movie->price->type}}" disabled>
            </div>
        </div>
    </form>
    <hr>
    <div class="col-2">
        <a href="/movies" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Povratak"><i class="bi bi-arrow-return-left"></i></a>
        <a href="/movies/{{$movie->id}}/edit" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Uredi"><i class="bi bi-pencil"></i></a>
        <form id="delete-form" class="hidden d-inline" method="POST" action="/movies/{{$movie->id}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Izbriši"><i class="bi bi-trash"></i></button>
        </form>
    </div>
    <hr>
    <h2>{{$movie->title}} kopije</h2>
    <hr>
    <div class="overflow-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Barkod</th>
                    <th>Medij</th>
                    <th>Dostupan</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($copies as $copy)
                    <tr>
                        <td>{{$copy->id}}</td>
                        <td>{{$copy->barcode}}</td>
                        <td>{{$copy->format->type}}</td>
                        <td>{{$copy->available}}</td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>

@endsection