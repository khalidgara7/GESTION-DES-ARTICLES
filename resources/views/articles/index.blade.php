@extends('layouts.master')

@section('title', 'Liste des Articles')

@section('content')
    <h2>Liste des Articles</h2>
    <a href="{{ route('article.create') }}" class="btn btn-primary mb-3">Créer un Article</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->name }}</td>
                    <td>{{ $article->description }}</td>
                    <td>
                        <a href="{{ route('article.show', $article->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{route('article.edit', $article->id)}}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{route('article.destroy', $article->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
