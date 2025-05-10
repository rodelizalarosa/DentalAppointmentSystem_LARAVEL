<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserStatusController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\DentalServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentStatusController;
use App\Http\Controllers\AppointmentServiceController;
use App\Http\Controllers\TreatmentStatusController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentStatusController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {

    // Authentcation
    Route::post('/logout', [AuthenticationController::class, 'logout']);

    // User
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

    // User Status
    Route::get('/get-userStatuses', [UserStatusController::class, 'getUserStatuses']);
    Route::post('/add-userStatus', [UserStatusController::class, 'addUserStatus']);
    Route::put('/edit-userStatus/{id}', [UserStatusController::class, 'editUserStatus']);
    Route::delete('/delete-userStatus/{id}', [UserStatusController::class, 'deleteUserStatus']);

    // Patient
    Route::get('/get-patients', [PatientController::class, 'getPatients']);
    Route::post('/add-patient', [PatientController::class, 'addPatient']);
    Route::put('/edit-patient/{id}', [PatientController::class, 'editPatient']);
    Route::delete('/delete-patient/{id}', [PatientController::class, 'deletePatient']);

    // Dentist
    Route::get('/get-dentists', [DentistController::class, 'getDentists']);
    Route::post('/add-dentist', [DentistController::class, 'addDentist']);
    Route::put('/edit-dentist/{id}', [DentistController::class, 'editDentist']);
    Route::delete('/delete-dentist/{id}', [DentistController::class, 'deleteDentist']);

    // Dental Services
    Route::get('/get-dentalServices', [DentalServiceController::class, 'getdentalServices']);
    Route::post('/add-dentalService', [DentalServiceController::class, 'adddentalService']);
    Route::put('/edit-dentalService/{id}', [DentalServiceController::class, 'editdentalService']);
    Route::delete('/delete-dentalService/{id}', [DentalServiceController::class, 'deletedentalService']);

    // Appointment 
    Route::get('/get-appointments', [AppointmentController::class, 'getAppointments']);
    Route::post('/add-appointment', [AppointmentController::class, 'addAppointment']);
    Route::put('/edit-appointment/{id}', [AppointmentController::class, 'editAppointment']);
    Route::delete('/delete-appointment/{id}', [AppointmentController::class, 'deleteAppointment']);

    // Appointment Status
    Route::get('/get-appointmentStatuses', [AppointmentStatusController::class, 'getAppointmentStatuses']);
    Route::post('/add-appointmentStatus', [AppointmentStatusController::class, 'addAppointmentStatus']);
    Route::put('/edit-appointmentStatus/{id}', [AppointmentStatusController::class, 'editAppointmentStatus']);
    Route::delete('/delete-appointmentStatus/{id}', [AppointmentStatusController::class, 'deleteAppointmentStatus']);

    // Appointment Service
    Route::get('/get-appointmentServices', [AppointmentServiceController::class, 'getAppointmentServices']);
    Route::post('/add-appointmentService', [AppointmentServiceController::class, 'addAppointmentService']);
    Route::put('/edit-appointmentService/{id}', [AppointmentServiceController::class, 'editAppointmentService']);
    Route::delete('/delete-appointmentService/{id}', [AppointmentServiceController::class, 'deleteAppointmentService']);

    // Treatment Status
    Route::get('/get-treatmentStatuses', [TreatmentStatusController::class, 'getTreatmentStatuses']);
    Route::post('/add-treatmentStatus', [TreatmentStatusController::class, 'addTreatmentStatus']);
    Route::put('/edit-treatmentStatus/{id}', [TreatmentStatusController::class, 'editTreatmentStatus']);
    Route::delete('/delete-treatmentStatus/{id}', [TreatmentStatusController::class, 'deleteTreatmentStatus']);

    // Payment 
    Route::get('/get-payments', [PaymentController::class, 'getPayments']);
    Route::post('/add-payment', [PaymentController::class, 'addPayment']);
    Route::put('/edit-payment/{id}', [PaymentController::class, 'editPayment']);
    Route::delete('/delete-payment/{id}', [PaymentController::class, 'deletePayment']);

    // Payment Status
    Route::get('/get-paymentStatuses', [PaymentStatusController::class, 'getPaymentStatuses']);
    Route::post('/add-paymentStatus', [PaymentStatusController::class, 'addPaymentStatus']);
    Route::put('/edit-paymentStatus/{id}', [PaymentStatusController::class, 'editPaymentStatus']);
    Route::delete('/delete-paymentStatus/{id}', [PaymentStatusController::class, 'deletePaymentStatus']);

});
