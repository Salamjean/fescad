<nav id="sidebar">
    <div class="sidebar-header">
        <h3>FESCAD Admin</h3>
    </div>

    <ul class="list-unstyled components">
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i> Tableau de bord
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Gestion Site</span>
        </li>

        <!-- ACCUEIL DROPDOWN -->
        <li
            class="{{ request()->is('admin/hero-slides*', 'admin/home-services*', 'admin/home-features*', 'admin/partners*') ? 'active' : '' }}">
            <a href="#accueilSubmenu" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle d-flex align-items-center">
                <i class="bi bi-house me-2"></i>
                <span>Accueil</span>
                <i class="bi bi-chevron-down ms-auto dropdown-chevron"></i>
            </a>
            <ul class="collapse list-unstyled ps-3 {{ request()->is('admin/hero-slides*', 'admin/home-services*', 'admin/home-features*', 'admin/partners*') ? 'show' : '' }}"
                id="accueilSubmenu">
                <li><a href="{{ route('admin.hero-slides.index') }}">Carousel Slides</a></li>
                <li><a href="{{ route('admin.home-services.index') }}">Services</a></li>
                <li><a href="{{ route('admin.home-features.index') }}">Points Forts</a></li>
                <li><a href="{{ route('admin.partners.index') }}">Partenaires</a></li>
            </ul>
        </li>

        <!-- LE FESTIVAL DROPDOWN -->
        <li class="{{ request()->routeIs('admin.festival.*') ? 'active' : '' }}">
            <a href="#festivalSubmenu" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle d-flex align-items-center">
                <i class="bi bi-flag me-2"></i>
                <span>Le Festival</span>
                <i class="bi bi-chevron-down ms-auto dropdown-chevron"></i>
            </a>
            <ul class="collapse list-unstyled ps-3 {{ request()->routeIs('admin.festival.*') ? 'show' : '' }}"
                id="festivalSubmenu">
                <li><a href="{{ route('admin.festival.presentation.index') }}">Présentation</a></li>
                <li><a href="{{ route('admin.festival.commissaire.index') }}">Commissaire Général</a></li>
                <li><a href="{{ route('admin.festival.historique.index') }}">Historique</a></li>
                <li><a href="{{ route('admin.festival.vision.index') }}">Vision & Mission</a></li>
            </ul>
        </li>

        <!-- PROGRAMME ET ARTISTES (Keep separate or group?) -->
        <li class="{{ request()->routeIs('admin.programme.*') ? 'active' : '' }}">
            <a href="{{ route('admin.programme.index') }}">
                <i class="bi bi-calendar-event me-2"></i> Programme
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.artistes.*') ? 'active' : '' }}">
            <a href="{{ route('admin.artistes.index') }}">
                <i class="bi bi-people me-2"></i> Artistes & Invités
            </a>
        </li>

        <!-- BILLETTERIE DROPDOWN -->
        <li class="{{ request()->is('admin/reservations*', 'admin/tarifs*', 'admin/conditions*') ? 'active' : '' }}">
            <a href="#billetterieSubmenu" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle d-flex align-items-center">
                <i class="bi bi-ticket-perforated me-2"></i>
                <span>Partenaires & Sponsors</span>
                <i class="bi bi-chevron-down ms-auto dropdown-chevron"></i>
            </a>
            <ul class="collapse list-unstyled ps-3 {{ request()->is('admin/reservations*', 'admin/tarifs*', 'admin/conditions*') ? 'show' : '' }}"
                id="billetterieSubmenu">
                <li><a href="{{ route('admin.reservations.index') }}">Réservations</a></li>
                <li><a href="{{ route('admin.tarifs.index') }}">Tarifs & Formules</a></li>
                <li><a href="{{ route('admin.conditions.index') }}">Conditions Générales</a></li>
            </ul>
        </li>

        <!-- INFOS PRATIQUES DROPDOWN (Pages) -->
        @php
            $lieuPage = \App\Models\Page::where('slug', 'lieu')->first();
            $hebPage = \App\Models\Page::where('slug', 'hebergement')->first();
            $secuPage = \App\Models\Page::where('slug', 'securite')->first();
            $socialPage = \App\Models\Page::where('slug', 'sociales')->first();
        @endphp
        <li class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
            <a href="#infosSubmenu" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle d-flex align-items-center">
                <i class="bi bi-info-circle me-2"></i>
                <span>Infos Pratiques</span>
                <i class="bi bi-chevron-down ms-auto dropdown-chevron"></i>
            </a>
            <ul class="collapse list-unstyled ps-3 {{ request()->routeIs('admin.pages.*') ? 'show' : '' }}"
                id="infosSubmenu">
                @if($lieuPage)
                    <li><a href="{{ route('admin.pages.edit', $lieuPage->id) }}">Lieu & Accès</a></li>
                @endif
                @if($hebPage)
                    <li><a href="{{ route('admin.pages.edit', $hebPage->id) }}">Hébergement</a></li>
                @endif
                @if($secuPage)
                    <li><a href="{{ route('admin.pages.edit', $secuPage->id) }}">Sécurité</a></li>
                @endif
                @if($socialPage)
                    <li><a href="{{ route('admin.pages.edit', $socialPage->id) }}">Œuvres Sociales</a></li>
                @endif
                <li><a href="{{ route('admin.pages.index') }}">Toutes les pages</a></li>
            </ul>
        </li>

        <!-- MEDIA DROPDOWN -->
        <li
            class="{{ request()->is('admin/actualites*', 'admin/galeries*', 'admin/videos*', 'admin/communiques*') ? 'active' : '' }}">
            <a href="#mediaSubmenu" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle d-flex align-items-center">
                <i class="bi bi-camera-video me-2"></i>
                <span>Média</span>
                <i class="bi bi-chevron-down ms-auto dropdown-chevron"></i>
            </a>
            <ul class="collapse list-unstyled ps-3 {{ request()->is('admin/actualites*', 'admin/galeries*', 'admin/videos*', 'admin/communiques*') ? 'show' : '' }}"
                id="mediaSubmenu">
                <li><a href="{{ route('admin.actualites.index') }}">Actualités</a></li>
                <li><a href="{{ route('admin.galeries.index') }}">Galerie</a></li>
                <li><a href="{{ route('admin.videos.index') }}">Vidéos</a></li>
                <li><a href="{{ route('admin.communiques.index') }}">Communiqués</a></li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Inscriptions & Plus</span>
        </li>
        <li class="{{ request()->routeIs('admin.inscriptions.*') ? 'active' : '' }}">
            <a href="{{ route('admin.inscriptions.index') }}">
                <i class="bi bi-file-earmark-text me-2"></i> Liste Inscriptions
            </a>
        </li>
        <li>
            <a href="{{ route('home') }}" target="_blank">
                <i class="bi bi-globe me-2"></i> Voir le site
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
            <a href="{{ route('admin.settings.index') }}">
                <i class="bi bi-gear me-2"></i> Paramètres
            </a>
        </li>
    </ul>
</nav>