@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier le Message du Commissaire</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.festival.commissaire.update', $commissaire->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Nom du Commissaire</label>
                            <input type="text" name="name" class="form-control" value="{{ $commissaire->name }}">
                        </div>

                        <div class="mb-3">
                            <label>Rôle</label>
                            <input type="text" name="role" class="form-control" value="{{ $commissaire->role }}">
                        </div>

                        <div class="mb-3">
                            <label>Titre du Message</label>
                            <input type="text" name="title" class="form-control" value="{{ $commissaire->title }}">
                        </div>

                        <div class="mb-3">
                            <label>Message</label>
                            <textarea name="message" class="form-control" rows="10">{{ $commissaire->message }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Photo du Commissaire</label>
                            @if($commissaire->image)
                                <br><img src="{{ asset($commissaire->image) }}" width="150" class="img-thumbnail">
                            @endif
                            <input type="file" name="image" class="form-control mt-2">
                        </div>

                        <div class="mb-3">
                            <label>Signature (Image)</label>
                            @if($commissaire->signature_image)
                                <br><img src="{{ asset($commissaire->signature_image) }}" width="100" class="img-thumbnail">
                            @endif
                            <input type="file" name="signature_image" class="form-control mt-2">
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection