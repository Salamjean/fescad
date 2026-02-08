@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Gestion des Actualités</h4>
                    <a href="{{ route('admin.actualites.create') }}" class="btn btn-primary">Ajouter une Actualité</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th>Date de publication</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actualites as $actualite)
                                    <tr>
                                        <td>
                                            @if($actualite->image)
                                                <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->title }}"
                                                    width="50">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $actualite->title }}</td>
                                        <td>{{ $actualite->published_at ? $actualite->published_at->format('d/m/Y H:i') : 'Non publié' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.actualites.edit', $actualite->id) }}"
                                                class="btn btn-sm btn-warning">Modifier</a>
                                            <form action="{{ route('admin.actualites.destroy', $actualite->id) }}" method="POST"
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
    </div>
@endsection