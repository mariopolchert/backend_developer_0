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
                    <td><a href="/prices/show?id=<?= $price['id'] ?>"><?= $price['tip_filma'] ?></a></td>
                    <td><?= $price['cijena'] ?></td>
                    <td><?= $price['zakasnina_po_danu'] ?></td>
                    <td>
                        <a href="/prices/edit?id=<?= $price['id'] ?>" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Uredi Medij"><i class="bi bi-pencil"></i></a>
                        <form action="/prices/destroy" method="POST" class="d-inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $price['id'] ?>">
                            <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Obrisi Medij"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

                            

