<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\calendar_doctor;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\medicos_disponibles;
use App\Http\Controllers\Api\NotificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/calendar/', [calendar_doctor::class, 'index'])->name('calendar');

    Route::get('/calendar_doctor', [calendar_doctor::class, 'index'])->name('calendar_doctor');
    Route::get('/fetchAppointments/{id}', [calendar_doctor::class, 'fetchDoctorAppointments'])->name('calendar_doctor_fetch_appointments');
    Route::post('/calendar_doctor/store/', [calendar_doctor::class, 'store'])->name('calendar_doctor_post');
    Route::patch('/calendar_doctor/update/', [calendar_doctor::class, 'update'])->name('calendar_doctor_update');
    Route::patch('/calendar_doctor/update_time/{id}', [calendar_doctor::class, 'update_time'])->name('calendar_doctor_update_time');
    Route::post('/calendar_doctor/uploadLogo/{id}', [calendar_doctor::class, 'uploadLogo'])->name('calendar_doctor_uploadLogo');
    Route::delete('/calendar_doctor/deleteLogo/{id}', [calendar_doctor::class, 'deleteLogo'])->name('calendar_doctor_delete');
    Route::patch('/calendar_doctor/finish/{id}', [calendar_doctor::class, 'finish'])->name('calendar_doctor_finish');
    Route::patch('/calendar_doctor/store/data_paciente', [calendar_doctor::class, 'patientAppointed'])->name('patient_appointed');
    Route::patch('/calendar_doctor/edit/editPatient', [calendar_doctor::class, 'editPatient'])->name('patient_edited');
    Route::patch('/calendar_doctor/store/data_paciente_for_date', [calendar_doctor::class, 'patientNewAppointed'])->name('patient_new_appointed');

    //Pacientes
    Route::get('/patients', [calendar_doctor::class, 'pacientesList'])->name('pacientes_list');
    Route::post('/patients/create', [calendar_doctor::class, 'pacientesCreate'])->name('pacientes_create');
    Route::patch('/patients/update/{id}', [calendar_doctor::class, 'pacientesUpdate'])->name('pacientes_update');

    //Notas
    Route::post('/calendar_doctor/notes/create', [calendar_doctor::class, 'notes_create'])->name('calendar_doctor__notes_post');
    Route::delete('/calendar_doctor/notes/delete/{id}', [calendar_doctor::class, 'notes_delete'])->name('calendar_doctor__notes_delete');
    Route::patch('/calendar_doctor/notes/update/{id}', [calendar_doctor::class, 'notes_update'])->name('calendar_doctor__notes_update');

    //Archivos
    Route::post('/calendar_doctor/file/upload', [ArchivoController::class, 'subirArchivo'])->name('calendar_doctor__files_post');
    Route::delete('/calendar_doctor/file/destroy/{id}', [ArchivoController::class, 'eliminarArchivo'])->name('calendar_doctor__files_delete');

    //Historial
    Route::get('/history/{id}', [calendar_doctor::class, 'historyPatient'])->name('history_patient');
    Route::patch('/history/update/{id}', [calendar_doctor::class, 'historyPatientUpdate'])->name('history_patient');

    //Generación de PDF para historial
    Route::get('/history/pdf/generate/{id}', [PDFController::class, 'historico'])->name('history_pdf');
    Route::get('/history/pdf/generate/all/{id}', [PDFController::class, 'historico_completo'])->name('history_all_pdf');

    Route::get('/calendar_doctor/back/', [calendar_doctor::class, 'redirected'])->name('redirected');
    //Route::put('/calendar_doctor/store/data_paciente/', [calendar_doctor::class, 'paciente_data'])->name('calendar_paciente_post');

    Route::delete('/calendar/delete/{id}', [calendar_doctor::class, 'destroy'])->name('calendar_doctor_delete');
    Route::get('/calendar/delete/{id}', [calendar_doctor::class, 'destroy'])->name('calendar_doctor_delete');
    Route::get('/calendar_view/medico/{medico}/{user}', [calendar_doctor::class, 'show'])->middleware(['negar_acceso_calendario_paciente'])->name('calendar_view');
    Route::get('/calendario/medico/{medico}/{user}', [calendar_doctor::class, 'create'])->middleware(['negar_acceso_calendario'])->name('prove_fetch');

    // medicalProfileForm
    Route::get('/medicalProfileForm/{user}', [calendar_doctor::class, 'medicalProfileForm'])->name('medical_profile_form');
    Route::post('medicos', [\App\Http\Controllers\medicos::class, 'Medicos']);

    Route::get('medicalProfileEditForm/Edit/{medico}',[\App\Http\Controllers\perfil_medico::class, 'showEdit'])->name('medical_profile_edit_form') ;
    Route::patch('medicalProfileEditForm/Update/{medico}',[\App\Http\Controllers\perfil_medico::class, 'update'] );

    // companyProfileForm
    Route::get('/companyProfileForm/{user}', [calendar_doctor::class, 'companyProfileForm'])->name('company_profile_form');
    Route::post('/companyProfilePost',[\App\Http\Controllers\perfil_clinico::class,'clinicasPost'])->name('company_profile_post');

    //paises
    //Route::get('/paises', [\App\Http\Controllers\Api\PaisController::class, 'index']);
    //Route::get('/states/{pais}', [\App\Http\Controllers\Api\StateController::class, 'show']);
    //Route::get('/ciudades/{state}', [\App\Http\Controllers\Api\CiudadController::class, 'show']);

    Route::get('paises', [\App\Http\Controllers\Api\PaisController::class, 'index']);
    Route::get('states/{paisId}', [\App\Http\Controllers\Api\StateController::class, 'show']);
    Route::get('ciudades/{stateId}', [\App\Http\Controllers\Api\CiudadController::class, 'show']);
    Route::get('especialidades', [\App\Http\Controllers\Api\EspecialidadesController::class, 'index']);

    Route::get('/navigation-access/', [medicos_disponibles::class, 'navigationAccess'])->name('navigation_access');

        // Ruta para obtener todas las notificaciones del usuario autenticado (médico)
    Route::get('/notifications', [NotificationController::class, 'index'])->name('api.notifications.index');

    // Ruta para marcar una notificación específica como leída
    Route::put('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('api.notifications.read');
});
