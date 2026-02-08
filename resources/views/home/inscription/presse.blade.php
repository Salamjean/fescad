@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Accréditation Presse</h1>
            <p>Demandez votre badge média pour couvrir le festival.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Presse</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-8 mx-auto">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('inscription.store') }}" method="post" class="" data-aos="fade-up"
                        data-aos-delay="200">
                        @csrf
                        <input type="hidden" name="type" value="presse">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Nom du Média" required="">
                            </div>

                            <div class="col-md-6">
                                <select class="form-select" name="type_media">
                                    <option selected>Type de Média</option>
                                    <option value="tv">Télévision</option>
                                    <option value="radio">Radio</option>
                                    <option value="presse_ecrite">Presse Écrite</option>
                                    <option value="presse_enligne">Presse en Ligne</option>
                                    <option value="blog">Blog / Influenceur</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="journalist_name" class="form-control"
                                    placeholder="Nom du Journaliste" required="">
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="card_number" class="form-control" placeholder="N° Carte de Presse"
                                    required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Email Professionnel"
                                    required="">
                            </div>

                            <div class="col-md-6">
                                <input type="tel" class="form-control" name="phone" placeholder="Téléphone" required="">
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit">Demander accréditation</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection