@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Gestion de la Galerie</h4>
                    <a href="{{ route('admin.galeries.create') }}" class="btn btn-primary">Ajouter une Image</a>
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
                                    <th>Catégorie</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galeries as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                                width="50">
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>
                                            <a href="{{ route('admin.galeries.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">Modifier</a>
                                            <form action="{{ route('admin.galeries.destroy', $item->id) }}" method="POST"
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