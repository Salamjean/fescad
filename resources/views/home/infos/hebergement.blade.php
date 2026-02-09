@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" @if($page->image)
        style="background-image: url('{{ asset('storage/' . $page->image) }}'); background-size: cover; background-position: center;"
    @endif>
        <div class="container position-relative">
            <h1>Hébergement</h1>
            <p>Où séjourner pendant le festival ? Découvrez nos recommandations.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Hébergement</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Team Section -->
    <section id="team" class="team section">

        <div class="container">
            {!! $page->content !!}
        </div>

    </section><!-- /Team Section -->
@endsection