@extends('admin.layouts.template')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Points Forts (Pourquoi participer ?)</h4>
        <a href="{{ route('admin.home-features.create') }}" class="btn btn-primary">Ajouter un Élément</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ordre</th>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Layout</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($features as $feature)
                        <tr>
                            <td>{{ $feature->order }}</td>
                            <td>
                                @if($feature->image)
                                    <img src="{{ asset($feature->image) }}" width="60" class="img-thumbnail">
                                @endif
                            </td>
                            <td>{{ $feature->title }}</td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $feature->is_reversed ? 'Image Droite' : 'Image Gauche' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.home-features.edit', $feature->id) }}"
                                    class="btn btn-sm btn-warning">Modifier</a>
                                <form action="{{ route('admin.home-features.destroy', $feature->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Supprimer cet élément ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection