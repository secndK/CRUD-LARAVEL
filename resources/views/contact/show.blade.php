@extends('layout.app')

@section('content')
    <h1>Gestion Contacte</h1>

    <table class="table table-bordered">
        @foreach (['Nom Complet' => $contact->nomComplet, 'Téléphone' => $contact->telephone, 'Email' => $contact->email, 'Salaire' => 'FCFA ' . $contact->salaire] as $label => $value)
            <tr>
                <th>{{ $label }}:</th>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
    </table>
@endsection
