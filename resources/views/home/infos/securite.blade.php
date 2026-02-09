@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" @if($page->image)
        style="background-image: url('{{ asset('storage/' . $page->image) }}'); background-size: cover; background-position: center;"
    @endif>
        <div class="container position-relative">
            <h1>Sécurité & Règlement</h1>
            <p>Votre sécurité est notre priorité. Voici les règles à respecter.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Sécurité</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            {!! $page->content !!}
        </div>

    </section><!-- /Services Section -->
@endsection