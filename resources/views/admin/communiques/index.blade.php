@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Gestion des Communiqués</h4>
                    <a href="{{ route('admin.communiques.create') }}" class="btn btn-primary">Ajouter un Communiqué</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Fichier</th>
                                    <th>Date de publication</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($communiques as $communique)
                                    <tr>
                                        <td>{{ $communique->title }}</td>
                                        <td><a href="{{ asset('storage/' . $communique->file_path) }}"
                                                target="_blank">Télécharger</a></td>
                                        <td>{{ $communique->published_at ? $communique->published_at->format('d/m/Y') : 'N/A' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.communiques.edit', $communique->id) }}"
                                                class="btn btn-sm btn-warning">Modifier</a>
                                            <form action="{{ route('admin.communiques.destroy', $communique->id) }}"
                                                method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr ?');">
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
    </div>
@endsection