@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Artistes & Invités</h1>
            <p>Découvrez les talents qui feront vibrer la scène du FESCAD cette année.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Artistes</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Speakers Section -->
    <section id="speakers" class="speakers section">

        <div class="container" data-aos="fade-up">

            <div class="row g-4">
                @foreach($artistes as $artiste)
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <img src="{{ asset($artiste->image ?? 'assets/img/team/team-1.jpg') }}" class="img-fluid"
                                alt="{{ $artiste->name }}">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>{{ $artiste->name }}</h4>
                                    <span>{{ $artiste->role }}</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>

        </div>

    </section><!-- /Speakers Section -->

@endsection