@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier l'artiste</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.artistes.update', $artiste->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Nom</label>
                            <input type="text" name="name" class="form-control" value="{{ $artiste->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Rôle</label>
                            <input type="text" name="role" class="form-control" value="{{ $artiste->role }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Photo Actuelle</label>
                            @if($artiste->image)
                                <br><img src="{{ asset($artiste->image) }}" width="150" class="img-thumbnail mt-2">
                            @endif
                            <input type="file" name="image" class="form-control mt-2">
                        </div>

                        <h5 class="mt-4">Réseaux Sociaux (Optionnel)</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Facebook</label>
                                <input type="text" name="facebook" class="form-control" value="{{ $artiste->facebook }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Instagram</label>
                                <input type="text" name="instagram" class="form-control" value="{{ $artiste->instagram }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Twitter / X</label>
                                <input type="text" name="twitter" class="form-control" value="{{ $artiste->twitter }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('admin.artistes.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection