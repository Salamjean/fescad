@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Tarifs & Formules</h1>
            <p>Découvrez nos offres pour profiter pleinement du FESCAD.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Tarifs</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                @foreach($tarifs as $tarif)
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="{{ 100 * $loop->iteration }}">
                        <div class="pricing-item {{ $tarif->recommended ? 'featured' : '' }}">
                            <h3>{{ $tarif->name }}</h3>
                            <div class="icon">
                                <i class="{{ $tarif->icon ?? 'bi bi-box' }}"></i>
                            </div>
                            <h4>{{ $tarif->price }} <sup>FCFA</sup></h4>
                            <ul>
                                @if($tarif->features)
                                    @php
                                        $features = $tarif->features;
                                        if (is_string($features)) {
                                            $features = json_decode($features, true) ?? explode(',', $features);
                                        }
                                    @endphp

                                    @if(is_array($features) || is_object($features))
                                        @foreach($features as $feature)
                                            <li><i class="bi bi-check"></i> {{ trim($feature) }}</li>
                                        @endforeach
                                    @endif
                                @endif
                            </ul>
                            <div class="text-center"><a href="{{ route('billetterie.ticket') }}" class="buy-btn">Réserver</a>
                            </div>
                        </div>
                    </div><!-- End Pricing Item -->
                @endforeach

            </div>

        </div>

    </section><!-- /Pricing Section -->
@endsection