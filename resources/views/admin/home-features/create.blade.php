@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter un Point Fort</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.home-features.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Titre</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Sous-titre (Optionnel)</label>
                                    <input type="text" name="subtitle" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Points Clés (un par ligne)</label>
                            <textarea name="points_text" class="form-control" rows="5"
                                placeholder="Premier point&#10;Deuxième point..."></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Ordre</label>
                                    <input type="number" name="order" class="form-control" value="0" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Bouton - Texte</label>
                                    <input type="text" name="btn_text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Bouton - Lien</label>
                                    <input type="text" name="btn_link" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_reversed" id="is_reversed">
                                <label class="form-check-label" for="is_reversed">Inverser la mise en page (Image à
                                    droite)</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.home-features.index') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection