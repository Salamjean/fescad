@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter un événement historique</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.festival.historique.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Année</label>
                            <input type="text" name="year" class="form-control" required
                                placeholder="ex: 2010 - Première Édition">
                        </div>

                        <div class="mb-3">
                            <label>Titre</label>
                            <input type="text" name="title" class="form-control" required
                                placeholder="ex: Lancement officiel">
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="5" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('admin.festival.historique.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection