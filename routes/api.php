<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentsController;


Route::middleware(['cors'])->group(function () {
    Route::get('/get', [AppointmentsController::class, 'GetAppointments']);
    Route::post('/add', [AppointmentsController::class, 'AddAppointments']);
    Route::delete('/delete/{id?}', [AppointmentsController::class, 'DeleteAppointments']);
    Route::get('/getticketypes', [AppointmentsController::class, 'GetTicketTypes']);
});

