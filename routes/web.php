<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth', 'owner']], function () {

	Route::get('owner/ownerpanel', 'Owner\OwnerController@getPanel');
	Route::get('owner/loginas/{userId}', 'Owner\OwnerController@loginAsOtherUser');

	Route::get('owner/userslist', [
        'uses' => 'Owner\OwnerController@getUsersList'
    ]);

    Route::post('owner/userslist', [
        'uses' => 'Owner\OwnerController@addNewUser'
    ]);

    Route::put('owner/userslist', [
        'uses' => 'Owner\OwnerController@editUser'
    ]);

    Route::delete('owner/userslist', [
        'uses' => 'Owner\OwnerController@deleteUser'
    ]);
});

Route::group(['middleware' => ['auth', 'admin']], function () {

	Route::get('admin/adminpanel', 'Admin\AdminController@getPanel');
	Route::get('admin/loginas/{userId}', 'Admin\AdminController@loginAsOtherUser');

    // Użytkownicy
	Route::get('admin/userslist', [
        'uses' => 'Admin\AdminController@getUsersList'
    ]);

    Route::post('admin/userslist', [
        'uses' => 'Admin\AdminController@addNewUser'
    ]);

    Route::put('admin/userslist', [
        'uses' => 'Admin\AdminController@editUser'
    ]);

    Route::delete('admin/userslist', [
        'uses' => 'Admin\AdminController@deleteUser'
    ]);



    // Politycy
    Route::get('admin/politicianslist', [
        'uses' => 'Admin\AdminControllerPoliticians@getPoliticiansList'
    ]);

    Route::post('admin/politicianslist', [
        'uses' => 'Admin\AdminControllerPoliticians@addNewPolitician'
    ]);

    Route::put('admin/politicianslist', [
        'uses' => 'Admin\AdminControllerPoliticians@editPolitician'
    ]);

    Route::delete('admin/politicianslist', [
        'uses' => 'Admin\AdminControllerPoliticians@deletePolitician'
    ]);


    // Partie
    Route::get('admin/partieslist', [
        'uses' => 'Admin\AdminControllerParties@getPartiesList'
    ]);

    Route::post('admin/partieslist', [
        'uses' => 'Admin\AdminControllerParties@addNewPartie'
    ]);

    Route::put('admin/partieslist', [
        'uses' => 'Admin\AdminControllerParties@editPartie'
    ]);

    Route::delete('admin/partieslist', [
        'uses' => 'Admin\AdminControllerParties@deletePartie'
    ]);


    // Politycy do Partii
    Route::get('admin/politicianstopartieslist', [
        'uses' => 'Admin\AdminControllerPoliticiansToParties@getPoliticiansToPartiesList'
    ]);

    Route::post('admin/politicianstopartieslist', [
        'uses' => 'Admin\AdminControllerPoliticiansToParties@addNewPoliticianToPartie'
    ]);

    Route::put('admin/politicianstopartieslist', [
        'uses' => 'Admin\AdminControllerPoliticiansToParties@editPoliticianToPartie'
    ]);

    Route::delete('admin/politicianstopartieslist', [
        'uses' => 'Admin\AdminControllerPoliticiansToParties@deletePoliticianToPartie'
    ]);
    

    // Kadencje rządu
    Route::get('admin/governmentcadenceslist', [
        'uses' => 'Admin\AdminControllerGovernmentCadences@getGovernmentCadencesList'
    ]);

    Route::post('admin/governmentcadenceslist', [
        'uses' => 'Admin\AdminControllerGovernmentCadences@addNewGovernmentCadence'
    ]);

    Route::put('admin/governmentcadenceslist', [
        'uses' => 'Admin\AdminControllerGovernmentCadences@editGovernmentCadence'
    ]);

    Route::delete('admin/governmentcadenceslist', [
        'uses' => 'Admin\AdminControllerGovernmentCadences@deleteGovernmentCadence'
    ]);


    // Politycy w rządzie
    Route::get('admin/governmentcadencestopoliticianslist', [
        'uses' => 'Admin\AdminControllerGovernmentCadencesToPoliticians@getGovernmentCadencesToPoliticiansList'
    ]);

    Route::post('admin/governmentcadencestopoliticianslist', [
        'uses' => 'Admin\AdminControllerGovernmentCadencesToPoliticians@addNewGovernmentCadenceToPolitician'
    ]);

    Route::put('admin/governmentcadencestopoliticianslist', [
        'uses' => 'Admin\AdminControllerGovernmentCadencesToPoliticians@editGovernmentCadenceToPolitician'
    ]);

    Route::delete('admin/governmentcadencestopoliticianslist', [
        'uses' => 'Admin\AdminControllerGovernmentCadencesToPoliticians@deleteGovernmentCadenceToPolitician'
    ]);


    // Ustawy rządowe
    Route::get('admin/governmentactslist', [
        'uses' => 'Admin\AdminControllerGovernmentActs@getGovernmentActsList'
    ]);

    Route::post('admin/governmentactslist', [
        'uses' => 'Admin\AdminControllerGovernmentActs@addNewGovernmentAct'
    ]);

    Route::put('admin/governmentactslist', [
        'uses' => 'Admin\AdminControllerGovernmentActs@editGovernmentAct'
    ]);

    Route::delete('admin/governmentactslist', [
        'uses' => 'Admin\AdminControllerGovernmentActs@deleteGovernmentAct'
    ]);


    // Kategorie ocent
    Route::get('admin/assessmentcategorieslist', [
        'uses' => 'Admin\AdminControllerAssessmentCategories@getAssessmentCategoriesList'
    ]);

    Route::post('admin/assessmentcategorieslist', [
        'uses' => 'Admin\AdminControllerAssessmentCategories@addNewAssessmentCategorie'
    ]);

    Route::put('admin/assessmentcategorieslist', [
        'uses' => 'Admin\AdminControllerAssessmentCategories@editAssessmentCategorie'
    ]);

    Route::delete('admin/assessmentcategorieslist', [
        'uses' => 'Admin\AdminControllerAssessmentCategories@deleteAssessmentCategorie'
    ]);


    // Typy głosowania
    Route::get('admin/typesofvotinglist', [
        'uses' => 'Admin\AdminControllerTypesOfVoting@getTypesOfVotingList'
    ]);

    Route::post('admin/typesofvotinglist', [
        'uses' => 'Admin\AdminControllerTypesOfVoting@addNewTypeOfVoting'
    ]);

    Route::put('admin/typesofvotinglist', [
        'uses' => 'Admin\AdminControllerTypesOfVoting@editTypeOfVoting'
    ]);

    Route::delete('admin/typesofvotinglist', [
        'uses' => 'Admin\AdminControllerTypesOfVoting@deleteTypeOfVoting'
    ]);


    // Funkcje partii
    Route::get('admin/partyfunctions', [
        'uses' => 'Admin\AdminControllerPartyFunctions@getPartyFunctionsList'
    ]);

    Route::post('admin/partyfunctions', [
        'uses' => 'Admin\AdminControllerPartyFunctions@addNewPartyFunction'
    ]);

    Route::put('admin/partyfunctions', [
        'uses' => 'Admin\AdminControllerPartyFunctions@editPartyFunction'
    ]);

    Route::delete('admin/partyfunctions', [
        'uses' => 'Admin\AdminControllerPartyFunctions@deletePartyFunction'
    ]);

});
