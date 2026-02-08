@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier l'Actualité</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.actualites.update', $actualite->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $actualite->title }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Contenu</label>
                            <textarea class="form-control" id="content" name="content" rows="5"
                                required>{{ $actualite->content }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="published_at" class="form-label">Date de publication</label>
                            <input type="datetime-local" class="form-control" id="published_at" name="published_at"
                                value="{{ $actualite->published_at ? $actualite->published_at->format('Y-m-d\TH:i') : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image (Laisser vide pour conserver l'actuelle)</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($actualite->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->title }}"
                                        width="100">
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('admin.actualites.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection