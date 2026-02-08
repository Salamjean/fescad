@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Vidéos</h1>
            <p>Plongez au cœur de l'action avec nos reportages et aftermovies.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Vidéos</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Videos Section -->
    <section id="videos" class="portfolio section">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                @foreach($videos as $video)
                    <div class="col-lg-6">
                        <div class="ratio ratio-16x9 shadow rounded-4">
                            <iframe src="{{ $video->embed_url }}" title="{{ $video->title }}" allowfullscreen></iframe>
                        </div>
                        <h4 class="mt-3">{{ $video->title }}</h4>
                    </div>
                @endforeach

            </div>

        </div>

    </section><!-- /Videos Section -->
@endsection