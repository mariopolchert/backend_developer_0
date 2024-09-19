@extends('admin.layout.master')

@section('page-title', 'Filmovi')

@section('content')
    <div class="title flex-between">
        <h1>Filmovi</h1>
        <div class="action-buttons">
            <a href="{{ route('movies.create') }}" type="submit" class="btn btn-primary">Dodaj novi</a>
        </div>
    </div>

    <hr>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Naslov</th>
                <th>Godina</th>
                <th>Zanr</th>
                <th>Cijena</th>
                <th class="table-action-col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    {{-- <td><a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a></td> --}}
                    <td><a href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a></td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->genre->name }}</td>
                    <td>{{ $movie->price->type }}</td>
                    <td>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Uredi Cijenu"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Obrisi Cijenu"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $movies->links() }}
@endsection

                            

