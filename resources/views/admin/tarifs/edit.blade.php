@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier un Tarif</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.tarifs.update', $tarif->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du Tarif</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $tarif->name }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Prix</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $tarif->price }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Classe Icone</label>
                            <input type="text" class="form-control" id="icon" name="icon" value="{{ $tarif->icon }}">
                        </div>
                        <div class="mb-3">
                            <label for="features" class="form-label">Caractéristiques (Une par ligne)</label>
                            <textarea class="form-control" id="features" name="features"
                                rows="5">{{ is_array($tarif->features) ? implode("\n", $tarif->features) : $tarif->features }}</textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="recommended" name="recommended" value="1" {{ $tarif->recommended ? 'checked' : '' }}>
                            <label class="form-check-label" for="recommended">Marquer comme Recommandé</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('admin.tarifs.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection