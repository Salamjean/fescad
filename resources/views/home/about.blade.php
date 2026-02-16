@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Présentation du FESCAD</h1>
            <p>Découvrez l'essence du Festival Culturel d'Adjamé : une célébration vibrante de l'art, de la culture et de la
                communauté.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Présentation</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset(optional($presentation)->image ?? 'assets/img/about.jpg') }}" class="img-fluid"
                        alt="{{ optional($presentation)->title ?? 'À propos' }}">
                    @if(optional($presentation)->video_link)
                        <a href="{{ $presentation->video_link }}" class="glightbox pulsating-play-btn"></a>
                    @endif
                </div>
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>{{ optional($presentation)->title ?? 'Présentation du FESCAD' }}</h3>
                    <p class="fst-italic">
                        {{ optional($presentation)->subtitle }}
                    </p>

                    {!! nl2br(e(optional($presentation)->description)) !!}

                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Éditions</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="40" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Artistes</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="3000" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Festivaliers</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Partenaires</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Stats Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">
        <div class="container">
            <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-10">
                    <div class="text-center">
                        <h3>Rejoignez la fête !</h3>
                        <p>Que vous soyez spectateur, artiste ou partenaire, le FESCAD a besoin de vous pour vibrer. Ne
                            manquez pas cette occasion de faire partie de l'histoire culturelle d'Adjamé.</p>
                        <a class="cta-btn" href="#">Voir le Programme</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Call To Action Section -->

@endsection