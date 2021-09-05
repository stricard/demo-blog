@extends('layout')

@section('title', 'Liste des articles')

@section('main')
    <br><br>
    <div>
        <h2>Liste des articles</h2>
        <br><br>
        <table class="table" id="table-paginate">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titre</th>
                <th scope="col">Satut publication</th>
                <th scope="col">Date de publication</th>
                <th scope="col">Auteur</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($articles as $article)
                <tr>
                    <th scope="row">{{ $article->id }}</th>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->status_id }}</td>
                    <td>{{ $article->publicated_at }}</td>
                    <td>{{ $article->user_id }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br><br>
        <h2>Ajouter un article</h2>
        <br><br>

        
        <br><br>
    </div>
@endsection
