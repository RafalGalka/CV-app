<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

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
//Route::group(['middleware' => ['auth']], function() {
Route::middleware(['auth'])->group(function () {
    Route::get('/', 'Home\MainPage')
        ->name('home.mainPage');

    Route::put('/', 'Home\MainPage')
        ->name('home.mainPage');

    // USERS
    Route::get('users', 'UserController@list')
        ->name('get.users');

    Route::get('users/{userId}', 'UserController@show')
        ->name('get.user.show');
    //->middleware('can:admin-level');

    Route::get('users/{id}/address', 'User\ShowAddress')
        ->where(['id' => '[0-9]+'])
        ->name('get.users.address');

    // USER - ME
    Route::group([
        'prefix' => 'me',
        'namespace' => 'User',
        'as' => 'me.'
    ], function () {
        Route::get('profile', 'UserController@profile')
            ->name('profile');

        Route::get('edit', 'UserController@edit')
            ->name('edit');

        Route::post('update', 'UserController@update')
            ->name('update');

        // Lista protokołów usera, protokół, formularz edycji
        Route::get('protocol', 'UserProtocolController@list')
            ->name('userProtocol.list');

        Route::get('protocol/{id}', 'UserProtocolController@edit')
            ->name('userProtocol.form');

        Route::put('protocol/{id}', 'UserProtocolController@update')
            ->name('userProtocol.form');
    });


    // PROTOKOŁY
    Route::group([
        'prefix' => 'protocols',
        'namespace' => 'Protocol',
        'as' => 'protocols.'
    ], function () {
        Route::get('FPPOB', 'PPOBController@newPPOB')
            ->name('protocolFPPOB');

        Route::post('FPPOB', 'PPOBController@newPOB')
            ->name('protocolFPPOB');

        Route::get('FPZS', 'PZSController@newPZS')
            ->name('protocolFPZS');

        Route::post('FPZS', 'PZSController@newZS')
            ->name('protocolFPZS');

        Route::get('FPODB', 'PODBController@newPODB')
            ->name('protocolFPODB');

        Route::post('FPODB', 'PODBController@newOD')
            ->name('protocolFPODB');

        Route::get('other', 'OtherController@newOther')
            ->name('protocolOther');

        Route::post('other', 'OtherController@newOtherSave')
            ->name('protocolOther');

        Route::post('newNumber', 'NewNumberController@newSave')
            ->name('newNumber');
    });

    // TABLE
    Route::group([
        'prefix' => 'tables',
        'namespace' => 'Table',
        'as' => 'tables.'
    ], function () {
        Route::get('', 'AllTableController@tableList')
            ->name('table');

        Route::get('client', 'AllTableController@clientList')
            ->name('client');

        Route::get('client/add', 'AllTableController@clientAdd')
            ->name('clientAdd');

        Route::post('client/add', 'AllTableController@clientSave')
            ->name('clientAdd');

        Route::get('client/{clientID}', 'AllTableController@clientShow')
            ->name('clientShow');

        Route::get('client/{clientID?}/edit', 'AllTableController@clientEdit')
            ->name('clientEdit');

        Route::post('client/{clientID?}/update', 'AllTableController@clientUpdate')
            ->name('clientUpdate');

        Route::get('invest', 'InvestTableController@investList')
            ->name('invest');

        Route::get('invest/add', 'InvestTableController@investAdd')
            ->name('investAdd');

        Route::post('invest/add', 'InvestTableController@investSave')
            ->name('investAdd');

        Route::get('invest/{investID?}', 'InvestController@investShow')
            ->name('investShow');

        Route::get('invest/{investID?}/edit', 'InvestController@investEdit')
            ->name('investEdit');

        Route::post('invest/{investID?}/update', 'InvestController@investUpdate')
            ->name('investUpdate');

        Route::get('testType', 'TestTableController@testList')
            ->name('testType');

        Route::get('strenghtClass', 'StrenghtClassController@classList')
            ->name('strenghtClass');

        Route::get('workType', 'WorkTableController@workList')
            ->name('workType');
    });

    // RECIPE
    Route::group([
        'prefix' => 'recipes',
        'namespace' => 'Recipe',
        'as' => 'recipes.'
    ], function () {
        Route::get('', 'RecipeController@recipeList')
            ->name('recipe');

        Route::get('rec/{recipeID?}', 'RecipeController@recipeShow')
            ->name('recipeShow');

        Route::get('add', 'RecipeController@recipeAdd')
            ->name('recipeAdd');

        Route::post('add', 'RecipeController@recipeSave')
            ->name('recipeAdd');

        Route::get('rec/{recipeID?}/edit', 'RecipeController@recipeEdit')
            ->name('recipeEdit');

        Route::post('rec/{recipeID?}/update', 'RecipeController@recipeUpdate')
            ->name('recipeUpdate');
    });
});

Auth::routes();

// usunięcie rejestracji
//Auth::routes(['register' => false]);
