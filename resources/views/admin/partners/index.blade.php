@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Gestion des Partenaires</h4>
                    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">Ajouter un Partenaire</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Ordre</th>
                                    <th class="text-center">Logo</th>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Site Web</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($partners as $partner)
                                    <tr>
                                        <td class="text-center">{{ $partner->order }}</td>
                                        <td class="text-center">
                                            @if($partner->logo)
                                                <img src="{{ asset('storage/' . $partner->logo) }}"
                                                    alt="{{ $partner->name }}" width="100">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $partner->name }}</td>
                                        <td class="text-center">
                                            @if($partner->website)
                                                <a href="{{ $partner->website }}" target="_blank">{{ $partner->website }}</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <span class="badge {{ $partner->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $partner->is_active ? 'Actif' : 'Inactif' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.partners.edit', $partner->id) }}"
                                                class="btn btn-sm btn-warning">Modifier</a>
                                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST"
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
