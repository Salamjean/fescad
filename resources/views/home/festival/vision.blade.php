@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Vision & Mission</h1>
            <p>Ce qui nous anime et guide nos actions pour le développement culturel.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Vision & Mission</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Vision Section -->
    <section id="vision" class="vision section">

        <div class="container">

            <div class="row gy-4 mb-5 align-items-center">
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
                    <div class="p-5 bg-white shadow rounded-4 border-start border-5 border-primary">
                        <div class="icon-box mb-3">
                            <i class="bi bi-eye fs-1 text-primary"></i>
                        </div>
                        <h3>{{ $vision->vision_title }}</h3>
                        
                        {!! nl2br(e($vision->vision_text)) !!}
                        
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-left">
                    <img src="{{ asset($vision->vision_image ?? 'assets/img/vision.png') }}" class="img-fluid" alt="Vision"
                        style="max-height: 400px;">
                </div>
            </div>

            <div class="row gy-4 align-items-center">
                <div class="col-lg-6 text-center" data-aos="fade-right">
                    <img src="{{ asset($vision->mission_image ?? 'assets/img/mission.png') }}" class="img-fluid" alt="Mission"
                        style="max-height: 400px;">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="p-5 bg-white shadow rounded-4 border-start border-5 border-success">
                        <div class="icon-box mb-3">
                            <i class="bi bi-bullseye fs-1 text-success"></i>
                        </div>
                        <h3>{{ $vision->mission_title }}</h3>
                        
                        {!! nl2br(e($vision->mission_text)) !!}
                        
                        <ul class="list-unstyled mt-3">
                            @if($vision->mission_points)
                                @foreach($vision->mission_points as $point)
                                <li class="mb-2 d-flex"><i class="bi bi-check-circle-fill text-success me-2"></i> {{ $point }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Vision Section -->
@endsection