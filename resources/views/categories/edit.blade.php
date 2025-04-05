@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Modifier la Catégorie</h2>
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="name" class="form-label">Nom de la Catégorie</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection