@extends('layouts.master')

@section('title', 'Détails de l\'article')

@section('content')
    <h2>{{ $article->name }}</h2>
    <p>{{ $article->description }}</p>

    <h4>Commentaires</h4>
    @foreach($article->comments as $comment)
        <div class="border p-2 mb-2">
            <p>{{ $comment->description }}</p>
            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
            </form>
        </div>
    @endforeach

    @include('comments.form')
@endsection
