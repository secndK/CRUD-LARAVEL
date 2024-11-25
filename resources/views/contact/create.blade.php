@extends('layout.app')

@section('content')
    <h1 class="text text-md-center">Ajouter un contact</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('contact') }}" method="POST">
        @csrf

        @foreach (['nomComplet' => 'Nom Complet', 'telephone' => 'Téléphone', 'email' => 'Email', 'salaire' => 'Salaire (FCFA)'] as $field => $label)
            <div class="form-group mb-3">
                <label for="{{ $field }}">{{ $label }}:</label>
                <input
                    type="{{ $field === 'email' ? 'email' : ($field === 'salaire' ? 'number' : 'text') }}"
                    class="form-control"
                    id="{{ $field }}"
                    placeholder="{{ $label }}"
                    name="{{ $field }}">
            </div>
        @endforeach

        <button type="submit" class="btn btn-dark"><i class="bi bi-floppy-fill"></i> Enregistrer</button>
    </form>
@endsection
