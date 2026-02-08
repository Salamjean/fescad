@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Communiqués de Presse</h1>
            <p>Espace réservé aux médias et aux professionnels.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Presse</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Services Section -->
    <section id="press" class="services section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i> Pour toute demande d'accréditation ou d'interview, veuillez
                        contacter notre service presse à <strong class="text-dark">presse@fescad.com</strong>
                    </div>
                </div>

                @forelse($communiques as $communique)
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-file-earmark-pdf"></i></div>
                            <h3>{{ $communique->title }}</h3>
                            <p>Publié le {{ $communique->published_at ? $communique->published_at->format('d/m/Y') : '' }}</p>
                            @if (file_exists(public_path('storage/' . $communique->file_path)))
                                <a href="{{ asset('storage/' . $communique->file_path) }}" target="_blank"
                                    class="readmore stretched-link">Télécharger le PDF <i class="bi bi-download"></i></a>
                            @else
                                <a href="{{ asset($communique->file_path) }}" target="_blank"
                                    class="readmore stretched-link">Télécharger le PDF <i class="bi bi-download"></i></a>
                            @endif

                        </div>
                    </div><!-- End Service Item -->
                @empty
                    <div class="col-md-12">
                        <p class="text-center">Aucun communiqué de presse disponible pour le moment.</p>
                    </div>
                @endforelse

            </div>

        </div>

    </section><!-- /Services Section -->
@endsection