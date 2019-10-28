<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('users/verifyuser/{id}','UserController@verifyuser');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

/*******************|-------------------------------|********************/
/*******************| ROUTE MIDDLEWARE GROUP STARTS |********************/
/*******************|-------------------------------|********************/
Route::group(['middleware' => 'auth'], function () {


Route::get('/dashboard', 'HomeController@index')->name('dashboard');
// User List
Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/create', 'UserController@create');
Route::post('users/save', 'UserController@store')->name('save');


Route::get('/users/edit/{user}', 'UserController@edit');
Route::patch('users/update/{user}', 'UserController@update')->name('users.update');
Route::delete('users/{user}', 'UserController@destroy');
Route::get('/users/profile/edit/{id}', 'UserController@profile');
Route::patch('users/profileupdate/{id}', 'UserController@profileupdate')->name('users.profileupdate');

/********************** ROLE ROUTES STRATS *****************************/
Route::get('/roles','RoleController@index');

Route::get('/roles/create', 'RoleController@create');
/********************** ROLE ROUTES BREAKS ****************************/

Route::get('/successfulregister', function () {
    return view('layouts.beforelogin.successfulregister');
});

/********************** ROLE ROUTES CONTINUES ************************/

Route::get('/successfulregister', function () {
    return view('layouts.beforelogin.successfulregister');
});
Route::post('roles/store', 'RoleController@store');

Route::get('roles/edit/{role}', 'RoleController@edit');

Route::patch('roles/update/{role}', 'RoleController@update');



/********************** ROLE ROUTES ENDS ****************************/


/*******************EMPLOYEES ROUTES STARTS ************************/

Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::get('/employees/create', 'EmployeeController@create');
Route::patch('/employees/create', 'EmployeeController@create');

Route::get('/employees/edit/{employee}', 'EmployeeController@edit');
Route::patch('/employees/update/{employee}', 'EmployeeController@update');
Route::delete('/employees/{employee}', 'EmployeeController@destroy');

/*******************EMPLOYEES ROUTES ENDS  *************************/

/***************** CALENDER ROUTE ***************/
Route::get('/booking/calendar', 'BookingController@calendar');
/***************** CALENDER ROUTE ***************/

/****************Services Route*****************/
Route::resource('services','ServiceController');




/******************* EmployeeServices Route Starts *****************/

Route::get('/employees/services','EmployeeserviceController@index');
Route::get('employees/services/assign','EmployeeserviceController@create');
Route::post('employees/services/store','EmployeeserviceController@store');
Route::get('/employees/services/edit/{employeeservice}','EmployeeserviceController@edit');
Route::patch('/employees/services/update/{employeeservice}','EmployeeserviceController@update');
Route::resource('employeeservices', 'EmployeeserviceController');
/******************* EmployeeServices Route Ends ******************/


/*************************** SLOT ROUTES STARTS ************************/
Route::get('/slots','SlotController@index');
Route::get('/slots/create','SlotController@create');
Route::get('/slots/emplist/{id}','SlotController@emplist');
Route::post('/slots/create','SlotController@store');
Route::patch('/slots/{slot}/update', 'SlotController@update');
Route::resource('slots','SlotController');
/*************************** SLOT ROUTES ENDS **************************/
/*******************Settings***********************/
Route::get('/settings','SettingsController@index');
Route::post('/settings','SettingsController@store');
Route::patch('/settings/save','SettingsController@updateval');


/*************************** Appointments Routes Starts ****************/
Route::get('/appointments', 'AppointmentController@index');
Route::get('/appointments/book', 'AppointmentController@create');
Route::post('/appointments/book', 'AppointmentController@store');
Route::get('/appointments/applist/{slot}', 'AppointmentController@applist');
Route::get('/service/emplist/{id}','AppointmentController@emplist');
Route::get('/appointments/booking-history', 'AppointmentController@history');
Route::get('/appointments/history/{customer}', 'AppointmentController@customerBookingHistory');
Route::get('/appointments/booking-reports', 'AppointmentController@reports');
Route::get('/appointments/booking-reports/view-reports/{param}', 'AppointmentController@reportDetails');
/*************************** Appointments Routes Ends ******************/


/*********************** Download Routes Strats ********************/

    // User export routes
    Route::get('/users/export', 'UserController@export');

    // Role export routes
    Route::get('/roles/exportexcel', 'RoleController@exportexcel');

    // Employees export routes
    Route::get('/employees/export', 'EmployeeController@exportExcel');

    // Services export routes
    // Route::get('/services/export', 'ServiceController@exportExcel');
    Route::get('/services/exportexcel', 'ServiceController@exportExcel');

/*********************** Download Routes Ends **********************/

    /** Approve Appointment Status Route */
    Route::post('/appointments/change-status/{bookingid}', 'AppointmentController@updateStatus');
});
/*******************|-----------------------------|********************/
/*******************| ROUTE MIDDLEWARE GROUP ENDS |********************/
/*******************|-----------------------------|********************/
