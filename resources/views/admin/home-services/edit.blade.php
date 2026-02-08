@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier le Service</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.home-services.update', $homeService->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Titre</label>
                            <input type="text" name="title" class="form-control" value="{{ $homeService->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control"
                                rows="3">{{ $homeService->description }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Icône (Bootstrap Icon class)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi {{ $homeService->icon }}"></i></span>
                                        <input type="text" name="icon" class="form-control" value="{{ $homeService->icon }}"
                                            required>
                                    </div>
                                    <small><a href="https://icons.getbootstrap.com/" target="_blank">Voir les
                                            icônes</a></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Classe de Couleur</label>
                                    <select name="color_class" class="form-control" required>
                                        <option value="item-cyan" {{ $homeService->color_class == 'item-cyan' ? 'selected' : '' }}>Cyan</option>
                                        <option value="item-orange" {{ $homeService->color_class == 'item-orange' ? 'selected' : '' }}>Orange</option>
                                        <option value="item-teal" {{ $homeService->color_class == 'item-teal' ? 'selected' : '' }}>Teal</option>
                                        <option value="item-red" {{ $homeService->color_class == 'item-red' ? 'selected' : '' }}>Red</option>
                                        <option value="item-pink" {{ $homeService->color_class == 'item-pink' ? 'selected' : '' }}>Pink</option>
                                        <option value="item-indigo" {{ $homeService->color_class == 'item-indigo' ? 'selected' : '' }}>Indigo</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Lien (Route name or URL)</label>
                            <input type="text" name="link" class="form-control" value="{{ $homeService->link }}">
                        </div>

                        <div class="mb-3">
                            <label>Ordre d'affichage</label>
                            <input type="number" name="order" class="form-control" value="{{ $homeService->order }}"
                                required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.home-services.index') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection