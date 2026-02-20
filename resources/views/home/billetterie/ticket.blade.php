@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Devenir un partenaire</h1>
            <p>Devenir un partenaire du FESCAD.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Partenaire</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Ticket Section -->
    <section id="ticket" class="ticket section" style="background-color: #f5f5f5;">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                        <div class="card-header text-white text-center py-4" style="background-color: #1e4356;">
                            <h3 class="mb-0 fw-bold" style="color: white;"><i class="bi bi-ticket-perforated me-2"></i>
                                Devenir un partenaire du FESCAD</h3>
                            <p class="mb-0 text-white-50 mt-2">Remplissez le formulaire ci-dessous pour devenir un partenaire du FESCAD.</p>
                        </div>
                        <div class="card-body p-5 bg-light">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('billetterie.ticket.store') }}" method="post" class="needs-validation"
                                novalidate>
                                @csrf
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nom complet" required>
                                            <label for="name">Nom et Prénoms</label>
                                            <div class="invalid-feedback">Veuillez entrer votre nom.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="name@example.com" required>
                                            <label for="email">Adresse Email</label>
                                            <div class="invalid-feedback">Veuillez entrer une adresse email valide.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control" id="phone" name="phone"
                                                placeholder="Numéro de téléphone" required>
                                            <label for="phone">Téléphone</label>
                                            <div class="invalid-feedback">Veuillez entrer votre numéro de téléphone.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="quantity" name="quantity"
                                                placeholder="Quantité" min="1" value="1" required>
                                            <label for="quantity">Quantité</label>
                                        </div>
                                    </div>
                                    <!-- Field for Ticket Type removed as per user request -->

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Message" id="message" name="message"
                                                style="height: 100px"></textarea>
                                            <label for="message">Message ou Demande Particulière (Optionnel)</label>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center mt-4">
                                        <button type="submit"
                                            class="btn text-white btn-lg rounded-pill px-5 shadow-sm hover-effect"
                                            style="background-color: #1e4356;">
                                            <i class="bi bi-send me-2"></i> Envoyer ma demande
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Style for floating labels and hover effects -->
    <style>
        .hover-effect:hover {
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
    </style>
@endsection