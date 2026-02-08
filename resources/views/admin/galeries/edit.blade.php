@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier l'Image</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.galeries.update', $galery->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $galery->title }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Catégorie</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="Concert" {{ $galery->category == 'Concert' ? 'selected' : '' }}>Concert
                                </option>
                                <option value="Ambiance" {{ $galery->category == 'Ambiance' ? 'selected' : '' }}>Ambiance
                                </option>
                                <option value="Backstage" {{ $galery->category == 'Backstage' ? 'selected' : '' }}>Backstage
                                </option>
                                <option value="Autre" {{ $galery->category == 'Autre' ? 'selected' : '' }}>Autre</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image_path" class="form-label">Image (Laisser vide pour conserver
                                l'actuelle)</label>
                            <input type="file" class="form-control" id="image_path" name="image_path">
                            @if($galery->image_path)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $galery->image_path) }}" alt="{{ $galery->title }}"
                                        width="100">
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('admin.galeries.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection