<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo_fescad.png') }}" alt="Logo FESCAD - Festival Culturel d'Adjamé">
            <!-- <span class="logo-text d-none d-md-block">FESCAD</span> -->
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" class="active">Accueil</a></li>

                <!-- LE FESTIVAL (Dropdown) -->
                <li class="dropdown">
                    <a href="#"><span>Le Festival</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('festival.presentation') }}">Présentation</a></li>
                        <li><a href="{{ route('festival.commissaire') }}">Commissaire Général</a></li>
                        <li><a href="{{ route('festival.historique') }}">Historique</a></li>
                        <li><a href="{{ route('festival.vision') }}">Vision & Mission</a></li>
                    </ul>
                </li>

                <!-- PROGRAMME -->
                <li><a href="{{ route('programme') }}">Programme</a></li>

                <!-- ARTISTES -->
                <li><a href="{{ route('artistes') }}">Artistes & Invités</a></li>

                <!-- BILLETTERIE & STANDS -->
                <li class="dropdown">
                    <a href="#"><span>Billetterie & Stands</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('billetterie.ticket') }}">Réserver un billet</a></li>
                        <li><a href="{{ route('billetterie.stand') }}">Réserver un stand</a></li>
                        <li><a href="{{ route('billetterie.tarifs') }}">Tarifs & Formules</a></li>
                        <li><a href="{{ route('billetterie.conditions') }}">Conditions générales</a></li>
                    </ul>
                </li>

                <!-- INFORMATIONS PRATIQUES (Dropdown) -->
                <li class="dropdown">
                    <a href="#"><span>Infos Pratiques</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('infos.lieu') }}">Lieu & Accès</a></li>
                        <li><a href="{{ route('infos.hebergement') }}">Hébergement</a></li>
                        <li><a href="{{ route('infos.securite') }}">Sécurité & Règlement</a></li>
                    </ul>
                </li>

                <!-- ACTUALITÉS & GALERIE -->
                <li class="dropdown">
                    <a href="#"><span>Média</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('media.actualites') }}">Actualités</a></li>
                        <li><a href="{{ route('media.galerie') }}">Galerie Photos</a></li>
                        <li><a href="{{ route('media.videos') }}">Vidéos</a></li>
                        <li><a href="{{ route('media.communiques') }}">Communiqués de presse</a></li>
                    </ul>
                </li>

                <!-- ŒUVRES SOCIALES -->
                <li><a href="{{ route('sociales') }}">Œuvres Sociales</a></li>

                <!-- CONTACT -->
                <li><a href="{{ route('contact') }}">Contact</a></li>

                <!-- INSCRIPTIONS (Dropdown pour bénévoles, exposants, presse) -->
                <li class="dropdown dropdown-special">
                    <a href="#" class="btn-inscription"><span>S'inscrire</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('inscription.benevole') }}">Devenir bénévole</a></li>
                        <li><a href="{{ route('inscription.exposant') }}">Inscription exposant</a></li>
                        <li><a href="{{ route('inscription.artiste') }}">Candidature artiste</a></li>
                        <li><a href="{{ route('inscription.presse') }}">Accréditation presse</a></li>
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>