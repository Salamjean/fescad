@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Programme du Festival</h4>
                    <a href="{{ route('admin.programme.create') }}" class="btn btn-primary">Ajouter un événement</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Titre</th>
                                <th>Lieu</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($programmes as $programme)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($programme->date)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($programme->start_time)->format('H:i') }}</td>
                                    <td>{{ $programme->title }}</td>
                                    <td>{{ $programme->location }}</td>
                                    <td>
                                        <a href="{{ route('admin.programme.edit', $programme->id) }}"
                                            class="btn btn-sm btn-warning">Modifier</a>
                                        <form action="{{ route('admin.programme.destroy', $programme->id) }}" method="POST"
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