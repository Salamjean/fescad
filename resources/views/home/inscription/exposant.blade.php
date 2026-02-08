@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Inscription Exposant</h1>
            <p>Faites connaître vos produits et services au grand public.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Exposant</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-12 text-center mb-4">
                    <p class="lead">Si vous souhaitez réserver directement un stand standard, vous pouvez passer par notre
                        <a href="{{ route('billetterie.stand') }}">module de réservation en ligne</a>. Pour les demandes
                        spécifiques ou partenariats, utilisez le formulaire ci-dessous.
                    </p>
                </div>

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
                        <input type="hidden" name="type" value="exposant">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control"
                                    placeholder="Nom de l'entreprise / Structure" required="">
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="representative" class="form-control"
                                    placeholder="Nom du représentant" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Email professionnel"
                                    required="">
                            </div>

                            <div class="col-md-6">
                                <input type="tel" class="form-control" name="phone" placeholder="Téléphone" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="activity" placeholder="Secteur d'activité"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="besoins" rows="6"
                                    placeholder="Décrivez vos besoins spécifiques (surface, électricité, emplacement...)"
                                    required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit">Demander un devis / Infos</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection