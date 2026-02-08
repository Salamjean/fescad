@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Devenir Bénévole</h1>
            <p>Rejoignez l'équipe dynamique du FESCAD et vivez le festival de l'intérieur.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Bénévoles</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-heart flex-shrink-0"></i>
                        <div>
                            <h3>Pourquoi devenir bénévole ?</h3>
                            <p>Participer à une aventure humaine unique, acquérir de l'expérience, rencontrer des artistes
                                et contribuer au succès d'un événement majeur.</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-gift flex-shrink-0"></i>
                        <div>
                            <h3>Avantages</h3>
                            <p>T-shirt officiel, repas fournis, accès aux concerts (hors heures de service), certificat de
                                bénévolat.</p>
                        </div>
                    </div><!-- End Info Item -->
                </div>

                <div class="col-lg-6">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('inscription.store') }}" method="post" class="" data-aos="fade-up"
                        data-aos-delay="200">
                        @csrf
                        <input type="hidden" name="type" value="benevole">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Nom complet" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="tel" class="form-control" name="phone" placeholder="Téléphone" required="">
                            </div>

                            <div class="col-md-12">
                                <select class="form-select" name="mission">
                                    <option selected>Domaine de préférence</option>
                                    <option value="accueil">Accueil & Orientation</option>
                                    <option value="logistique">Logistique & Manutention</option>
                                    <option value="communication">Communication & Réseaux Sociaux</option>
                                    <option value="securite">Sécurité & Flux</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Motivation (Facultatif)"
                                    required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit">Envoyer ma candidature</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection