@extends('admin.layout.master')

@section('page-title', 'Cjenik')

@section('content')
    <div class="title flex-between">
        <h1>Cjenik</h1>
        <div class="action-buttons">
            <a href="/prices/create" type="submit" class="btn btn-primary">Dodaj novu</a>
        </div>
    </div>

    <hr>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tip Filma</th>
                <th>Cijena</th>
                <th>Zakasnina po danu</th>
                <th class="table-action-col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($prices as $price)
                <tr>
                    <td><?= $price['id'] ?></td>
                    <td><a href="/prices/<?= $price['id'] ?>"><?= $price['type'] ?></a></td>
                    <td><?= $price['price'] ?></td>
                    <td><?= $price['late_fee'] ?></td>
                    <td>
                        <a href="/prices/{{ $price->id }}/edit" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Uredi Cijenu"><i class="bi bi-pencil"></i></a>
                        <form action="/prices/{{ $price->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                            <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Obrisi Cijenu"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

                            

