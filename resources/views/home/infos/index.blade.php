@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url('{{ asset('assets/img/page-title-bg.jpg') }}');">
        <div class="container position-relative">
            <h1>Infos Pratiques</h1>
            <p>Toutes les informations utiles pour votre séjour au FESCAD.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Infos Pratiques</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Tabs Section -->
    <section id="infos-tabs" class="infos-tabs section">
        <div class="container">
            @if($pages->count() > 0)
                <ul class="nav nav-pills mb-4 justify-content-center" id="infosTab" role="tablist">
                    @foreach($pages as $page)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $page->id }}"
                                data-bs-toggle="tab" data-bs-target="#content-{{ $page->id }}" type="button" role="tab"
                                aria-controls="content-{{ $page->id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                {{ $page->title }}
                            </button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content p-4 border rounded shadow-sm bg-white" id="infosTabContent">
                    @foreach($pages as $page)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="content-{{ $page->id }}"
                            role="tabpanel" aria-labelledby="tab-{{ $page->id }}">
                            @if($page->image)
                                <div class="text-center mb-4">
                                    <img src="{{ asset('storage/' . $page->image) }}" class="img-fluid rounded" alt="{{ $page->title }}"
                                        style="max-height: 400px; object-fit: cover;">
                                </div>
                            @endif
                            <div class="content-body">
                                {!! $page->content !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <p>Aucune information disponible pour le moment.</p>
                </div>
            @endif
        </div>
    </section>
@endsection