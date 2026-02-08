@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Gestion des Conditions Générales</h4>
                    <a href="{{ route('admin.conditions.create') }}" class="btn btn-primary">Ajouter une Condition</a>
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
                                    <th>Titre</th>
                                    <th>Contenu</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($conditions as $condition)
                                    <tr>
                                        <td>{{ $condition->order }}</td>
                                        <td>{{ $condition->title }}</td>
                                        <td>{{ Str::limit($condition->content, 100) }}</td>
                                        <td>
                                            <a href="{{ route('admin.conditions.edit', $condition->id) }}"
                                                class="btn btn-sm btn-warning">Modifier</a>
                                            <form action="{{ route('admin.conditions.destroy', $condition->id) }}" method="POST"
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