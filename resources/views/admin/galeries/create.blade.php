@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter une Image à la Galerie</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.galeries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Catégorie</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="Concert">Concert</option>
                                <option value="Ambiance">Ambiance</option>
                                <option value="Backstage">Backstage</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image_path" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_path" name="image_path" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('admin.galeries.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection