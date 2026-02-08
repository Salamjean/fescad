@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Galerie Photos</h1>
            <p>Revivez les meilleurs moments des éditions précédentes en images.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Galerie</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">Tout</li>
                    <li data-filter=".filter-Concert">Concerts</li>
                    <li data-filter=".filter-Ambiance">Ambiance</li>
                    <li data-filter=".filter-Backstage">Backstage</li>
                    <li data-filter=".filter-Autre">Autre</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    @foreach($galeries as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $item->category }}">
                            @if (file_exists(public_path('storage/' . $item->image_path)))
                                <img src="{{ asset('storage/' . $item->image_path) }}" class="img-fluid" alt="{{ $item->title }}">
                                <div class="portfolio-info">
                                    <h4>{{ $item->title }}</h4>
                                    <p>{{ $item->category }}</p>
                                    <a href="{{ asset('storage/' . $item->image_path) }}" title="{{ $item->title }}"
                                        data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                </div>
                            @else
                                <img src="{{ asset($item->image_path) }}" class="img-fluid" alt="{{ $item->title }}">
                                <div class="portfolio-info">
                                    <h4>{{ $item->title }}</h4>
                                    <p>{{ $item->category }}</p>
                                    <a href="{{ asset($item->image_path) }}" title="{{ $item->title }}"
                                        data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                </div>
                            @endif
                        </div><!-- End Portfolio Item -->
                    @endforeach

                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->
@endsection