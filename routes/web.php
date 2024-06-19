<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\CommerciauxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CallServiceController;
use App\Http\Controllers\CaisseController;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});

Route::get('/performance', [CommerciauxController::class, 'showMonthlyPerformance'])->name('performance');

Route::get('/stata', function () {
    return view('commercial.monthly_performance');
});

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/consultation', function () {
    return view('consultation');
})->name('consultation');

Route::get('/lunettes', function () {
    return view('lunettes');
})->name('lunettes');

Route::middleware(['auth'])->group(function () {

    // Gestion des utilisateurs (Admin only)
    Route::middleware(['role:1'])->group(function () {
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Gestion des Clients/Patients
    Route::middleware(['role:1,2,3,4,5'])->group(function () {
        Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

        // Routes pour les interactions de service Call
        Route::get('clients/{client}/call-interactions', [ClientController::class, 'showServiceCallInteractions'])->name('call.entreprise.index');
        Route::get('clients/{client}/call-interactions/create', [ClientController::class, 'createServiceCallInteraction'])->name('call.entreprise.create');
        Route::post('clients/{client}/call-interactions', [ClientController::class, 'addServiceCallInteraction'])->name('call.entreprise.store');
        Route::get('clients/{client}/call-interactions/{interaction}/edit', [ClientController::class, 'editServiceCallInteraction'])->name('call.entreprise.edit');
        Route::get('clients/{client}/call-interactions/{interaction}/show', [ClientController::class, 'showInteraction'])->name('call.entreprise.show');
        Route::put('clients/{client}/call-interactions/{interaction}', [ClientController::class, 'updateServiceCallInteraction'])->name('call.entreprise.update');
        Route::delete('clients/{client}/call-interactions/{interaction}', [ClientController::class, 'deleteServiceCallInteraction'])->name('call.entreprise.destroy');

        Route::middleware(['role:1,2,3,4'])->group(function () {
            Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
            Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
            Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
            Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
            Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
            Route::get('/clients/factures', [ClientController::class, 'voirFactures'])->name('client.voirFactures');
            Route::get('/clients/factures/{id}', [ClientController::class, 'detailFacture'])->name('client.detailFacture');
        });

        Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');

        Route::middleware(['role:1,3'])->group(function () {
            Route::get('/ordonnance/generate', [ClientController::class, 'showordonnance'])->name('ordonnance.create');
            Route::post('/ordonnance/generate', [ClientController::class, 'generate'])->name('ordonnance.generate');
            Route::get('/prescriptions', [ClientController::class, 'indexOrdonnance'])->name('prescriptions.index');
            Route::get('/prescriptions_detail/{id}', [ClientController::class, 'voirOrdonnance'])->name('prescriptions.show');
        });
    });

    // Gestion des Commerciaux
    Route::middleware(['role:1,6'])->group(function () {
        // Routes pour CommercialController
        Route::get('/commercial/create', [CommercialController::class, 'create'])->name('commercial.create');
        Route::post('/commercial/store', [CommercialController::class, 'store'])->name('commercial.store')
            ->middleware('setUserIdForProspect');
        Route::get('/commercial', [CommercialController::class, 'index'])->name('commercial.index');
        Route::get('/commercial/{id}', [CommercialController::class, 'show'])->name('commercial.show');
        Route::get('/commercial/{id}/edit', [CommercialController::class, 'edit'])->name('commercial.edit');
        Route::put('/commercial/{id}/update', [CommercialController::class, 'update'])->name('commercial.update');
        Route::delete('/commercial/{id}/delete', [CommercialController::class, 'destroy'])->name('commercial.destroy');
        Route::get('/commercial/prospects', [CommercialController::class, 'prospectsByCommercial'])->name('commercial.prospects');
        Route::put('/commercial/{id}/update-status', [CommercialController::class, 'updateStatus'])->name('commercial.updateStatus');
        Route::get('/commercials/{id}/monthly-performance', [CommercialController::class, 'showMonthlyPerformance'])->name('commercials.monthlyPerformance');
        Route::get('/commercialstat', [CommerciauxController::class, 'stats'])->name('commercial.stats');
        Route::get('commercials/{id}/prospects', [CommerciauxController::class, 'showProspects'])->name('commercial.prospects');
        Route::post('/prospects/{id}/update-status', [CommerciauxController::class, 'updateProspectStatus'])->name('prospects.updateStatus');

        // Routes pour CommerciauxController
        Route::prefix('agent')->group(function () {
            Route::get('/create', [CommerciauxController::class, 'create'])->name('agent.create');
            Route::post('/store', [CommerciauxController::class, 'store'])->name('agent.store')
                ->middleware('setUserIdForProspect');
            Route::get('/', [CommerciauxController::class, 'index'])->name('agent.index');
            Route::get('/{commercial}', [CommerciauxController::class, 'show'])->name('agent.show');
            Route::get('/{commercial}/edit', [CommerciauxController::class, 'edit'])->name('agent.edit');
            Route::put('/{commercial}/update', [CommerciauxController::class, 'update'])->name('agent.update');
            Route::delete('/{commercial}/delete', [CommerciauxController::class, 'destroy'])->name('agent.destroy');
            Route::get('/prospects/{commercialId}', [CommerciauxController::class, 'getProspectsByCommercial']);
        });
    });

    // Service Call
    Route::middleware(['role:1,10'])->group(function () {
        Route::get('/prospects', [CallServiceController::class, 'showProspects'])->name('call_service.prospects');
        Route::get('/clients_call', [CallServiceController::class, 'showClients'])->name('call_service.showClients');
    });

    // Gestion Caisse
    Route::middleware(['role:1,5'])->group(function () {
        Route::get('/caisse/facture', [CaisseController::class, 'showInvoice'])->name('caisse.facture');
        Route::post('/generer-facture', [CaisseController::class, 'generateInvoice'])->name('generate.invoice');
        Route::get('/factures', [CaisseController::class, 'voirFactures'])->name('caisse.views');
        Route::get('/factures/{id}', [CaisseController::class, 'detailFacture'])->name('factures.details');
        Route::get('/recus/{id}/edit', [CaisseController::class, 'edit'])->name('recus.edit');
        Route::put('/recus/{id}', [CaisseController::class, 'update'])->name('recus.update');
        Route::delete('/recus/{id}', [CaisseController::class, 'destroy'])->name('recus.destroy');
        Route::get('/generate-receipt-pdf/{id}', [CaisseController::class, 'generateReceiptPdf'])->name('generate.receipt.pdf');
    });

    Route::middleware(['role:1,5,4'])->group(function () {
        Route::get('/caisse/recu', [CaisseController::class, 'index'])->name('caisse.recu.index');
        Route::get('/recus/{id}', [CaisseController::class, 'show'])->name('recus.show');
    });

    // Paramètres et Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{notification}', [NotificationController::class, 'editStatus'])->name('notifications.editStatus');

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // Dashboard accessible à tous les utilisateurs authentifiés
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::get('/generate-pdf', [ClientController::class, 'generatePDF'])->name('generate.pdf');

?>

