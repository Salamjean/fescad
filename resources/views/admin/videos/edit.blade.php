@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier la Vidéo</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.videos.update', $video->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $video->title }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="youtube_link" class="form-label">Lien YouTube</label>
                            <input type="url" class="form-control" id="youtube_link" name="youtube_link"
                                value="{{ $video->youtube_link }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection