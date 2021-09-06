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

        <form class="" name="form-creation-article" method="POST" action="/articles">
            @csrf

            <div class="row g-3">

                <div class="col-12">
                    <label for="inputTitle" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="inputTitle" aria-describedby="titleHelp" maxlength="128" required>
                    <div id="titleHelp" class="form-text">Le titre doit pas dépasser 128 caractères</div>
                </div>
                <div class="col-12">
                    <label for="inputContents" class="form-label">Contenu article</label>
                    <textarea class="form-control" id="inputContents" rows="8" required></textarea>
                </div>

                <div class="col-4">
                    <label for="inputStatus" class="form-label">Statut publication</label>
                    <select class="form-select" id="inputStatus" aria-label="Default select example" required>
                        @foreach ($articlesStatus as $status)
                        <option value="{{ $status->id }}">{{ ucfirst($status->label) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="inputPublicatedDate" class="form-label">Date de publication</label>
                    <input type="datetime-local" class="form-control" id="inputPublicatedDate" aria-describedby="publicatedDateHelp">
                    <div id="publicatedDateHelp" class="form-text">Ne doit pas dépasser 128 caractères</div>
                </div>
                <div class="col-4">
                    <label for="inputAuteur" class="form-label">Auteur</label>
                    <select class="form-select" id="inputAuteur" aria-label="Default select example" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ ucfirst($user->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Envoyer l'article</button>

            </div>

        </form>

        <br><br>
    </div>
@endsection
