<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
})->name('loginForm');
Route::group(['prefix' => 'admin'], function () {
    ############## Route Dashbord ###############
    Route::get('/home', 'HomeController@index')->name('home');

    ################### Start Route Employer ################
    Route::resource('employer', 'EmployerController');
    Route::resource('presenceEmp', 'PresenceController');
    Route::POST('presenceEmp/pointerAll', 'PresenceController@saveAll')->name('presence.saveAll');
    Route::get('employer/suppprime/{id}', 'EmployerController@destroy')->name('employer.delete');
    Route::get('employer/suppression/{id}', 'EmployerController@forceDelete')->name('employer.forceDelete');
    Route::get('outil/salire', 'EmployerController@InfoCalculSalire')->name('admin.salire');
    Route::get('outil/ir', 'EmployerController@infoIr')->name('admin.ir');
    ############### End route Employer ############

    ############### Start route Presence ######################
    Route::get('/admin/presence/test', 'PresenceController@pointerEmployer')->name('presence.historique');
    Route::get('/admin/presence/delete', 'PresenceController@deletePresence')->name('presence.delete');
    Route::get('/admin/presence/employer', 'PresenceController@getEmployerPresence')->name('presence.employer');
    Route::get('/admin/presence/getPdf', 'PresenceController@getpdfF')->name('presence.pdf');
    Route::POST('/admin/presence/employer/{id}', 'PresenceController@savePresence')->name('presence.save');
    Route::PUT('/admin/presence/update', 'PresenceController@updatePresence')->name('presence.updateP');
    ################ End route Presence ################

    ############## Start route parametre && corbeille ##################
    Route::get('parametre/', 'ParametreController@index')->name('para.index');
    Route::get('paie-parametre/', 'ParametreController@paieParamettre')->name('para-paie.index');
    Route::post('paie-parametre/', 'ParametreController@storeParametre')->name('para-paie.store');
    Route::get('parametre/employer/{id}', 'ParametreController@restoref')->name('para.emp.restore');
    Route::get('restore/paie/{id}', 'ParametreController@restorePaie')->name('paie.restore');
    ##################### End route parametre && corbeille #############

    ############# Start route avance #################
    Route::resource('/avance', 'AvanceController');
    Route::get('/avanceEmp/index', 'AvanceController@index')->name('index.avance');
    Route::get('/avance/historique', 'AvanceController@historique')->name('avancee.historique');
    ################ End route avance ################

    ############### Start route Conget ############
    Route::resource('/conget', 'CongetController');
    Route::get('/conget/update/{id}', 'CongetController@updateStatus')->name('conget.updateStatus');
    Route::PUT('/conget/status/{id}', 'CongetController@destroyStatus')->name('conget.destroyStatus');
    ################# End route conget


    ######## Start route Contrat #############
    Route::get('contrat/index', 'ContratController@index')->name('contrat.index');
    Route::get('contrat/show/{id}', 'ContratController@show')->name('contrat.show');
    Route::get('contrat/imprimer/{id}', 'ContratController@imprimer')->name('contrat.imprimer');
//
    ######## End route Contrat   #############

    ############# Start Route site  demande  paie ##############
    Route::resource('/admin/paie/demandepaie', 'DemandePaieController');
    Route::GET('/admin/paie/demandepaie/{id_bulletin}/{id_demande}', 'DemandePaieController@envoyerLienPaie')->name('demandepaie.envoyerLienPaie');
    Route::GET('/admin/paie/deleteDemande/{id}', 'DemandePaieController@deleteDemande')->name('demandepaie.delete');
    Route::GET('/admin/EmployerEnConget/', 'CongetController@employerConget')->name('employerConget.index');
    ################## end Route site  demande  paie ##############


    ############# Start route Paie
    Route::group(['prefix' => 'paie'], function () {
        Route::get('show/', 'PaieController@show')->name('paie.show');
        Route::get('index/', 'PaieController@index')->name('paie.index');
        Route::get('create/', 'PaieController@create')->name('paie.create');
        Route::get('salireNet/', 'PaieController@getsalaireNet')->name('paie.salNet');
        Route::get('apercu/{id}', 'PaieController@apercu')->name('paie.apercu');
        Route::get('pdf', 'PaieController@getPdf')->name('paie.getpdf');
        Route::get('cherche', 'PaieController@cherchePaie')->name('paie.cherche');
        Route::get('edit/{id}', 'PaieController@edit')->name('paie.edit');
        Route::get('showPaie/{id}', 'PaieController@showPaie')->name('paie.showPaie');
        Route::get('destroy/{id}', 'PaieController@destroy')->name('paie.destroy');
        Route::PUT('update/{id}', 'PaieController@update')->name('paie.update');
        Route::get('/admin/paie/forcedelete/{id}', 'ParametreController@forceDeltePaie')->name('paie.forceDelete');
    });
    ################### End route Paie ################

});
################## start Route User #############
Auth::routes();
Route::group(['prefix' => 'user'], function () {
    Route::Post('/', 'UserController@store')->name('user.store');
    Route::GET('/profile/{id}', 'UserController@profile')->name('user.profile');
    Route::GeT('/parametre/{id}', 'UserController@parametreUser')->name('user.parametre');
    Route::PUT('/update', 'UserController@updateUser')->name('user.update');
    Route::PUT('/updateImage/', 'UserController@updateImage')->name('user.updateImage');
    Route::PUT('/modifier_motPasse/', 'UserController@updateMotPasse')->name('user.updatePassword');
});
############### End route User #####################


Route::get("/Registration", "HomeController@registration")->name('registration');
Route::resource('societe', 'SocieteController');


////////////////////////////////////////////////////////////////////////////

Route::get('statistique/', 'HomeController@statistique')->name('admin.statistique');
Route::get('employer/avance/suppprime/{id}', 'AvanceController@deleteAvance')->name('avance.delete');
Route::get('employer/avance/restore/{id}', 'AvanceController@restoreAvance')->name('para.avance.restore');
Route::get('/sendEmail', 'SendEmail@sendEmailForEmployer')->name('mail.sendEmail');































