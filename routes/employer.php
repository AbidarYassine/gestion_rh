<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/LoginEmployer', function () {
    return view('espaceEmployer.view.login');
})->name('espace.login');
Route::POST('/espaceEmployer/login', 'EspaceContrller@store')->name('espaceEmployer.store');
Route::GET('/espaceEmployer/index', 'EspaceContrller@index')->name('espaceEmployer.index');
Route::resource('/employer/conget', 'CongetController');
Route::POST('/Employer/logout', 'EspaceContrller@logout')->name('espaceemployer.logout');
Route::resource('/employer/contact', 'ContactController');
Route::get('/conget/traiter/', 'CongetController@EmpcongetTraiter')->name('congetTraiter.index');
Route::POST('/Employer/demandeFichePaie', 'EspaceContrller@demandeFichePaie')->name('employer.demandePaie');
