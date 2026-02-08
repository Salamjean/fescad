@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Historique</h1>
            <p>Retracez les grandes étapes qui ont fait du FESCAD un événement majeur.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Historique</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Historique Section -->
    <section id="historique" class="historique section">

        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12">
                    <div class="timeline position-relative">

                        @foreach($historiques as $index => $item)
                            <div class="timeline-item {{ $loop->last ? '' : 'mb-5' }}">
                                <div class="row align-items-center">
                                    <!-- Text Column -->
                                    <div
                                        class="col-md-5 {{ $index % 2 == 0 ? 'text-end order-1 order-md-1' : 'order-1 order-md-3' }}">
                                        <h3 class="fw-bold">{{ $item->year }}</h3>
                                        <h4 class="h5">{{ $item->title }}</h4>
                                        <p class="text-muted">{{ $item->description }}</p>
                                    </div>

                                    <!-- Badge Column -->
                                    <div class="col-md-2 text-center order-2 order-md-2 position-relative">
                                        <div class="timeline-badge bg-primary rounded-circle d-flex align-items-center justify-content-center text-white mx-auto"
                                            style="width: 50px; height: 50px; z-index: 2;">
                                            <i class="bi bi-clock-history"></i>
                                        </div>
                                        @if(!$loop->last)
                                            <div class="timeline-line bg-secondary position-absolute start-50 translate-middle-x top-0 bottom-0"
                                                style="width: 2px; height: 100%; z-index: 1;"></div>
                                        @endif
                                    </div>

                                    <!-- Image Column -->
                                    <div
                                        class="col-md-5 {{ $index % 2 == 0 ? 'order-3 order-md-3' : 'text-end order-3 order-md-1' }}">
                                        <img src="{{ asset($item->image ?? 'assets/img/history/2008.jpg') }}"
                                            class="img-fluid rounded shadow-sm" alt="{{ $item->title }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Historique Section -->
@endsection