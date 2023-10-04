<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\ClientInfoController;
use App\Http\Controllers\StallTypescontroller;
use App\Http\Controllers\CitationController;
use App\Http\Controllers\StallNumberController;
use App\Http\Controllers\ClientRecordController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*
Login-registration routes
*/
Route::get('/', [Authcontroller::class, 'login'])->name('login');
Route::post('/', [Authcontroller::class, 'loginp'])->name('login.p');
Route::get('/registration', [Authcontroller::class, 'registration'])->name('registration');
Route::post('/registration', [Authcontroller::class, 'registrationp'])->name('registration.p');
Route::get('/logout',[Authcontroller::class,'logout'])->name('logout');

/*
Homepage routes
*/
Route::get('/home', function () {return view('home');})->name('homepage');



// para sa clients
Route::get('/clients', [ClientController::class, 'index'])
->name('clients.index');

Route::get('/clients/add', [ClientController::class, 'addclients'])
->name('clients.addclients');

Route::post('/clients/store', [ClientController::class, 'clientstore'])
->name('clientstore');

Route::delete('/clients/{id}', [ClientController::class, 'deleteClient'])
->name('deleteClient');


Route::get('/clients/edit/{id}', [ClientController::class, 'editClient'])
->name('clients.editclient');

Route::put('/clients/update/{id}', [ClientController::class, 'updateClient'])
->name('updateClient');


//dropdown population sa stall numbers basi sa napili nga stall category/type
Route::get('/get-available-stalls/{stalltype_id}', [ClientInfoController::class, 'getAvailableStalls'])->name('get-available-stalls');








// para sa billings
Route::get('/billingskie',[BillingController:: class, 'index'])
->name('billing.index');

Route::get('/create-billingskie',[BillingController:: class, 'create'])
->name('billing.create');

Route::post('/billingskie', [BillingController::class, 'store'])
->name('billing.store');

Route::get('/violations',[ViolationController:: class, 'index'])
->name('violation.index');

Route::delete('/billings/delete/{id}', [BillingController:: class, 'delete'])
->name('billings.delete');

Route::get('/billing-record', [BillingController:: class, 'records']) ->name('billing.record');




// client records


Route::get('/clientrecords', [ClientRecordController::class, 'index'])->name('clientrecords.index');





// naa sya sa billing controller arun ma access ang data in general and iwas confusion


 Route::get('/get-dropdown-options',[ClientInfoController::class,'getDropdownOptions']);








Route::get('/create-violation',[ViolationController:: class, 'create'])
->name('violation.create');

Route::post('/violations', [ViolationController::class, 'store'])
->name('violation.store');

Route::get('/violations/{violation}/edit', [ViolationController::class, 'edit'])
->name('violation.edit');

Route::put('/violations/{violation}', [ViolationController::class, 'update'])
->name('violation.update');

Route::delete('/violations/{violation}', [ViolationController::class, 'destroy'])
->name('violation.destroy');

Route::post('/report-violation/{client_id}/{stall_type_id}', 'YourControllerNameHere@reportViolation')->name('reportViolation');


Route::post('/report-violation/{client_id}/{stall_id}', [ViolationController::class, 'reportViolation'])->name('reportViolation');

Route::get('/violation-details/{stall_id}', [ViolationController::class, 'violationDetails'])->name('violationDetails');



// Stall Types
Route::get('/stall-types', [StallTypesController::class, 'index'])
->name('stall-types.index');

Route::get('/stall-types/create', [StallTypesController::class, 'create'])
->name('stall-types.create');

Route::post('/stall-types', [StallTypesController::class, 'store'])
->name('stall-types.store');

Route::get('/stall-types/{stallType}/edit', [StallTypesController::class, 'edit'])
->name('stall-types.edit');

Route::put('/stall-types/{stallType}', [StallTypesController::class, 'update'])
->name('stall-types.update');

Route::delete('/stall-types/{stallType}', [StallTypesController::class, 'destroy'])
->name('stall-types.destroy');


// para sa stall numbers
Route::get('/stall-types/{stallType}/view', [StallNumberController::class, 'view'])
->name('stall-types.stallnumbers.view');

Route::get('/stall-types/{stallType}/stall-numbers/create', [StallNumberController::class, 'create'])
->name('stall-types.stall-numbers.create');





Route::post('/stall-types/stall-numbers/store', [StallNumberController::class, 'store'])
->name('stall-types.stallnumbers.store');

Route::delete('/stall-numbers/{stallNumber}', [StallNumberController::class, 'destroy'])
->name('stall-numbers.destroy');


Route::get('/clientrecords/index',[ClientRecordController::class, 'index'])
->name('clientrecords.index');

#client info
Route::get('/client_info', [ClientInfoController::class, 'index'])->name('client_info.index');
Route::get('/client_info/add', [ClientInfoController::class, 'addclientinfo'])->name('client_info.add');
Route::post('/client_info/store', [ClientInfoController::class, 'clientinfostore'])->name('client_info.store');
Route::get('/client_info/view/{id}', [ClientInfoController::class, 'view'])->name('client_info.view');
Route::put('/client_info/update/{id}', [ClientInfoController::class, 'updateClient'])->name('client_info.update');
Route::delete('/client_info/delete/{id}', [ClientInfoController::class, 'deleteClient'])->name('client_info.delete');




Route::get('/client_info/violationbilling/{client_id}', [CitationController::class, 'violationbilling'])
->name('violationbilling');
Route::get('/client_info/addviolation/{client_id}', [CitationController::class, 'addviolation'])
->name('client_info.addbiling');
Route::get('/client_info/citation/{client_id}', [CitationController::class, 'clientcitation'])
    ->name('client_info.citation');

Route::post('/client_info/storeviolation', [CitationController::class, 'storeviolation'])->name('client_info.storeviolation');















