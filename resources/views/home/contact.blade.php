@extends('home.layouts.template')
@section('content')

    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Contact</h1>
            <p>Une question ? Une suggestion ? N'hésitez pas à nous contacter.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="current">Contact</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <section id="contact" class="contact section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6 ">
                    <div class="row gy-4">

                        <div class="col-lg-12">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Adresse</h3>
                                <p>{{ $settings['contact_address'] ?? "Mairie d'Adjamé, Abidjan, Côte d'Ivoire" }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h3>Téléphone</h3>
                                <p>{{ $settings['contact_phone'] ?? "+225 27 20 20 30 30" }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h3>Email</h3>
                                <p>{{ $settings['contact_email'] ?? "contact@fescad.ci" }}</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>
                </div>

                <div class="col-lg-6">
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
                    <form action="{{ route('contact.send') }}" method="post" class="" data-aos="fade-up"
                        data-aos-delay="500">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Votre Nom" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Votre Email" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Sujet" required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="4" placeholder="Message"
                                    required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit">Envoyer le message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->
            </div>

        </div>

        <div class="mt-5" data-aos="fade-up" data-aos-delay="200">
            <!-- Centered on Mairie d'Adjamé -->
            <iframe style="border:0; width: 100%; height: 370px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.494770387538!2d-4.025686000000001!3d5.3626297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1eaa142475471%3A0x66487e91122a275e!2sMairie%20d&#39;Adjam%C3%A9!5e0!3m2!1sfr!2sci!4v1707335689123!5m2!1sfr!2sci"
                frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

    </section>

@endsection