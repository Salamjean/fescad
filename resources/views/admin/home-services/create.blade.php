@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter un Service</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.home-services.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Titre</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Icône (Bootstrap Icon class)</label>
                                    <input type="text" name="icon" class="form-control" placeholder="bi-calendar-event"
                                        required>
                                    <small><a href="https://icons.getbootstrap.com/" target="_blank">Voir les
                                            icônes</a></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Classe de Couleur</label>
                                    <select name="color_class" class="form-control" required>
                                        <option value="item-cyan">Cyan</option>
                                        <option value="item-orange">Orange</option>
                                        <option value="item-teal">Teal</option>
                                        <option value="item-red">Red</option>
                                        <option value="item-pink">Pink</option>
                                        <option value="item-indigo">Indigo</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Lien (Route name or URL)</label>
                            <input type="text" name="link" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Ordre d'affichage</label>
                            <input type="number" name="order" class="form-control" value="0" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.home-services.index') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection