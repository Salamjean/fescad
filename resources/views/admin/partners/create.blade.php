@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter un Partenaire</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nom du Partenaire</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Ordre d'affichage</label>
                                <input type="number" name="order" id="order" class="form-control"
                                    value="{{ old('order', 0) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label">Site Web (Optionnel)</label>
                            <input type="url" name="website" id="website" class="form-control"
                                value="{{ old('website') }}" placeholder="https://example.com">
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control" required>
                            <small class="text-muted">Format recommandé : PNG ou SVG transparent.</small>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1"
                                checked>
                            <label for="is_active" class="form-check-label">Actif</label>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                            <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
