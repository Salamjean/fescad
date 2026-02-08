@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier le Communiqué</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.communiques.update', $communique->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $communique->title }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="published_at" class="form-label">Date de publication</label>
                            <input type="date" class="form-control" id="published_at" name="published_at"
                                value="{{ $communique->published_at ? $communique->published_at->format('Y-m-d') : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="file_path" class="form-label">Fichier (PDF, Doc)</label>
                            <input type="file" class="form-control" id="file_path" name="file_path">
                            @if($communique->file_path)
                                <div class="mt-2">
                                    <a href="{{ asset('storage/' . $communique->file_path) }}" target="_blank">Voir le fichier
                                        actuel</a>
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('admin.communiques.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection