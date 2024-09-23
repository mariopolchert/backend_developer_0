@extends('admin.layout.master')

@section('title', 'Nadzorna ploča')

@section('content')  
    
    <h1>Nova posudba</h1>
    <hr>
    <form class="row g-3 mt-3" action="/rentals" method="POST">
        <div class="row mt-3">
            <div class="col-1">
                <label for="user" class="mt-1">Član</label>
            </div>
            <div class="col-6">
                <select class="form-select form-select mb-2" id="user" name="user">
                    <option selected>Odaberi</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name . ' (' . $user->member_id . ')' }}</option>
                        @endforeach
                </select>
                @error('user_id')
                    <span class="text-danger small">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-1">
                <label for="movie_media" class="mt-1">Kopija filma</label>
            </div>
            <div class="col-6">
                <select class="form-select form-select mb-2" id="movie_media" name="movie_media">
                    <option selected>Odaberi</option>
                        @foreach($copies as $copy)
                            <option value="{{ $copy->id }}">{{ $copy->title . ' (' . $copy->year . ') - ' . $copy->type . ' (' . $copy->amount . ')' }}</option>
                        @endforeach
                </select>
                @error('copy_id')
                    <span class="text-danger small">{{$message}}</span>
                @enderror
            </div>
        </div>
        <hr>
        <div class="col-auto">
            <button class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Spremi"><i class="bi bi-floppy"></i></button>
        </div>
    </form>
    <hr>

    <div class="title flex-between">    
        <h1>Aktivne posudbe</h1>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Posudba - povrat</th>
                <th>Član</th>
                <th>Naslov</th>
                <th>Cijena - zakasnina (€)</th>
                <th class="table-action-col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
                <tr>
                    <td>{{ $rental->id }}</td>
                    <td><a href="{{ route('rentals.show', $rental->id) }}">{{ $rental->rental_date}} - {{$rental->return_date ?? '' }}</a></td>
                    <td>{{ $rental->first_name . ' ' . $rental->last_name . ' (' . $rental->member_id . ')' }}</td>
                    <td>{{ $rental->title . ' (' . $rental->year . ') - ' . $rental->format }}</td>
                    <td>{{ $rental->price . ' - ' . $rental->late_fee }}</td>
                    <td>
                        <form action="{{ route('dashboard.return', $rental->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Vrati"><i class="bi bi-arrow-counterclockwise"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $rentals->links() }}

@endsection