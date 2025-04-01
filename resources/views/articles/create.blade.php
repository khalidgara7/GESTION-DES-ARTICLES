@extends('layouts.master')

@section('title', 'Créer un Article')

@section('content')
    <h2>Créer un nouvel article</h2>

    <form action="{{ route('article.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom de l'article</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
@endsection
