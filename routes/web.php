<?php
use Illuminate\Support\Facades\Route;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
// (optionnel) Pour accéder aussi via /home
Route::get('/home', [HomeController::class, 'index']);

// Route de recherche d'hôtel
Route::get('/hotels/recherche', [HotelController::class, 'recherche'])->name('hotels.recherche');

// Route pour le sélecteur de langue (POST pour changer la langue)
Route::post('/lang/switch', function (\Illuminate\Http\Request $request) {
    $locale = $request->input('locale', 'fr');
    session(['locale' => $locale]);
    app()->setLocale($locale);
    return back();
})->name('lang.switch');

// Vos routes resource existantes
//Route::resource('home', HomeController::class);
Route::resource('hotels', HotelController::class);
Route::resource('users', UserController::class);
Route::resource('rooms', RoomController::class);
Route::resource('equipements', EquipementController::class);
Route::resource('room_maintenances', RoomMaintenanceController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('payments', PaymentController::class);
Route::resource('services', ServiceController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('messages', MessageController::class);
Route::resource('notifications', NotificationController::class);
Route::resource('historiques-actions', HistoriqueActionController::class);
Route::resource('documents', DocumentController::class);
Route::resource('photos', PhotoController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);