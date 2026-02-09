@extends('admin.layouts.template')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Services de la Page d'Accueil</h4>
        <a href="{{ route('admin.home-services.create') }}" class="btn btn-primary">Ajouter un Service</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Ordre</th>
                        <th class="text-center">Icône</th>
                        <th class="text-center">Titre</th>
                        <th class="text-center">Couleur</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td class="text-center">{{ $service->order }}</td>
                            <td class="text-center"><i class="bi {{ $service->icon }} fs-4"></i></td>
                            <td class="text-center">{{ $service->title }}</td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $service->color_class }}</span></td>
                            <td class="text-center">
                                <a href="{{ route('admin.home-services.edit', $service->id) }}"
                                    class="btn btn-sm btn-warning">Modifier</a>
                                <form action="{{ route('admin.home-services.destroy', $service->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Supprimer ce service ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection