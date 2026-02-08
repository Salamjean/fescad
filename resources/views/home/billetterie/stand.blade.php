@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Réserver un Stand</h1>
            <p>Devenez exposant et profitez d'une visibilité exceptionnelle au FESCAD.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Réservation Stand</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Stand Section -->
    <section id="stand" class="stand section">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <!-- Left side with image or info -->
                            <div class="col-md-4 text-white d-flex flex-column align-items-center justify-content-center p-5 text-center"
                                style="background-color: #1e4356;">
                                <i class="bi bi-shop display-1 mb-3"></i>
                                <h3 class="fw-bold">Pourquoi Exposant ?</h3>
                                <p class="mt-3">Rejoignez des centaines d'exposants et présentez vos produits à un public
                                    diversifié.</p>
                                <ul class="list-unstyled text-start mt-4">
                                    <li class="mb-2"><i class="bi bi-check2-circle me-2"></i> Visibilité accrue</li>
                                    <li class="mb-2"><i class="bi bi-check2-circle me-2"></i> Réseautage B2B</li>
                                    <li class="mb-2"><i class="bi bi-check2-circle me-2"></i> Ventes directes</li>
                                </ul>
                            </div>
                            <!-- Right side with form -->
                            <div class="col-md-8 bg-white p-5">
                                <h3 class="fw-bold mb-4" style="color: #1e4356;">Formulaire d'Inscription</h3>

                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <form action="{{ route('billetterie.stand.store') }}" method="post" class="needs-validation"
                                    novalidate>
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="company"
                                                class="form-label text-muted small text-uppercase fw-bold">Structure /
                                                Entreprise</label>
                                            <input type="text" class="form-control bg-light border-0" id="company"
                                                name="company" placeholder="Nom de votre structure" required
                                                style="height: 50px;">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="representative"
                                                class="form-label text-muted small text-uppercase fw-bold">Représentant</label>
                                            <input type="text" class="form-control bg-light border-0" id="representative"
                                                name="representative" placeholder="Nom du responsable" required
                                                style="height: 50px;">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email"
                                                class="form-label text-muted small text-uppercase fw-bold">Email</label>
                                            <input type="email" class="form-control bg-light border-0" id="email"
                                                name="email" placeholder="contact@entreprise.com" required
                                                style="height: 50px;">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone"
                                                class="form-label text-muted small text-uppercase fw-bold">Téléphone</label>
                                            <input type="tel" class="form-control bg-light border-0" id="phone" name="phone"
                                                placeholder="+225 01 02 03 04" required style="height: 50px;">
                                        </div>
                                        <div class="col-12">
                                            <label for="stand_type"
                                                class="form-label text-muted small text-uppercase fw-bold">Type de Stand
                                                Souhaité</label>
                                            <select class="form-select bg-light border-0" id="stand_type" name="stand_type"
                                                required style="height: 50px;">
                                                <option value="" selected disabled>Sélectionnez une option</option>
                                                <option value="gastronomie">Gastronomie (Restauration)</option>
                                                <option value="artisanat">Artisanat & Création</option>
                                                <option value="commercial">Stand Commercial</option>
                                                <option value="institutionnel">Institutionnel</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="products"
                                                class="form-label text-muted small text-uppercase fw-bold">Description des
                                                produits/services</label>
                                            <textarea class="form-control bg-light border-0" id="products" name="products"
                                                rows="3"
                                                placeholder="Décrivez brièvement ce que vous allez exposer..."></textarea>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn text-white w-100 rounded-3 py-3 fw-bold"
                                                style="background-color: #1e4356;">
                                                SOUMETTRE MA RESERVATION <i class="bi bi-arrow-right ms-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection