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

/* ROOT */
Route::get('/', function () {
    return view('auth/login');
});

/* USERS ROUTES */
Auth::routes();
Route::get('/auth/logout', 'Auth\LoginController@logout'); // This route is made cause the original logout is a POST and we want a GET

/* TECHNOLOGICALS ROUTES */
Route::get('/technologicals', 'TechnologicalController@index');
Route::post('/technological', 'TechnologicalController@store');

/* BUILDING ROUTES */
Route::get('/buildings', 'BuildingController@index');
Route::post('/building', 'BuildingController@store');

/* AREA ROUTES */
Route::get('/building/{id}', 'AreaController@index')->name('areas.index');
Route::post('/building/{id}', array('uses' => 'AreaController@store'));

/* AIR CONDITIONERS ROUTES */
Route::get('/airs', 'AirConditionerController@index')->name('airs.index');
Route::post('/airs', 'AirConditionerController@store');

/* MAINTENANCE ROUTES */
Route::get('/air/{id}', 'MaintenanceController@index')->name('maintenances.index');
Route::post('/air/{id}', array('uses' => 'MaintenanceController@store'));

/* ACTIVE AIRS ROUTES */
Route::get('/area/{id}', 'ActiveAirController@index')->name('active.index');
Route::post('/area/{id}', array('uses' => 'ActiveAirController@store'));
Route::get('/{area}/{id}/{active}/remove', array('uses' => 'ActiveAirController@removeAir'));

/* SENSORS ROUTES */
Route::get('/sensors', 'SensorController@index');
Route::post('/sensors', 'SensorController@store');

/* PERFORMANCE ROUTES */
Route::get('/activeAir/{id}', 'PerformanceController@index')->name('performances.index');
Route::post('/activeAir/{id}', array('uses' => 'PerformanceController@store'));

/* ACTIVE SENSORS ROUTES */
Route::get('/active/{id}', 'ActiveSensorController@index')->name('activeSensors.index');
Route::post('/active/{id}', array('uses' => 'ActiveSensorController@store'));
Route::get('/{active}/{id}/{air}/removeSensor', array('uses' => 'ActiveSensorController@remove'));