<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now form.blade.php something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/register/create', 'RegistrationController@create');
Route::post('/register/store', 'RegistrationController@store');
Route::get('/getsub/{id}', 'RegistrationController@getsub');
Route::get('/getcode/{id}', 'RegistrationController@getcode');
Route::get('/getplans/{medical}', 'RegistrationController@getplans');


/*Patient routes*/
Route::get('/patient/{user}', 'PatientsController@index')->name('patient.show');
Route::get('/patient/{user}/address', 'AddressController@index');
Route::get('/patient/{user}/address/create', 'AddressController@create');
Route::get('/patient/{user}/address/getsub/{id}', 'AddressController@getsub');
Route::get('/patient/{user}/address/getcode/{id}', 'AddressController@getcode');
Route::post('/patient/{user}/address/store', 'AddressController@store');
Route::get('/patient/{user}/address/edit', 'AddressController@edit');
Route::patch('/patient/{user}/address/update', 'AddressController@update');
Route::get('/patient/{user}/profile', 'PatientsController@show');
Route::patch('/patient/{user}/profile/update', 'PatientsController@update');
Route::get('/patient/{user}/dependents', 'DependentsController@index');
Route::get('/patient/{user}/dependents/create', 'DependentsController@create');
Route::get('/patient/{user}/dependents/{dependent}', 'DependentsController@show')->name('dependent.show');
Route::post('/patient/{user}/dependents/store', 'DependentsController@store');
Route::get('/patient/{user}/dependents/edit/{dependent}', 'DependentsController@edit')->name('dependent.edit');
Route::patch('/patient/{user}/dependents/update/{dependent}', 'DependentsController@update');
Route::post('/patient/{user}/dependent/destroy', 'DependentsController@destroy')->name('dependent.delete');
Route::get('/patient/{user}/request', 'RequestController@index')->name('request.index');
Route::get('/patient/{user}/request/history', 'RequestController@show')->name('request.show');
Route::get('/patient/{user}/request/create', 'RequestController@create');
Route::post('/patient/{user}/request/store', 'RequestController@store');
Route::post('/patient/{user}/request/cancel', 'RequestController@update')->name('request.cancel');
Route::resource('request','RequestController');


/*Admin routes*/
Route::get('/admin/{user}', 'ManagerController@index');
Route::get('/admin/{user}/suburbs', 'SuburbsController@list');
Route::get('/admin/{user}/suburbs/create', 'SuburbsController@create');
Route::post('/admin/{user}/suburbs/store', 'SuburbsController@store');
Route::get('/admin/{user}/cities', 'CitiesController@list');
Route::post('/admin/{user}/cities', 'CitiesController@store');
Route::get('/admin/{user}/medicals', 'MedicalAidsController@list')->name('medical.show');
Route::get('/admin/{user}/medicals/create', 'MedicalAidsController@create');
Route::post('/admin/{user}/medicals/store', 'MedicalAidsController@store');
Route::get('/admin/{user}/medicals/edit/{medical}', 'MedicalAidsController@edit')->name('medical.edit');
Route::patch('/admin/{user}/medicals/update/{medical}', 'MedicalAidsController@update');
Route::get('/admin/{user}/plans', 'MedicalPlansController@list');
Route::get('/admin/{user}/plans/create', 'MedicalPlansController@create');
Route::post('/admin/{user}/plans/store', 'MedicalPlansController@store');
Route::get('/admin/{user}/plans/edit/{plan}', 'MedicalPlansController@edit')->name('plan.edit');
Route::patch('/admin/{user}/plans/update/{plan}', 'MedicalPlansController@update');
Route::get('/admin/{user}/register/nurse', 'NurseController@create');
Route::post('/admin/{user}/register/nurse/store', 'NurseController@store');
Route::get('/admin/{user}/register/lab', 'LabUserController@create');
Route::post('/admin/{user}/register/lab/store', 'LabUserController@store');
Route::get('/admin/{user}/reports', 'ReportController@index');
Route::get('/admin/{user}/reports/tests', 'ReportController@records')->name('test/records');

/*Nurse routes*/
Route::get('/nurse/{user}', 'NurseController@index');
Route::get('/nurse/{user}/suburb', 'SubController@index');
Route::get('/nurse/{user}/suburb/create', 'SubController@create');
Route::post('/nurse/{user}/suburb/store', 'SubController@store');
Route::post('/nurse/{user}/favourites/store', 'FavouritesController@store')->name('favourites.store');
Route::get('/nurse/{user}/getsub/{suburb}', 'NurseController@getsub');
Route::get('/patient/{user}/getcode/{suburb}', 'NurseController@getcode');
Route::get('/nurse/{user}/favourites', 'FavouritesController@index');
Route::get('/nurse/{user}/favourites/create', 'FavouritesController@create')->name('favourites.create');
Route::post('/nurse/{user}/favourites/destroy', 'FavouritesController@destroy')->name('favourite.delete');
Route::get('/nurse/{user}/bookings', 'TestBookingController@index')->name('bookings.index');
Route::get('/nurse/{user}/bookings/create/{request}', 'TestBookingController@create')->name('bookings.create');
Route::post('/nurse/{user}/bookings/store', 'TestBookingController@store')->name('bookings.store');
Route::get('/nurse/{user}/bookings/show', 'TestBookingController@show')->name('bookings.show');
Route::get('/nurse/{user}/test/create/{requestorID}','TestController@create')->name('test.create');
Route::post('/nurse/{user}/test/store','TestController@store')->name('test.store');
Route::post('/nurse/{user}/test/insert','TestController@insert')->name('test.insert');
/*Lab user routes*/
Route::get('/lab/{user}', 'LabUserController@index');

