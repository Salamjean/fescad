@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Gestion du Carousel (Accueil)</h4>
                    <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-primary">Ajouter une Slide</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Ordre</th>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slides as $slide)
                                    <tr>
                                        <td>{{ $slide->order }}</td>
                                        <td>
                                            @if($slide->image)
                                                <img src="{{ Str::startsWith($slide->image, 'assets/') ? asset($slide->image) : asset('storage/' . $slide->image) }}"
                                                    alt="{{ $slide->title }}" width="100">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $slide->title }}</td>
                                        <td>
                                            <span class="badge {{ $slide->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $slide->is_active ? 'Actif' : 'Inactif' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.hero-slides.edit', $slide->id) }}"
                                                class="btn btn-sm btn-warning">Modifier</a>
                                            <form action="{{ route('admin.hero-slides.destroy', $slide->id) }}" method="POST"
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