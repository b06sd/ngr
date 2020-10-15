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
    Route::get('/getById/{details}', 'PhysicalPlanningController@getPhysicalPlanningById')->name('physical-planning.getPhysicalPlanningById');
    Route::get('physicalPlanning/{id}/edit/','PhysicalPlanningController@edit');
    Route::get('physicalPlanning/detail/{id}', 'PhysicalPlanningController@show')->name('physicalplanning.detail');

    Route::resource('lands', 'LandController');
    Route::get('lands-file-export', 'LandController@fileExport')->name('lands.fileExport');
    Route::post('lands-file-import', 'LandController@fileImport')->name('lands.fileImport');
    Route::get('get-all-lands', 'LandController@getAllLands')->name('lands.getAllLands');
    Route::get('getAllLandsData', 'LandController@getAllLandsData')->name('lands.getAllLandsData');
    Route::get('land/{id}/edit/', 'LandController@edit');
    Route::get('lands/detail/{id}', 'LandController@show')->name('lands.detail');

    Route::resource('horcs', 'HorcController');
    Route::post('horc-file-import', 'HorcController@fileImport')->name('horc.fileImport');
    Route::get('horc-file-export', 'HorcController@fileExport')->name('horc.fileExport');
    Route::get('get-all-horc', 'HorcController@getAllHorcs')->name('horcs.getAllHorcs');
    Route::get('getAllHorcsData', 'HorcController@getAllHorcsData')->name('horcs.getAllHorcsData');
    Route::get('horcs/detail/{id}', 'HorcController@show')->name('horcs.detail');

    Route::resource('livesearchs', 'LiveSearchController');
    Route::get('/livesearch/search', 'LiveSearchController@search')->name('livesearchs.search');
});
