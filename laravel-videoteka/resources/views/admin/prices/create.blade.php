@extends('admin.layout.master')

@section('page-title', 'Nova cijena')

@section('content')
    <div class="title flex-between">
        <h1>Kreiraj novu Cijenu</h1>
    </div>

    <hr>

    <form class="row g-3 mt-3" method="POST" action="/prices">
        {{-- CROSS SITE REQUEST FORGERY --}}
        @csrf
        <div class="col-md-4">
            <label for="tip_filma" class="form-label">Tip Filma</label>
            <input type="text" class="form-control @error('tip_filma') is-invalid @enderror" id="tip_filma" name="tip_filma" placeholder="Tip Filma">
            @error('tip_filma')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="cijena" class="form-label">Cijena</label>
            <input type="number" step="0.01" class="form-control @error('cijena') is-invalid @enderror" id="cijena" name="cijena" placeholder="Cijena">
            @error('cijena')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="zakasnina_po_danu" class="form-label">Zakasnina</label>
            <input type="number" step="0.01" class="form-control @error('zakasnina_po_danu') is-invalid @enderror" id="zakasnina_po_danu" name="zakasnina_po_danu" placeholder="Zakasnina">
            @error('zakasnina_po_danu')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 d-flex mt-4 justify-content-between">
            <a href="/prices" class="btn btn-primary mb-3">Povratak</a>
            <button type="submit" class="btn btn-success mb-3">Spremi</button>
        </div>
    </form>
@endsection