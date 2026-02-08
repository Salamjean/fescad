@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Commissaire Général</h1>
            <p>Rencontre avec le visionnaire derrière le FESCAD.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Commissaire Général</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Commissaire Section -->
    <section id="commissaire" class="commissaire section">

        <div class="container">

            <div class="row gy-4 align-items-center">
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset($commissaire->image ?? 'assets/img/team/commissaire.jpg') }}"
                        class="img-fluid rounded-4 shadow-lg" alt="{{ $commissaire->role }}">
                </div>
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                    <span class="subtitle text-uppercase text-muted fw-bold mb-2 d-block">Le Mot du Commissaire</span>
                    <h2 class="mb-4">{{ $commissaire->title }}</h2>

                    {!! nl2br(e($commissaire->message)) !!}

                    <div class="mt-4">
                        @if($commissaire->signature_image)
                            <img src="{{ asset($commissaire->signature_image) }}" alt="Signature"
                                style="max-height: 60px; opacity: 0.7;">
                        @endif
                        <div class="mt-2">
                            <strong>{{ $commissaire->name }}</strong><br>
                            <span class="text-muted">{{ $commissaire->role }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Commissaire Section -->
@endsection