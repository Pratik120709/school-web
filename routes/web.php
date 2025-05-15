<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\front\FrontUniversityController;
use App\Http\Controllers\front\HomeController;
use Maatwebsite\Excel\Facades\Excel;


Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/about-us', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('welcome');
});

Route::get('/resources', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('getStatesByCountry/{id}', [LocationController::class, 'getStatesByCountry']);


Route::prefix('admin')->group(function () {

    Route::get('/country', [LocationController::class, 'country'])->name('admin.country.country');
    Route::post('/country/store', [LocationController::class, 'storeCountry'])->name('admin.country.store');
    Route::get('/country/edit/{id}', [LocationController::class, 'editCountry'])->name('admin.country.editCountry');
    Route::post('/country/update/{id}', [LocationController::class, 'updateCountry'])->name('admin.country.updateCountry');

    Route::get('/state', [LocationController::class, 'state'])->name('admin.state.state');
    Route::post('/state/store', [LocationController::class, 'storeState'])->name('admin.state.store');
    Route::post('/editState/{id}', [LocationController::class, 'editState'])->name('admin.state.editState');


    Route::get('/programs', [LocationController::class, 'programs'])->name('admin.programs.programs');
    Route::post('/programs/store', [LocationController::class, 'storeProgram'])->name('admin.program.store');
    Route::get('/programs/edit/{id}', [LocationController::class, 'editProgram'])->name('admin.program.editProgram');
    Route::post('/programs/update/{id}', [LocationController::class, 'updateProgram'])->name('admin.program.updateProgram');
    


    Route::get('/subject', [LocationController::class, 'subject'])->name('admin.subject.subject');
    Route::post('/subject/store', [LocationController::class, 'storeSubject'])->name('admin.subject.store');
    Route::post('/editSubject/{id}', [LocationController::class, 'editSubject'])->name('admin.subject.editSubject');

    Route::get('/department',[LocationController::class,'Department'])->name('admin.department.department');
    Route::post('/department/store',[LocationController::class,'storeDepartment'])->name('admin.department.storeDepartment');
    Route::post('/department/editDepartment/{id}',[LocationController::class,'editDepartment'])->name('admin.department.editDepartment');
    Route::post('/department/updateDepartment/{id}', [LocationController::class, 'updateDepartment'])->name('admin.program.updateDepartment');
 
    Route::get('/student',[UniversityController::class,'studentContact'])->name('admin.student_conatct');
    Route::get('/student/filter', [UniversityController::class, 'filterStudentContacts'])->name('admin.student_contact.filter');
    Route::get('/student/export', [UniversityController::class, 'export'])->name('student.export');
    Route::get('/media',[UniversityController::class,'media'])->name('admin.media');
    Route::post('/media/store', [UniversityController::class, 'storeMedia'])->name('admin.media.store');
    Route::get('media/{id}', [UniversityController::class, 'deleteMediaFile'])->name('admin.deleteMediaFile');
    Route::post('/media/delete-selected', [UniversityController::class, 'deleteSelectedMedia'])->name('admin.deleteSelectedMedia');



    // University
    Route::get('/university',[UniversityController::class,'University'])->name('admin.university.university');
    Route::get('/university/addUniversity',[UniversityController::class,'addUniversity'])->name('admin.university.addUniversity');
    Route::get('admin/getStatesByCountry/{countryId}', [UniversityController::class, 'getStatesByCountry'])->name('admin.getStatesByCountry');
    Route::get('admin/getDepartmentsByProgram/{programId}', [UniversityController::class, 'getDepartmentsByProgram'])->name('admin.getDepartmentsByProgram');
    Route::get('admin/getSubjectsByDepartment/{departmentId}', [UniversityController::class, 'getSubjectsByDepartment'])->name('admin.getSubjectsByDepartment');
    Route::get('/university/editUniversity/{id}',[UniversityController::class,'editUniversity'])->name('admin.university.editUniversity');
    Route::put('/university/update/{id}', [UniversityController::class, 'updateUniversity'])->name('admin.university.update');
    Route::get('/university/viewUniversity/{id}',[UniversityController::class,'viewUniversity'])->name('admin.university.viewUniversity');
    Route::post('/university/store', [UniversityController::class, 'storeUniversity'])->name('admin.university.store');
    Route::delete('/universities/gallery/{gallery}', [UniversityController::class, 'deleteGalleryImage'])->name('universities.deleteGalleryImage');
    Route::post('/university/import', [UniversityController::class, 'importUniversities'])->name('admin.university.import');
    Route::get('/university/failedUniversity',[UniversityController::class,'failedUniversity'])->name('admin.university.failedUniversity');
    Route::get('university/deleteFailedRecord/{id}', [UniversityController::class, 'deleteFailedRecord'])->name('admin.deleteFailedRecord');
    Route::get('university/deleteAllFailedRecord', [UniversityController::class, 'deleteAllFailedRecord'])->name('admin.deleteAllFailedRecord');


});

//front........................
Route::get('universityList', [FrontUniversityController::class, 'universityList'])->name('universityList');
Route::get('states/{countryId}', [FrontUniversityController::class, 'getStates']);
Route::get('/getDepartments/{programId}', [FrontUniversityController::class, 'getDepartments']);
Route::get('/getSubjects/{departmentId}', [FrontUniversityController::class, 'getSubjects']);
Route::get('listing/{slug}', [FrontUniversityController::class, 'listing'])->name('listing');
Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/getStatesByCountry', [HomeController::class, 'getStatesByCountry']);
Route::get('/getProgramsByCountryState', [HomeController::class, 'getProgramsByCountryState']);
Route::get('/getDepartmentsByPrograms', [HomeController::class, 'getDepartmentsByPrograms']);

Route::get('/get-departments-by-program/{program_id}', [HomeController::class, 'getDepartmentsByProgram']);

Route::get('programs', [FrontUniversityController::class, 'programsDetails'])->name('programs');
Route::get('admission', [FrontUniversityController::class, 'admission'])->name('admission');
Route::get('contact', [FrontUniversityController::class, 'contact'])->name('contact');
Route::get('signIn', [FrontUniversityController::class, 'signIn'])->name('signIn');
Route::get('signUp', [FrontUniversityController::class, 'signUp'])->name('signUp');
Route::post('/student-contacts', [FrontUniversityController::class, 'store'])->name('student.contacts.store');
 

