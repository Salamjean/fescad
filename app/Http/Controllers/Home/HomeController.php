<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Artiste;
use App\Models\Communique;
use App\Models\Condition;
use App\Models\FestivalPresentation;
use App\Models\FestivalVision;
use App\Models\Galerie;
use App\Models\HeroSlide;
use App\Models\Page;
use App\Models\HomeFeature;
use App\Models\HomeService;
use App\Models\Partner;
use App\Models\Programme;
use App\Models\Tarif;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $vision = FestivalVision::first();
        $presentation = FestivalPresentation::first();
        $programmes = Programme::orderBy('date')->get();
        $actualites = Actualite::orderBy('published_at', 'desc')->take(5)->get();
        $slides = HeroSlide::where('is_active', true)->orderBy('order')->get();
        $homeServices = HomeService::orderBy('order')->get();
        $homeFeatures = HomeFeature::orderBy('order')->get();
        $partners = Partner::where('is_active', true)->orderBy('order')->get();

        return view('home.accueil', compact('vision', 'presentation', 'programmes', 'actualites', 'slides', 'homeServices', 'homeFeatures', 'partners'));
    }

    public function about()
    {
        $presentation = \App\Models\FestivalPresentation::first();
        return view('home.about', compact('presentation'));
    }

    public function commissaire()
    {
        $commissaire = \App\Models\CommissaireMessage::first();
        return view('home.festival.commissaire', compact('commissaire'));
    }

    public function historique()
    {
        $historiques = \App\Models\FestivalHistorique::orderBy('year', 'asc')->get();
        return view('home.festival.historique', compact('historiques'));
    }

    public function vision()
    {
        $vision = \App\Models\FestivalVision::first();
        return view('home.festival.vision', compact('vision'));
    }

    public function programme()
    {
        $programmes = \App\Models\Programme::orderBy('date', 'asc')->orderBy('start_time', 'asc')->get()->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->date)->format('Y-m-d');
        });
        return view('home.programme', compact('programmes'));
    }

    public function artistes()
    {
        $artistes = \App\Models\Artiste::all();
        return view('home.artistes', compact('artistes'));
    }

    public function ticket()
    {
        return view('home.billetterie.ticket');
    }

    public function stand()
    {
        return view('home.billetterie.stand');
    }

    public function tarifs()
    {
        $tarifs = Tarif::all(); // You might want to sort them if needed
        return view('home.billetterie.tarifs', compact('tarifs'));
    }

    public function conditions()
    {
        $conditions = Condition::orderBy('order', 'asc')->get();
        return view('home.billetterie.conditions', compact('conditions'));
    }



    // Deprecated methods - kept for potential redirects or backward compat
    public function lieu()
    {
        return redirect()->route('infos.index');
    }

    public function hebergement()
    {
        return redirect()->route('infos.index');
    }

    public function securite()
    {
        return redirect()->route('infos.index');
    }

    public function actualites()
    {
        $actualites = Actualite::orderBy('published_at', 'desc')->paginate(9);
        return view('home.media.actualites', compact('actualites'));
    }

    public function galerie()
    {
        $galeries = Galerie::orderBy('created_at', 'desc')->get();
        return view('home.media.galerie', compact('galeries'));
    }

    public function videos()
    {
        $videos = Video::orderBy('created_at', 'desc')->get();
        return view('home.media.videos', compact('videos'));
    }

    public function communiques()
    {
        $communiques = Communique::orderBy('published_at', 'desc')->get();
        return view('home.media.communiques', compact('communiques'));
    }

    public function sociales()
    {
        $page = Page::where('slug', 'sociales')->where('is_active', true)->first();
        return view('home.sociales', compact('page'));
    }

    public function benevole()
    {
        return view('home.inscription.benevole');
    }

    public function exposant()
    {
        return view('home.inscription.exposant');
    }

    public function artiste()
    {
        return view('home.inscription.artiste');
    }

    public function presse()
    {
        return view('home.inscription.presse');
    }

    public function contact()
    {
        return view('home.contact');
    }
}
