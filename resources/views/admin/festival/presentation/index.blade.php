@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier la Présentation du Festival</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.festival.presentation.update', $presentation->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Titre</label>
                            <input type="text" name="title" class="form-control" value="{{ $presentation->title }}">
                        </div>

                        <div class="mb-3">
                            <label>Sous-titre</label>
                            <input type="text" name="subtitle" class="form-control" value="{{ $presentation->subtitle }}">
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control"
                                rows="10">{{ $presentation->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Points Clés (un par ligne)</label>
                            <textarea name="points_text" class="form-control"
                                rows="5">@if($presentation->points){{ implode("\n", $presentation->points) }}@endif</textarea>
                            <small class="text-muted">Chaque ligne apparaîtra avec une icône de validation sur le
                                site.</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Bouton 1 - Texte</label>
                                    <input type="text" name="btn1_text" class="form-control"
                                        value="{{ $presentation->btn1_text }}">
                                </div>
                                <div class="mb-3">
                                    <label>Bouton 1 - Lien</label>
                                    <input type="text" name="btn1_link" class="form-control"
                                        value="{{ $presentation->btn1_link }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Bouton 2 - Texte</label>
                                    <input type="text" name="btn2_text" class="form-control"
                                        value="{{ $presentation->btn2_text }}">
                                </div>
                                <div class="mb-3">
                                    <label>Bouton 2 - Lien</label>
                                    <input type="text" name="btn2_link" class="form-control"
                                        value="{{ $presentation->btn2_link }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Lien Vidéo (YouTube)</label>
                            <input type="text" name="video_link" class="form-control"
                                value="{{ $presentation->video_link }}">
                        </div>

                        <div class="mb-3">
                            <label>Image de la page À propos (Actuelle)</label>
                            @if($presentation->image)
                                <br><img src="{{ asset($presentation->image) }}" width="200" class="img-thumbnail">
                            @endif
                            <input type="file" name="image" class="form-control mt-2">
                            <small class="text-muted">Image affichée à côté du texte dans la section "À propos" de
                                l'accueil.</small>
                        </div>

                        <div class="mb-3">
                            <label>Image de fond de la section Hero (Actuelle)</label>
                            @if($presentation->hero_background)
                                <br><img src="{{ asset($presentation->hero_background) }}" width="200" class="img-thumbnail">
                            @else
                                <br><small class="text-warning">Image par défaut utilisée (assets/img/ttt.png)</small>
                            @endif
                            <input type="file" name="hero_background" class="form-control mt-2">
                            <small class="text-muted">Grande image de fond avec l'effet de courbe en haut de la page
                                d'accueil.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection