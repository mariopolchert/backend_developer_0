@extends('admin.layout.master')

@section('content')
    <div class="title flex-between">
        <h1>Filmovi</h1>
        <div class="action-buttons">
            <a href="/movies/create" type="submit" class="btn btn-primary">Dodaj novi</a>
        </div>
    </div>

    <hr>

    <table>
        <tr>
            <th>Tip Filma</th>
            <th>Cijena</th>
            <th>Zakasnina</th>
        </tr>
        
        @foreach ($prices as $price)
            <tr>
                <td><?= $price->tip_filma ?></td>
                <td>{{ $price->cijena }}</td>
                <td>{{ $price->zakasnina_po_danu }}</td>
            </tr>
        @endforeach
    </table>
@endsection

                            

