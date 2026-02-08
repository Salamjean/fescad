<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Bienvenue - FESCAD</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo_fescad.png') }}" rel="icon">
    <link href="{{ asset('assets/img/logo_fescad.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">
    @include('home.layouts.navbar')
    <main class="main">

        <!-- Featured Services Section -->
        @yield('content')
        <!-- /Features Section -->

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <!-- Colonne 1 : À propos & Contact -->
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ route('home') }}" class="d-flex align-items-center">
                        {{-- <span class="sitename">FESCAD</span> --}}
                        <span class="sitename-sub">Festival Culturel d'Adjamé</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>L'événement culturel incontournable célébrant la richesse artistique et le dynamisme du
                            quartier d'Adjamé.</p>
                        <p class="mt-3"><strong>Téléphone :</strong>
                            <span>{{ $settings['contact_phone'] ?? '+225 XX XX XX XX' }}</span></p>
                        <p><strong>Email :</strong> <span>{{ $settings['contact_email'] ?? 'contact@fescad.ci' }}</span>
                        </p>
                        <p><strong>Adresse :</strong>
                            <span>{{ $settings['contact_address'] ?? "Adjamé, Abidjan, Côte d'Ivoire" }}</span></p>
                    </div>
                </div>

                <!-- Colonne 2 : Liens rapides (Festival) -->
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Le Festival</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="le-festival.html">Présentation</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="le-festival.html#commissaire">Commissaire
                                Général</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="le-festival.html#historique">Historique</a>
                        </li>
                        <li><i class="bi bi-chevron-right"></i> <a href="le-festival.html#vision">Vision & Mission</a>
                        </li>
                        <li><i class="bi bi-chevron-right"></i> <a href="oeuvres-sociales.html">Œuvres Sociales</a></li>
                    </ul>
                </div>

                <!-- Colonne 3 : Liens rapides (Pratique) -->
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Pratique</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="programme.html">Programme</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="artistes.html">Artistes</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="billetterie.html">Billetterie</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="infos-pratiques.html">Infos pratiques</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="contact.html">Contact</a></li>
                    </ul>
                </div>

                <!-- Colonne 4 : Réseaux sociaux & Partenaires -->
                <div class="col-lg-4 col-md-12">
                    <h4>Suivez le FESCAD</h4>
                    <p>Rejoignez notre communauté en ligne et restez connectés avant, pendant et après le festival !</p>
                    <div class="social-links d-flex">
                        @if(isset($settings['facebook_link']))
                            <a href="{{ $settings['facebook_link'] }}" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
                        @endif
                        @if(isset($settings['instagram_link']))
                            <a href="{{ $settings['instagram_link'] }}" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a>
                        @endif
                        @if(isset($settings['twitter_link']))
                            <a href="{{ $settings['twitter_link'] }}" target="_blank" title="Twitter/X"><i class="bi bi-twitter-x"></i></a>
                        @endif
                        @if(isset($settings['youtube_link']))
                            <a href="{{ $settings['youtube_link'] }}" target="_blank" title="YouTube"><i class="bi bi-youtube"></i></a>
                        @endif
                        @if(isset($settings['tiktok_link']))
                            <a href="{{ $settings['tiktok_link'] }}" target="_blank" title="TikTok"><i class="bi bi-tiktok"></i></a>
                        @endif
                    </div>
                    <div class="mt-4">
                        <h5>Partenaires</h5>
                        <p class="small">Le FESCAD remercie tous ses partenaires et sponsors pour leur soutien
                            précieux.</p>
                        <a href="partenaires.html" class="btn btn-outline-light btn-sm">Voir tous les partenaires</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">FESCAD - Festival Culturel d'Adjamé</strong>
                <span id="current-year"></span> <span>Tous droits réservés</span>
            </p>
            <div class="credits">
                <a href="mentions-legales.html">Mentions légales</a> |
                <a href="politique-confidentialite.html">Politique de confidentialité</a> |
                <a href="contact.html">Contact</a>
            </div>
        </div>

    </footer>

    <!-- Script pour l'année dynamique -->
    <script>
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>