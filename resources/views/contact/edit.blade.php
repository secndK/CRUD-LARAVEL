@extends('layout.app')

@section('content')
    <h1 class="text-center">Modifier Contact</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ url('contact/'. $contact->id) }}">
        @csrf
        @method('PATCH')

        @foreach ([
            'nomComplet' => ['label' => 'Nom', 'type' => 'text', 'placeholder' => 'Entrer Nom'],
            'telephone' => ['label' => 'Téléphone', 'type' => 'text', 'placeholder' => 'Entrer Téléphone'],
            'email' => ['label' => 'Email', 'type' => 'email', 'placeholder' => 'Entrer Email'],
            'salaire' => ['label' => 'Salaire (FCFA)', 'type' => 'number', 'placeholder' => 'Salaire']
        ] as $field => $options)
            <div class="form-group mb-3">
                <label for="{{ $field }}">{{ $options['label'] }}:</label>
                <input
                    type="{{ $options['type'] }}"
                    class="form-control"
                    id="{{ $field }}"
                    placeholder="{{ $options['placeholder'] }}"
                    name="{{ $field }}"
                    value="{{ $contact->$field }}">
            </div>
        @endforeach

        <div class="d-grid gap-2 col-6 d-md-flex">
            <button type="submit" class="btn btn-outline-dark">
                <i class="bi bi-floppy"></i> Enregistrer
            </button>
        </div>

    </form>
@endsection
