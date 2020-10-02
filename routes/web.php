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

Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::routes(); 
Route::group(['middleware' => ['auth']], function () { 
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('physical-planning', 'PhysicalPlanningController');
    Route::get('physical-planning-file-export', 'PhysicalPlanningController@fileExport')->name('physical-planning.fileExport');
    Route::post('physical-planning-file-import', 'PhysicalPlanningController@fileImport')->name('physical-planning.fileImport');
    Route::get('get-all-planning', 'PhysicalPlanningController@getAllPhysicalPlanning')->name('physical-planning.getAllPhysicalPlanning');
    Route::get('getAllPlanningData', 'PhysicalPlanningController@getAllPhysicalPlanningData')->name('physical-planning.getAllPhysicalPlanningData');

    Route::resource('lands', 'LandController');
    Route::get('lands-file-export', 'LandController@fileExport')->name('lands.fileExport');
    Route::post('lands-file-import', 'LandController@fileImport')->name('lands.fileImport');   
    Route::get('get-all-lands', 'LandController@getAllLands')->name('lands.getAllLands');
    Route::get('getAllLandsData', 'LandController@getAllLandsData')->name('lands.getAllLandsData');     

    Route::resource('livesearchs', 'LiveSearchController');
    Route::get('/livesearch/search', 'LiveSearchController@search')->name('livesearchs.search');
});
