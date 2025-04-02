@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Modifier l'article</h2>

        <form action="{{ route('article.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Pour envoyer la mise à jour avec la méthode PUT -->

            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required >
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required>{{ $article->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
        
        <a href="{{ route('article.index') }}" class="btn btn-secondary mt-3">Retour</a>
    </div>
@endsection
