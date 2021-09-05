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
        <h2>Ajouter un utilisateur</h2>
        <br><br>
        <form class="row" name="form-creation-utilisateur" method="POST" action="/users">
            @csrf
            <div class="col-md-4">
                <input type="text" class="form-control col-md-4" id="nameUser" name="name" placeholder="Nom utilisateur">
            </div>
            <div class="col-md-4">
                <input type="email" class="form-control" id="emailUser" name="email" placeholder="Email utilisateur">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
        <br><br>
    </div>
@endsection
