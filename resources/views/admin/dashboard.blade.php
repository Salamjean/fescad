@extends('admin.layouts.template')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tableau de bord</h1>

        <div class="row">
            <!-- Inscriptions card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Inscriptions (Bénévoles)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['benevole'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-people fs-2 text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inscriptions card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Inscriptions (Exposants)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['exposant'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-shop fs-2 text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inscriptions card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Inscriptions (Artistes)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['artiste_ins'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-music-note-beamed fs-2 text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inscriptions card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Demandes Presse</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['presse'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-mic fs-2 text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Stats -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Actualités</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_news'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-newspaper fs-2 text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Partenaires</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_partners'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-hand-thumbs-up fs-2 text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Artistes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_artists'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-person-badge fs-2 text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Points Forts du Festival</h6>
                    </div>
                    <div class="card-body">
                        @forelse($features as $feature)
                            <div class="mb-3">
                                <h6 class="font-weight-bold">{{ $feature->title }}</h6>
                                <p class="text-sm text-gray-600">{{ Str::limit($feature->description, 100) }}</p>
                            </div>
                        @empty
                            <p>Aucun point fort défini pour le moment.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Dernières inscriptions</h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom
                                        </th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentInscriptions as $inscription)
                                        <tr>
                                            <td class="text-sm ps-3">
                                                <span
                                                    class="badge badge-sm bg-gradient-info text-capitalize text-black text-center">{{ $inscription->type }}</span>
                                            </td>
                                            <td class="text-sm">
                                                <h6 class="mb-0 text-sm">{{ $inscription->name }}</h6>
                                            </td>
                                            <td class="text-end pe-3">
                                                <a href="{{ route('admin.inscriptions.show', $inscription->id) }}"
                                                    class="text-secondary font-weight-bold text-xs">
                                                    Voir
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4">
                                                <p>Aucune inscription pour le moment.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection