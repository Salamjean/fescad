<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArtisteController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\Festival\CommissaireController;
use App\Http\Controllers\Admin\Festival\HistoriqueController;
use App\Http\Controllers\Admin\Festival\PresentationController;
use App\Http\Controllers\Admin\Festival\VisionController;
use App\Http\Controllers\Admin\InscriptionController;
use App\Http\Controllers\Admin\ProgrammeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TarifController;
use App\Http\Controllers\Admin\ConditionController;
use App\Http\Controllers\Admin\ActualiteController;
use App\Http\Controllers\Admin\GalerieController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\CommuniqueController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\HomeServiceController;
use App\Http\Controllers\Admin\HomeFeatureController;
use App\Http\Controllers\Admin\PartnerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');

    // Le Festival
    Route::get('/le-festival/presentation', [HomeController::class, 'about'])->name('festival.presentation');
    Route::get('/le-festival/commissaire-general', [HomeController::class, 'commissaire'])->name('festival.commissaire');
    Route::get('/le-festival/historique', [HomeController::class, 'historique'])->name('festival.historique');
    Route::get('/le-festival/vision-mission', [HomeController::class, 'vision'])->name('festival.vision');

    // Programme & Artistes
    Route::get('/programme', [HomeController::class, 'programme'])->name('programme');
    Route::get('/artistes', [HomeController::class, 'artistes'])->name('artistes');

    // Billetterie & Stands
    Route::get('/billetterie/reserver-billet', [HomeController::class, 'ticket'])->name('billetterie.ticket');
    Route::post('/billetterie/reserver-billet', [\App\Http\Controllers\Home\ReservationController::class, 'storeTicket'])->name('billetterie.ticket.store');

    Route::get('/billetterie/reserver-stand', [HomeController::class, 'stand'])->name('billetterie.stand');
    Route::post('/billetterie/reserver-stand', [\App\Http\Controllers\Home\ReservationController::class, 'storeStand'])->name('billetterie.stand.store');

    Route::get('/billetterie/tarifs', [HomeController::class, 'tarifs'])->name('billetterie.tarifs');
    Route::get('/billetterie/conditions', [HomeController::class, 'conditions'])->name('billetterie.conditions');

    // Infos Pratiques
    Route::get('/festival/infos-pratiques', [App\Http\Controllers\Home\InfosController::class, 'index'])->name('infos.index');

    // Redirects for old routes
    Route::get('/infos/lieu-acces', [HomeController::class, 'lieu'])->name('infos.lieu');
    Route::get('/infos/hebergement', [HomeController::class, 'hebergement'])->name('infos.hebergement');
    Route::get('/infos/securite', [HomeController::class, 'securite'])->name('infos.securite');

    // Média
    Route::get('/media/actualites', [HomeController::class, 'actualites'])->name('media.actualites');
    Route::get('/media/galerie', [HomeController::class, 'galerie'])->name('media.galerie');
    Route::get('/media/videos', [HomeController::class, 'videos'])->name('media.videos');
    Route::get('/media/communiques', [HomeController::class, 'communiques'])->name('media.communiques');

    // Œuvres Sociales
    Route::get('/sociales', [HomeController::class, 'sociales'])->name('sociales');

    // Inscriptions
    Route::post('/inscription/store', [App\Http\Controllers\Home\InscriptionController::class, 'store'])->name('inscription.store');
    Route::get('/inscription/benevole', [HomeController::class, 'benevole'])->name('inscription.benevole');
    Route::get('/inscription/exposant', [HomeController::class, 'exposant'])->name('inscription.exposant');
    Route::get('/inscription/artiste', [HomeController::class, 'artiste'])->name('inscription.artiste');
    Route::get('/inscription/presse', [HomeController::class, 'presse'])->name('inscription.presse');

    Route::get('/contact', [App\Http\Controllers\Home\ContactController::class, 'index'])->name('contact');
    Route::post('/contact/send', [App\Http\Controllers\Home\ContactController::class, 'send'])->name('contact.send');
});

// Admin Routes
Route::prefix('/admin')->group(function () {
    // Login Routes
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginSubmit'])->name('admin.login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout')->withoutMiddleware('admin');

    // Protected Routes
    Route::middleware(['auth', 'admin'])->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // CMS: Le Festival
        Route::get('/festival/presentation', [PresentationController::class, 'index'])->name('festival.presentation.index');
        Route::put('/festival/presentation/{id}', [PresentationController::class, 'update'])->name('festival.presentation.update');

        Route::get('/festival/commissaire-general', [CommissaireController::class, 'index'])->name('festival.commissaire.index');
        Route::put('/festival/commissaire-general/{id}', [CommissaireController::class, 'update'])->name('festival.commissaire.update');

        Route::resource('/festival/historique', HistoriqueController::class, ['as' => 'festival']);

        Route::get('/festival/vision', [VisionController::class, 'index'])->name('festival.vision.index');
        Route::put('/festival/vision/{id}', [VisionController::class, 'update'])->name('festival.vision.update');

        // CMS: Programme & Artistes
        Route::resource('/programme', ProgrammeController::class);
        Route::resource('/artistes', ArtisteController::class);

        // CMS: Réservations
        Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
        Route::put('/reservations/{id}/status', [ReservationController::class, 'updateStatus'])->name('reservations.status');
        Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

        // CMS: Tarifs & Conditions
        Route::resource('/tarifs', TarifController::class);
        Route::resource('/conditions', ConditionController::class);

        // CMS: Média
        Route::resource('/actualites', ActualiteController::class);
        Route::resource('/galeries', GalerieController::class);
        Route::resource('/videos', VideoController::class);
        Route::resource('/communiques', CommuniqueController::class);

        // CMS: Infos Pratiques
        Route::resource('/pages', PageController::class)->only(['index', 'edit', 'update']);

        // CMS: Accueil
        Route::resource('/hero-slides', HeroSlideController::class);
        Route::resource('/home-services', HomeServiceController::class);
        Route::resource('/home-features', HomeFeatureController::class);
        Route::resource('/partners', PartnerController::class);

        // Inscriptions
        Route::get('/inscriptions', [InscriptionController::class, 'index'])->name('inscriptions.index');
        Route::get('/inscriptions/{inscription}', [InscriptionController::class, 'show'])->name('inscriptions.show');

        // Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
