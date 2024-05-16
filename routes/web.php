<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CallServiceController;
use App\Http\Controllers\CaisseController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


 // ROUTES CONCERNANT LES CLIENTS

Route::middleware(['guest'])->group(function(){
    Route::get('/', [AuthController::class, 'loginView']);
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});

// Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');


Route::middleware(['auth'])->group(function(){


    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.index');



    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::get('/commercial/create', [CommercialController::class, 'create'])->name('commercial.create');

    Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{notification}', [NotificationController::class, 'editStatus'])->name('notifications.editStatus');

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

});


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');




// Route::get('/commercial/create', [CommercialController::class, 'create'])->name('commercial.create');

// Route::post('/commercial/store', [CommercialController::class, 'store'])->name('commercial.store');
Route::post('/commercial/store', [CommercialController::class, 'store'])->name('commercial.store')
    ->middleware('setUserIdForProspect');

Route::get('/commercial', [CommercialController::class, 'index'])->name('commercial.index');
Route::get('/commercial/{id}', [CommercialController::class, 'show'])->name('commercial.show');

Route::get('/commercial/{id}/edit', [CommercialController::class, 'edit'])->name('commercial.edit');
Route::put('/commercial/{id}/update', [CommercialController::class, 'update'])->name('commercial.update');
Route::delete('/commercial/{id}/delete', [CommercialController::class, 'destroy'])->name('commercial.destroy');
Route::get('/commercial/prospects', [CommercialController::class, 'prospectsByCommercial'])->name('commercial.prospects');

// Route::put('/commercial/{id}/update-status', 'CommercialController@updateStatus')->name('commercial.updateStatus');
Route::put('/commercial/{id}/update-status', [CommercialController::class, 'updateStatus'])->name('commercial.updateStatus');

Route::get('/commercialstat', [CommercialController::class, 'statistique'])->name('commercial.stat');




Route::get('/generate-pdf', [ClientController::class, 'generatePDF'])->name('generate.pdf');


Route::get('/prospects', [CallServiceController::class, 'showProspects'])->name('call_service.prospects');
// Route::get('/clients', [CallServiceController::class, 'showClients'])->name('call_service.clients');
Route::get('/clients_call', [CallServiceController::class, 'showClients'])->name('call_service.showClients');
Route::get('/caisse/facture', [CaisseController::class, 'showInvoice'])->name('caisse.facture');
Route::post('/generer-facture', [CaisseController::class, 'generateInvoice'])->name('generate.invoice');
// Route pour afficher la liste des factures
Route::get('/factures', [CaisseController::class, 'voirFactures'])->name('caisse.views');
Route::get('/factures/{id}', [CaisseController::class, 'detailFacture'])->name('factures.details');


Route::get('/ordonnance/generate', [ClientController::class, 'showordonnance'])->name('ordonnance.views');

Route::post('/ordonnance/generate', [ClientController::class, 'generate'])->name('ordonnance.generate');



// Route::get('/stat', function () {
//     return view('commercial.stat');
// });
// Route::get('/facture', function () {
//     return view('caisse.facture');
// });
