@extends('layout')

@section('title', 'Accueil')

@section('main')
    <h1>Bienvenue sur l'application demo blog ! </h1>
    <br><br>
    <div>
        <h2>Liste des utilisateurs</h2>
        <br><br>
        <table class="table" id="table-paginate">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
@endsection
