@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier l'événement historique</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.festival.historique.update', $historique->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Année</label>
                            <input type="text" name="year" class="form-control" value="{{ $historique->year }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Titre</label>
                            <input type="text" name="title" class="form-control" value="{{ $historique->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="5"
                                required>{{ $historique->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Image Actuelle</label>
                            @if($historique->image)
                                <br><img src="{{ asset($historique->image) }}" width="150" class="img-thumbnail">
                            @endif
                            <input type="file" name="image" class="form-control mt-2">
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('admin.festival.historique.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection