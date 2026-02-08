@extends('admin.layouts.template')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div
                            class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">Détails de l'inscription #{{ $inscription->id }}
                            </h6>
                            <a href="{{ route('admin.inscriptions.index') }}" class="btn btn-light btn-sm me-3">Retour</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Informations Générales
                                </h6>
                                <ul class="list-group">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                            class="text-dark">Type:</strong> <span
                                            class="text-capitalize">{{ $inscription->type }}</span></li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nom /
                                            Structure:</strong> {{ $inscription->name }}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Email:</strong> {{ $inscription->email }}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Téléphone:</strong> {{ $inscription->phone }}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Date:</strong>
                                        {{ $inscription->created_at->format('d/m/Y H:i') }}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Statut:</strong>
                                        <span
                                            class="badge badge-sm bg-gradient-{{ $inscription->status == 'pending' ? 'warning' : ($inscription->status == 'approved' ? 'success' : 'danger') }}">
                                            {{ $inscription->status }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Détails Spécifiques
                                </h6>
                                @if($inscription->details && is_array($inscription->details))
                                    <ul class="list-group">
                                        @foreach($inscription->details as $key => $value)
                                            <li class="list-group-item border-0 ps-0 text-sm">
                                                <strong
                                                    class="text-dark text-capitalize">{{ str_replace('_', ' ', $key) }}:</strong>
                                                {{ is_string($value) ? $value : json_encode($value) }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-sm text-secondary">Aucun détail supplémentaire.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection