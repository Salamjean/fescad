@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter une Condition</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.conditions.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="order" class="form-label">Ordre d'affichage</label>
                            <input type="number" class="form-control" id="order" name="order" value="0" required>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre (ex: 1. Objet)</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Contenu</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('admin.conditions.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection