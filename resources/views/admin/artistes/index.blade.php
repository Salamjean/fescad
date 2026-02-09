@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Artistes & Invités</h4>
                    <a href="{{ route('admin.artistes.create') }}" class="btn btn-primary">Ajouter un artiste</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Image</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Rôle</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($artistes as $artiste)
                                <tr>
                                    <td class="text-center">
                                        @if($artiste->image)
                                            <img src="{{ asset($artiste->image) }}" width="50" class="img-thumbnail rounded-circle">
                                        @else
                                            <span class="badge bg-secondary">N/A</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $artiste->name }}</td>
                                    <td class="text-center">{{ $artiste->role }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.artistes.edit', $artiste->id) }}"
                                            class="btn btn-sm btn-warning">Modifier</a>
                                        <form action="{{ route('admin.artistes.destroy', $artiste->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Êtes-vous sûr ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection