@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier la Slide : {{ $heroSlide->title }}</h4>
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

                    <form action="{{ route('admin.hero-slides.update', $heroSlide->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Titre</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title', $heroSlide->title) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Ordre d'affichage</label>
                                <input type="number" name="order" id="order" class="form-control"
                                    value="{{ old('order', $heroSlide->order) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control"
                                rows="3">{{ old('description', $heroSlide->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image de fond</label>
                            @if($heroSlide->image)
                                <div class="mb-2">
                                    <img src="{{ Str::startsWith($heroSlide->image, 'assets/') ? asset($heroSlide->image) : asset('storage/' . $heroSlide->image) }}"
                                        alt="Image actuelle" width="200" class="img-thumbnail">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="form-control">
                            <small class="text-muted">Laissez vide pour conserver l'image actuelle.</small>
                        </div>

                        <hr>
                        <h5>Bouton 1</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="btn1_text" class="form-label">Texte du bouton 1</label>
                                <input type="text" name="btn1_text" id="btn1_text" class="form-control"
                                    value="{{ old('btn1_text', $heroSlide->btn1_text) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="btn1_link" class="form-label">Lien du bouton 1</label>
                                <input type="text" name="btn1_link" id="btn1_link" class="form-control"
                                    value="{{ old('btn1_link', $heroSlide->btn1_link) }}">
                            </div>
                        </div>

                        <hr>
                        <h5>Bouton 2 (Optionnel)</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="btn2_text" class="form-label">Texte du bouton 2</label>
                                <input type="text" name="btn2_text" id="btn2_text" class="form-control"
                                    value="{{ old('btn2_text', $heroSlide->btn2_text) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="btn2_link" class="form-label">Lien du bouton 2</label>
                                <input type="text" name="btn2_link" id="btn2_link" class="form-control"
                                    value="{{ old('btn2_link', $heroSlide->btn2_link) }}">
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ $heroSlide->is_active ? 'checked' : '' }}>
                            <label for="is_active" class="form-check-label">Actif</label>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection