@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Œuvres Sociales</h1>
            <p>Le FESCAD, c'est aussi un engagement envers la communauté d'Adjamé.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Œuvres Sociales</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                    @if(isset($page) && $page->content)
                        {!! $page->content !!}
                    @else
                        <h3>Engagement Communautaire</h3>
                        <p class="fst-italic">
                            Chaque année, le festival reverse une partie de ses bénéfices à des actions caritatives.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Rénovation d'écoles primaires dans la commune
                                    d'Adjamé.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Dons de kits scolaires aux familles défavorisées.</span>
                            </li>
                            <li><i class="bi bi-check2-all"></i> <span>Soutien aux orphelinats locaux.</span></li>
                        </ul>
                        <p>
                            Notre mission va au-delà de la culture. Nous croyons en l'impact positif que nous pouvons avoir sur
                            notre environnement et sur la jeunesse d'Adjamé. Rejoignez-nous dans cette aventure humaine.
                        </p>
                    @endif
                </div>

            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-emoji-smile"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="1500" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Enfants aidés</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-journal-richtext"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Écoles rénovées</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-headset"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Associations partenaires</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-people"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Bénévoles engagés</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Stats Section -->


@endsection