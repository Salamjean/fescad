@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier l'événement</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.programme.update', $programme->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control"
                                    value="{{ $programme->date->format('Y-m-d') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Heure de début</label>
                                <input type="time" name="start_time" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($programme->start_time)->format('H:i') }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Titre</label>
                            <input type="text" name="title" class="form-control" value="{{ $programme->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control"
                                rows="3">{{ $programme->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Lieu</label>
                            <input type="text" name="location" class="form-control" value="{{ $programme->location }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('admin.programme.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection