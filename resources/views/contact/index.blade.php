@extends('layout.app')

    <!-- Affichage des actions disponibles pour gérer les contacts -->
    <div class="container mt-4">
        <h1 class="text text text-center"> CRUD gestion de contact</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom Complet</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Salaire</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $index => $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->nomComplet }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->telephone }}</td>
                                <td>{{ $contact->salaire }}</td>
                                <td>
                                    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-outline-dark" href="{{ route('contact.show', $contact->id) }}"><i class="bi bi-eye-fill "></i></a>
                                        <a class="btn btn-outline-primary" href="{{ route('contact.edit', $contact->id) }}"><i class="bi bi-pencil-square"></i></a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes-vous sûr ?')"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <a class="btn btn-outline-dark" href="{{ route('contact.create') }}"><i class="bi bi-file-earmark-plus"></i> Ajouter </a>
    </div>








@section('content')
