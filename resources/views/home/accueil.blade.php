@extends('home.layouts.template')
@section('content')
    <!-- Hero Section -->
    @include('home.layouts.carousel')
    <!-- /Hero Section -->
    <section id="featured-services" class="featured-services section">

        <div class="container">

            <div class="row gy-4">
                @foreach ($homeServices as $service)
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="service-item {{ $service->color_class }} position-relative">
                            <div class="icon">
                                <i class="bi {{ $service->icon }}"></i>
                            </div>
                            <a href="{{ $service->link }}" class="stretched-link">
                                <h3>{{ $service->title }}</h3>
                            </a>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div><!-- End Service Item -->
                @endforeach
            </div>

        </div>

    </section>
    <!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

        <div class="container">

            <div class="row gy-4">
                <!-- Image/Visuel du festival avec vidéo de présentation -->
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset(optional($presentation)->image ?? 'assets/img/logo_fescad.png') }}" class="img-fluid"
                        alt="{{ optional($presentation)->title ?? 'FESCAD' }}">
                    <!-- Lien vers une vidéo de présentation du festival -->
                    @if(optional($presentation)->video_link)
                        <a href="{{ $presentation->video_link }}" class="glightbox pulsating-play-btn"></a>
                    @endif
                </div>

                <!-- Contenu de présentation -->
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>{{ optional($presentation)->title ?? 'Bienvenue au FESCAD' }}</h3>
                    <p class="fst-italic">
                        {{ optional($presentation)->subtitle }}
                    </p>
                    @if(optional($presentation)->points)
                        <ul>
                            @foreach ($presentation->points as $point)
                                <li><i class="bi bi-check2-all"></i> <span>{{ $point }}</span></li>
                            @endforeach
                        </ul>
                    @endif
                    <p>
                        {{ optional($presentation)->description }}
                    </p>
                    <!-- Liens vers les pages détaillées -->
                    <div class="mt-4">
                        @if(optional($presentation)->btn1_text)
                            <a href="{{ $presentation->btn1_link }}" class="btn btn-primary">{{ $presentation->btn1_text }}</a>
                        @endif
                        @if(optional($presentation)->btn2_text)
                            <a href="{{ $presentation->btn2_link }}"
                                class="btn btn-outline-primary ms-2">{{ $presentation->btn2_text }}</a>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- /About Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Pourquoi participer au FESCAD ?</h2>
            <p>Découvrez ce qui fait du Festival Culturel d'Adjamé un événement incontournable et unique en son genre</p>
        </div><!-- End Section Title -->

        <div class="container">

            @foreach ($homeFeatures as $feature)
                <!-- Feature Item -->
                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 {{ $feature->is_reversed ? 'order-1 order-md-2' : '' }} d-flex align-items-center"
                        data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{ asset($feature->image) }}" class="img-fluid" alt="{{ $feature->title }}">
                    </div>
                    <div class="col-md-7 {{ $feature->is_reversed ? 'order-2 order-md-1' : '' }}" data-aos="fade-up"
                        data-aos-delay="100">
                        <h3>{{ $feature->title }}</h3>
                        @if($feature->subtitle)
                            <p class="fst-italic">
                                {{ $feature->subtitle }}
                            </p>
                        @endif
                        @if($feature->description)
                            <p>
                                {{ $feature->description }}
                            </p>
                        @endif
                        @if($feature->points)
                            <ul>
                                @foreach ($feature->points as $point)
                                    <li><i class="bi bi-check"></i><span> {{ $point }}</span></li>
                                @endforeach
                            </ul>
                        @endif
                        @if($feature->btn_text)
                            <a href="{{ $feature->btn_link }}" class="btn btn-primary mt-3">{{ $feature->btn_text }}</a>
                        @endif
                    </div>
                </div><!-- Features Item -->
            @endforeach

        </div>

    </section>
@endsection