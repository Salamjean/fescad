@extends('home.layouts.template')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Candidature Artiste</h1>
            <p>La scène du FESCAD est ouverte aux talents d'ici et d'ailleurs.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Artistes</li>
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
                        <input type="hidden" name="type" value="artiste">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Nom de scène / Groupe"
                                    required="">
                            </div>

                            <div class="col-md-6">
                                <select class="form-select" name="genre">
                                    <option selected>Genre Musical / Artistique</option>
                                    <option value="zouglou">Zouglou</option>
                                    <option value="coupe-decale">Coupé Décalé</option>
                                    <option value="rap">Rap / Hip Hop</option>
                                    <option value="traditionnel">Musique Traditionnelle</option>
                                    <option value="humour">Humour</option>
                                    <option value="danse">Danse</option>
                                </select>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Email Manager/Contact"
                                    required="">
                            </div>

                            <div class="col-md-6">
                                <input type="tel" class="form-control" name="phone" placeholder="Téléphone" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="url" class="form-control" name="link_youtube"
                                    placeholder="Lien Vidéo (YouTube, Facebook...)" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="url" class="form-control" name="link_social"
                                    placeholder="Lien Page Facebook / Instagram" required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="bio" rows="6"
                                    placeholder="Courte biographie et motivation" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit">Soumettre sa candidature</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection