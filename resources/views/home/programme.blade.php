@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Programme du FESCAD</h1>
            <p>Retrouvez l'agenda complet des festivités : concerts, spectacles, ateliers et expositions.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Programme</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Schedule Section -->
    <section id="schedule" class="schedule section">

        <div class="container" data-aos="fade-up">

            <div class="row g-5">
                <!-- Colonne Image (Affiche) -->
                <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                    <div class="sticky-top" style="top: 100px; z-index: 1;">
                        <img src="{{ asset('assets/img/DES-OFFICIELS-DU-FESCAD-ADJAME-e1753460994815.jpg') }}" alt="Affiche Officielle du Programme"
                            class="img-fluid rounded-4 shadow-lg w-100"
                            style="object-fit: cover; height: auto; max-height: 800px;">

                    </div>
                </div>

                <!-- Colonne Programme -->
                <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">

                    <ul class="nav nav-tabs row g-2 d-flex" id="myTab" role="tablist">
                        @php $count = 0; @endphp
                        @foreach($programmes as $date => $events)
                            @php 
                                $count++; 
                                $carbonDate = \Carbon\Carbon::parse($date);
                            @endphp
                        <li class="nav-item col-4" role="presentation">
                            <a class="nav-link {{ $count == 1 ? 'active show' : '' }} w-100" id="day-{{ $count }}-tab" data-bs-toggle="tab"
                                data-bs-target="#day-{{ $count }}" type="button" role="tab" aria-controls="day-{{ $count }}" aria-selected="{{ $count == 1 ? 'true' : 'false' }}">
                                <h4 class="d-none d-lg-block">Jour {{ $count }}</h4>
                                <h5 class="mb-0">{{ $carbonDate->isoFormat('ddd D') }}</h5>
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <div class="tab-content mt-4" id="myTabContent">
                        @php $count = 0; @endphp
                        @foreach($programmes as $date => $events)
                            @php $count++; @endphp
                        <div class="tab-pane fade {{ $count == 1 ? 'active show' : '' }}" id="day-{{ $count }}" role="tabpanel" aria-labelledby="day-{{ $count }}-tab">
                            
                            @foreach($events as $event)
                            <div class="schedule-item d-flex flex-column flex-md-row {{ $loop->first ? '' : 'mt-4' }}">
                                <div class="time p-3 flex-shrink-0 text-center" style="min-width: 100px;">
                                    <span class="d-block fw-bold text-primary">{{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}</span>
                                </div>
                                <div class="content p-3 border-start border-3 border-primary ps-4">
                                    <h4 class="fw-bold text-dark">{{ $event->title }}</h4>
                                    <p class="text-muted mb-0">{{ $event->description }}</p>
                                    @if($event->location)
                                    <small class="text-primary"><i class="bi bi-geo-alt-fill"></i> {{ $event->location }}</small>
                                    @endif
                                </div>
                            </div>
                            @endforeach

                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Schedule Section -->
@endsection