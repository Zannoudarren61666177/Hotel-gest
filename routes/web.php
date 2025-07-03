<?php

use Illuminate\Support\Facades\Route;
use App\Models\Reservation;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\RoomMaintenanceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\HistoriqueActionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ClientController;

require __DIR__.'/auth.php';

// Accueil
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

// Route de recherche d'hôtel (URL conforme à ta maquette)
Route::get('/hotels/recherche', [SearchController::class, 'results'])->name('hotels.recherche');

// Route pour le sélecteur de langue (POST pour changer la langue)
Route::post('/lang/switch', function (\Illuminate\Http\Request $request) {
    $locale = $request->input('locale', 'fr');
    session(['locale' => $locale]);
    app()->setLocale($locale);
    return back();
})->name('lang.switch');

Route::resource('hotels', HotelController::class);

Route::get('/hotel/{hotel}', [ReservationController::class, 'ficheHotel'])->name('hotel.show');

// Page de paiement après choix chambre et dates
Route::get('/reservation/paiement/{room}', [ReservationController::class, 'showPaiement'])->name('reservation.paiement');

// Traitement du paiement (POST depuis formulaire)
Route::post('/reservation/paiement/{reservation_id}', [ReservationController::class, 'processPaiement'])->name('paiement.process');

// Page du bon de réservation (après paiement)
Route::get('/reservation/bon/{reservation}', [ReservationController::class, 'showBon'])->name('reservation.bon');

// Autres resources
Route::resource('users', UserController::class);
Route::resource('rooms', RoomController::class);
Route::resource('equipements', EquipementController::class);
Route::resource('room_maintenances', RoomMaintenanceController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('services', ServiceController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('messages', MessageController::class);
Route::resource('notifications', NotificationController::class);
Route::resource('historiques-actions', HistoriqueActionController::class);
Route::resource('documents', DocumentController::class);
Route::resource('photos', PhotoController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);

// client
Route::get('/client/home', [ClientController::class, 'home'])->name('client.home');


// ========== AJOUT DE LA ROUTE POUR PAGE DE PAIEMENT UNIQUE ==========

// Page de paiement unique basée sur une réservation (vue unique, pas PaymentController)
Route::get('/paiement/{reservation}', function (Reservation $reservation) {
    return view('paiement', compact('reservation'));
})->name('paiement.show');

// ====================================================================