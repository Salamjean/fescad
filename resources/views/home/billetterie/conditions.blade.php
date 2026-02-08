@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Conditions Générales</h1>
            <p>Règlement intérieur et conditions de vente du FESCAD.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Conditions</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Conditions Section -->
    <section id="conditions" class="conditions section">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">
                <div class="col-lg-12">
                    @foreach($conditions as $condition)
                        <h3>{{ $condition->title }}</h3>
                        <p>{!! nl2br(e($condition->content)) !!}</p>
                    @endforeach

                    <p class="mt-4 text-muted"><em>Dernière mise à jour : Février 2026.</em></p>
                </div>
            </div>

        </div>

    </section><!-- /Conditions Section -->
@endsection