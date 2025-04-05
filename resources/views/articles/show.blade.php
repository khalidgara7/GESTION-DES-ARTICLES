@extends('layouts.master')

@section('title', 'Détails de l\'article')

@section('content')
    <h2>{{ $article->name }}</h2>
    <p>{{ $article->description }}</p>

    <h4>Commentaires</h4>
    @foreach($article->comments as $comment)
        <div class="border p-2 mb-2">
            <p>{{ $comment->description }}</p>
            
            <form action="{{ route('comments.destroy', ['article_Id' => $article->id, 'comment_Id' => $comment->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
            </form>

            </div>
        @endforeach

        @section('navbar-links')
            @isset($article)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('comments.index', ['id' => $article->id]) }}">Comments</a>
                </li>
            @endisset
        @endsection


    @include('comments.form')
@endsection
