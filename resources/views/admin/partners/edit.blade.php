@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier le Partenaire : {{ $partner->name }}</h4>
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

                    <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nom du Partenaire</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $partner->name) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Ordre d'affichage</label>
                                <input type="number" name="order" id="order" class="form-control"
                                    value="{{ old('order', $partner->order) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label">Site Web (Optionnel)</label>
                            <input type="url" name="website" id="website" class="form-control"
                                value="{{ old('website', $partner->website) }}" placeholder="https://example.com">
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            @if($partner->logo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo actuel" width="200"
                                        class="img-thumbnail">
                                </div>
                            @endif
                            <input type="file" name="logo" id="logo" class="form-control">
                            <small class="text-muted">Laissez vide pour conserver le logo actuel.</small>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ $partner->is_active ? 'checked' : '' }}>
                            <label for="is_active" class="form-check-label">Actif</label>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection