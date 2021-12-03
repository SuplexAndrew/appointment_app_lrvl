<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentsController;
Route::get('/hey', function () {
    return 'welcome';
});
Route::get('/get', [AppointmentsController::class, 'GetAppointments']);

Route::post('/add', [AppointmentsController::class, 'AddAppointments']);
Route::delete('/delete', [AppointmentsController::class, 'DeleteAppointments']);
