@extends('admin.layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Gestion des Pages (Infos Pratiques)</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Titre</th>
                                    <th class="text-center">Slug</th>
                                    <th class="text-center">Dernière modification</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <td class="text-center">{{ $page->title }}</td>
                                        <td class="text-center">{{ $page->slug }}</td>
                                        <td class="text-center">{{ $page->updated_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.pages.edit', $page->id) }}"
                                                class="btn btn-sm btn-primary">Modifier</a>
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