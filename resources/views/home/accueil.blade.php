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

    <!-- Recent News Section -->
    <section id="recent-news" class="recent-news section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Actualités</h2>
            <p>Retrouvez les dernières informations du FESCAD</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="swiper init-swiper" data-aos="fade-up" data-aos-delay="100">
                <script type="application/json" class="swiper-config">
                    {
                      "loop": true,
                      "speed": 600,
                      "autoplay": {
                        "delay": 5000
                      },
                      "slidesPerView": "auto",
                      "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                      },
                      "breakpoints": {
                        "320": {
                          "slidesPerView": 1,
                          "spaceBetween": 40
                        },
                        "1200": {
                          "slidesPerView": 3,
                          "spaceBetween": 20
                        }
                      }
                    }
                    </script>
                <div class="swiper-wrapper">
                    @foreach($actualites as $actualite)
                        <div class="swiper-slide">
                            <div class="news-item position-relative h-100 p-3 border rounded shadow-sm bg-white">
                                <div class="news-img overflow-hidden rounded mb-3">
                                    <img src="{{ asset('storage/' . $actualite->image) }}" class="img-fluid w-100"
                                        alt="{{ $actualite->title }}"
                                        style="height: 200px; object-fit: cover; transition: 0.3s;">
                                </div>
                                <div class="news-content">
                                    <div class="meta text-muted small mb-2 d-flex align-items-center">
                                        <i class="bi bi-calendar me-2"></i>
                                        {{ $actualite->published_at ? $actualite->published_at->format('d/m/Y') : $actualite->created_at->format('d/m/Y') }}
                                    </div>
                                    <h3 class="h5 fw-bold mb-2">
                                        <a href="{{ route('media.actualites') }}"
                                            class="stretched-link text-decoration-none text-dark">{{ $actualite->title }}</a>
                                    </h3>
                                    <p class="text-muted small mb-0">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($actualite->content), 100) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Recent News Section -->

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

    <!-- Partners Section -->
    <section class="partners-section mb-5">
        <div class="container">

            <!-- Section Header -->
            <div class="container section-title" data-aos="fade-up">
                <span class="partners-count">Nos Partenaires</span>
                <h2>Ils nous font confiance</h2>
                <p>Découvrez les organisations et entreprises qui soutiennent le FESCAD</p>
            </div>

            <!-- Partners Carousel -->
            <div class="row align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="200">

                @foreach ($partners as $partner)
                    <div class="col-6 col-md-3 col-lg-2 partner-item" style="text-align: center; margin-bottom: 30px;">
                        <div class="partner-logo mb-2">
                            @if($partner->website)
                                <a href="{{ $partner->website }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="img-fluid"
                                        style="max-height: 80px; filter: grayscale(100%); transition: 0.3s;"
                                        onmouseover="this.style.filter='grayscale(0%)'"
                                        onmouseout="this.style.filter='grayscale(100%)'">
                                </a>
                            @else
                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="img-fluid"
                                    style="max-height: 80px; filter: grayscale(100%); transition: 0.3s;"
                                    onmouseover="this.style.filter='grayscale(0%)'"
                                    onmouseout="this.style.filter='grayscale(100%)'">
                            @endif
                        </div>
                        <p class="partner-name" style="margin-top: 8px; font-size: 14px; font-weight: 600; color: #333;">
                            {{ $partner->name }}
                        </p>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- /Partners Section -->
@endsection