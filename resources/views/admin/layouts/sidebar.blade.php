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
            <span class="menu-header-text">Contenu Accueil</span>
        </li>
        <li class="{{ request()->routeIs('admin.hero-slides.*') ? 'active' : '' }}">
            <a href="{{ route('admin.hero-slides.index') }}">
                <i class="bi bi-images me-2"></i> Carousel Slides
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.home-services.*') ? 'active' : '' }}">
            <a href="{{ route('admin.home-services.index') }}">
                <i class="bi bi-grid me-2"></i> Services Accueil
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.home-features.*') ? 'active' : '' }}">
            <a href="{{ route('admin.home-features.index') }}">
                <i class="bi bi-star me-2"></i> Points Forts Accueil
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.festival.*') ? 'active' : '' }}">
            <a href="#festivalSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="bi bi-flag me-2"></i> Le Festival
            </a>
            <ul class="collapse list-unstyled ps-3 {{ request()->routeIs('admin.festival.*') ? 'show' : '' }}"
                id="festivalSubmenu">
                <li>
                    <a href="{{ route('admin.festival.presentation.index') }}">Présentation</a>
                </li>
                <li>
                    <a href="{{ route('admin.festival.commissaire.index') }}">Commissaire Général</a>
                </li>
                <li><a href="{{ route('admin.festival.historique.index') }}">Historique</a></li>
                <li><a href="{{ route('admin.festival.vision.index') }}">Vision & Mission</a></li>
            </ul>
        </li>

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

        <li class="{{ request()->routeIs('admin.reservations.*') ? 'active' : '' }}">
            <a href="{{ route('admin.reservations.index') }}">
                <i class="bi bi-envelope-paper me-2"></i> Réservations
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.tarifs.*') ? 'active' : '' }}">
            <a href="{{ route('admin.tarifs.index') }}">
                <i class="bi bi-tag me-2"></i> Tarifs & Formules
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.conditions.*') ? 'active' : '' }}">
            <a href="{{ route('admin.conditions.index') }}">
                <i class="bi bi-file-text me-2"></i> Conditions Générales
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Média</span>
        </li>

        <li class="{{ request()->routeIs('admin.actualites.*') ? 'active' : '' }}">
            <a href="{{ route('admin.actualites.index') }}">
                <i class="bi bi-newspaper me-2"></i> Actualités
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.galeries.*') ? 'active' : '' }}">
            <a href="{{ route('admin.galeries.index') }}">
                <i class="bi bi-images me-2"></i> Galerie
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
            <a href="{{ route('admin.videos.index') }}">
                <i class="bi bi-play-btn me-2"></i> Vidéos
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.communiques.*') ? 'active' : '' }}">
            <a href="{{ route('admin.communiques.index') }}">
                <i class="bi bi-file-earmark-pdf me-2"></i> Communiqués
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Infos Pratiques</span>
        </li>

        <li class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
            <a href="{{ route('admin.pages.index') }}">
                <i class="bi bi-info-circle me-2"></i> Pages d'Information
            </a>
        </li>

        {{--
        <li>
            @php
            $socialPage = \App\Models\Page::where('slug', 'sociales')->first();
            @endphp
            @if($socialPage)
            <a href="{{ route('admin.pages.edit', $socialPage->id) }}">
                <i class="bi bi-heart me-2"></i> Œuvres Sociales
            </a>
            @endif
        </li>
        --}}

        <li>
            <a href="{{ route('admin.inscriptions.index') }}">
                <i class="bi bi-file-earmark-text me-2"></i> Inscriptions
            </a>
        </li>

        <li>
            <a href="{{ route('home') }}" target="_blank">
                <i class="bi bi-globe me-2"></i> Voir le site
            </a>
        </li>
        <li>
            <a href="{{ route('admin.settings.index') }}">
                <i class="bi bi-gear me-2"></i> Paramètres
            </a>
        </li>
    </ul>
</nav>