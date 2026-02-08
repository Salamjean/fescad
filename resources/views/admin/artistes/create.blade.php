@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter un artiste</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.artistes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Nom</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Rôle</label>
                            <input type="text" name="role" class="form-control" required
                                placeholder="ex: Chanteur Principal">
                        </div>

                        <div class="mb-3">
                            <label>Photo</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <h5 class="mt-4">Réseaux Sociaux (Optionnel)</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Facebook</label>
                                <input type="text" name="facebook" class="form-control" placeholder="Lien Facebook">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Instagram</label>
                                <input type="text" name="instagram" class="form-control" placeholder="Lien Instagram">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Twitter / X</label>
                                <input type="text" name="twitter" class="form-control" placeholder="Lien Twitter">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('admin.artistes.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection