@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Gestion des Tarifs</h4>
                    <a href="{{ route('admin.tarifs.create') }}" class="btn btn-primary">Ajouter un Tarif</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prix</th>
                                    <th>Icone</th>
                                    <th>Caractéristiques</th>
                                    <th>Recommandé</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tarifs as $tarif)
                                    <tr>
                                        <td>{{ $tarif->name }}</td>
                                        <td>{{ $tarif->price }}</td>
                                        <td><i class="{{ $tarif->icon }}"></i> ({{ $tarif->icon }})</td>
                                        <td>
                                            @if($tarif->features)
                                                <ul>
                                                    @foreach($tarif->features as $feature)
                                                        <li>{{ $feature }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td>
                                            @if($tarif->recommended)
                                                <span class="badge bg-success">Oui</span>
                                            @else
                                                <span class="badge bg-secondary">Non</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.tarifs.edit', $tarif->id) }}"
                                                class="btn btn-sm btn-warning">Modifier</a>
                                            <form action="{{ route('admin.tarifs.destroy', $tarif->id) }}" method="POST"
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