<?php


// home page routes
Route::get('/', 'PagesController@index');

//auth routs
Auth::routes();


//admin routs
Route::get('/admin', 'AdminController@index');
Route::get('/admin/add', 'AdminController@create');
Route::post('/admin/add', 'AdminController@store');

Route::get('/admin/campers', 'AdminController@showView'); //show all campers vies
Route::get('/admin/campers/data', 'AdminController@show'); //make all campers data table calls

Route::get('/admin/parish/data', 'AdminController@showParish'); //show all parishes
Route::get('/adimin/parish/show', 'AdminController@showParishView');//make parish data table calls

Route::get('/admin/password', 'AdminPasswordController@create');
// Route::post('/admin/password/{id}', 'AdminPasswordController@update');
Route::post('/admin/password', 'AdminPasswordController@update');

// admin super routes
Route::get('/adminSuper', 'AdminSuperController@index');
Route::get('/adminSuper/createArea', 'AdminSuperController@createArea'); //show form for area adding
Route::post('/adminSuper/createArea/save', 'AdminSuperController@storeArea'); //add area 

//parish controller group
Route::get('/adminSuper/area/parish', 'ParishController@create'); //add area admin
Route::post('/adminSuper/area/parish/save', 'ParishController@save'); //add area admin

Route::get('/adminSuper/area/admin', 'AdminSuperController@createAreaAdmin'); //add area admin
Route::post('/adminSuper/area/admin/save', 'AdminSuperController@storeAreaAdmin'); //post area admin


Route::get('/adminSuper/camper', 'AdminSuperController@createCamper'); //show add camper form
Route::post('/adminSuper/area', 'AdminSuperController@storeCamper'); //save camper

Route::get('/adminSuper/area/all', 'AdminSuperController@areaShow'); //show all area
Route::get('/adminSuper/area/all/data', 'AdminSuperController@areaShowData'); //show all area

Route::get('/adminSuper/camper/all/data', 'AdminSuperController@showCampersData'); //show all campers data
Route::get('/adminSuper/camper/all', 'AdminSuperController@showCampers'); //show all campers view


Route::get('/adminSuper/parish/all', 'AdminSuperController@parishShow'); //show all parish
Route::get('/adminSuper/parish/all/data', 'AdminSuperController@parishShowData'); //show all parish data

// portal rout groups
Route::get('/home/portal', 'AdminSuperController@portal'); //open and close portal
Route::post('/home/portal/open', 'AdminSuperController@portalOpen'); //open and close portal


//dashboard routs
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/datatable/test','AdminController@getIndex');
Route::get('/datatable/test/show','AdminController@anyData')->name('datatables.data');