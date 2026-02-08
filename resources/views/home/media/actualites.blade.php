@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Actualités</h1>
            <p>Restez informés des dernières nouvelles du FESCAD et de la culture à Adjamé.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Actualités</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Blog News Section -->
    <section id="blog-news" class="blog-news section">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                @foreach($actualites as $actualite)
                    <div class="col-lg-4 col-md-6">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                @if($actualite->image)
                                    <img src="{{ asset('storage/' . $actualite->image) }}" class="img-fluid"
                                        alt="{{ $actualite->title }}" style="width: 100%; height: 250px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('assets/img/blog/blog-1.jpg') }}" class="img-fluid" alt=""
                                        style="width: 100%; height: 250px; object-fit: cover;">
                                @endif
                                <span
                                    class="post-date">{{ $actualite->published_at ? $actualite->published_at->format('d F') : '' }}</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">{{ $actualite->title }}</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">Admin</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Actualité</span>
                                    </div>
                                </div>

                                <p>
                                    {{ Str::limit($actualite->content, 100) }}
                                </p>

                                <hr>

                                <!-- Link to single post page could be added here later -->
                                <a href="#" class="readmore stretched-link"><span>Lire la suite</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div><!-- End post item -->
                @endforeach

            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $actualites->links() }}
            </div>

        </div>

    </section><!-- /Blog News Section -->
@endsection