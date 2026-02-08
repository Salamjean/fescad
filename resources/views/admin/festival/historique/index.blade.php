@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Historique du Festival</h4>
                    <a href="{{ route('admin.festival.historique.create') }}" class="btn btn-primary">Ajouter un
                        événement</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Année</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($historiques as $item)
                                <tr>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ Str::limit($item->description, 50) }}</td>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset($item->image) }}" width="50" class="img-thumbnail">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.festival.historique.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">Modifier</a>
                                        <form action="{{ route('admin.festival.historique.destroy', $item->id) }}" method="POST"
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