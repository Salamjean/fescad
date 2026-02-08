@if(isset($presentation) && $presentation->hero_background)
    <style>
        .hero::after {
            background:
                linear-gradient(to right,
                    color-mix(in srgb, var(--background-color), transparent 90%),
                    var(--background-color)),
                url("{{ asset($presentation->hero_background) }}") center top no-repeat !important;
            background-size: cover !important;
        }
    </style>
@endif
<section id="hero" class="hero section dark-background">
    {{-- <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in"> --}}
    <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="container position-relative">

            @foreach($slides as $index => $slide)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="carousel-item-bg"
                        style="background-image: 
                                    linear-gradient(to right, color-mix(in srgb, var(--background-color), transparent 90%), var(--background-color)),
                                    linear-gradient(to bottom, rgba(0, 0, 0, 0.4) 0%, transparent 30%),
                                    url('{{ Str::startsWith($slide->image, 'assets/') ? asset($slide->image) : asset('storage/' . $slide->image) }}');">
                    </div>
                    <div class="carousel-container">
                        <h2>{{ $slide->title }}</h2>
                        <p>{!! $slide->description !!}</p>

                        @if($slide->btn1_text)
                            <a href="{{ $slide->btn1_link }}" class="btn-get-started">{{ $slide->btn1_text }}</a>
                        @endif

                        @if($slide->btn2_text)
                            <a href="{{ $slide->btn2_link }}" class="btn-get-started"
                                style="margin-left: 10px;">{{ $slide->btn2_text }}</a>
                        @endif
                    </div>
                </div><!-- End Carousel Item -->
            @endforeach

            <!-- Contrôles du carousel (flèches) -->
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <!-- Indicateurs de slide (les petits points) -->
            <ol class="carousel-indicators"></ol>

        </div>

    </div>

</section>