@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier la Page : {{ $page->title }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image (Bannière)</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($page->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}" width="150">
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">Catégorie (Optionnel)</label>
                                <input type="text" class="form-control" id="category" name="category"
                                    value="{{ $page->category }}" placeholder="ex: infos-pratiques">
                                <div class="form-text">Utilisez 'infos-pratiques' pour grouper dans les onglets.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Ordre d'affichage</label>
                                <input type="number" class="form-control" id="order" name="order"
                                    value="{{ $page->order ?? 0 }}">
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ $page->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Page active</label>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Contenu (HTML autorisé)</label>
                            <textarea class="form-control" id="content" name="content" rows="15"
                                required>{{ $page->content }}</textarea>
                            <div class="form-text">Vous pouvez utiliser du code HTML pour la mise en forme. Faites attention
                                à ne pas casser la structure.</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection