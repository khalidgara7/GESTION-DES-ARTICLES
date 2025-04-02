<form action="{{ route('comments.store', $article->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="description" class="form-label">Ajouter un commentaire :</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
