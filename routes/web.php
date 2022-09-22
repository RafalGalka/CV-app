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
        ->name('home.mainPageP');

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
            ->name('userProtocol.formP');
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
            ->name('protocolFPPOBp');

        Route::get('FPZS', 'PZSController@newPZS')
            ->name('protocolFPZS');

        Route::post('FPZS', 'PZSController@newZS')
            ->name('protocolFPZSp');

        Route::get('FPODB', 'PODBController@newPODB')
            ->name('protocolFPODB');

        Route::post('FPODB', 'PODBController@newOD')
            ->name('protocolFPODBp');

        Route::get('other', 'OtherController@newOther')
            ->name('protocolOther')
            ->middleware('authClient');

        Route::post('other', 'OtherController@newOtherSave')
            ->name('protocolOtherp');

        Route::post('newNumber', 'NewNumberController@newSave')
            ->name('newNumber');
    });

    // PRÓBKI POBRANE F-PPOB
    Route::group([
        'prefix' => 'samples',
        'namespace' => 'Sample',
        'as' => 'samples.'
    ], function () {
        Route::get('add', 'SamplesController@add')
            ->name('add');

        Route::delete('delete/{id}', 'SamplesController@delete')
            ->name('delete');

        Route::get('list/{protocol}', 'SamplesController@list')
            ->name('list');

        Route::post('save', 'SamplesController@save')
            ->name('save');
    });

    // PRÓBKI ODEBRANE OD ZLECENIODAWCY F-OD
    Route::group([
        'prefix' => 'sample',
        'namespace' => 'Sample',
        'as' => 'sample.'
    ], function () {
        Route::get('add', 'TakeSamplesController@add')
            ->name('add');

        Route::delete('delete/{id}', 'TakeSamplesController@delete')
            ->name('delete');

        Route::get('list/{protocol}', 'TakeSamplesController@list')
            ->name('list');

        Route::post('save', 'TakeSamplesController@save')
            ->name('save');
    });

    // TABLE
    Route::group([
        'prefix' => 'tables',
        'namespace' => 'Table',
        'as' => 'tables.',
        'middleware' => 'authClient'
    ], function () {
        Route::get('', 'AllTableController@tableList')
            ->name('table');

        Route::get('client', 'AllTableController@clientList')
            ->name('client');

        Route::get('client/add', 'AllTableController@clientAdd')
            ->name('clientAdd');

        Route::post('client/add', 'AllTableController@clientSave')
            ->name('clientAddp');

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
            ->name('investAddp');

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
            ->name('recipeAddp');

        Route::get('rec/{recipeID?}/edit', 'RecipeController@recipeEdit')
            ->name('recipeEdit');

        Route::post('rec/{recipeID?}/update', 'RecipeController@recipeUpdate')
            ->name('recipeUpdate');
    });

    //LIST
    Route::group([
        'prefix' => 'lists',
        'namespace' => 'List',
        'as' => 'lists.'
    ], function () {
        Route::get('myList', 'ListController@myList')
            ->name('myList');

        Route::get('POB/{pobID}', 'ListController@POBShow')
            ->name('POBShow');

        Route::get('POB/{pobID}/edit', 'ListController@POBEdit')
            ->name('POBEdit');

        Route::post('POB/{pobID}/update', 'ListController@POBUpdate')
            ->name('POBUpdate');

        Route::get('POBList', 'ListController@POBList')
            ->name('POBList');

        Route::get('ODBList', 'ListController@ODBList')
            ->name('ODBList');

        Route::get('ODB/{odbID}', 'ListController@ODBShow')
            ->name('ODBShow');

        Route::get('ODB/{pobID}/edit', 'ListController@ODBEdit')
            ->name('ODBEdit');

        Route::get('ZSList', 'ListController@ZSList')
            ->name('ZSList');

        Route::get('ZS/{zsID}', 'ListController@ZSShow')
            ->name('ZSShow');

        Route::get('OtList', 'ListController@OtList')
            ->name('OtList');

        Route::get('Ot/{otID}', 'ListController@OtShow')
            ->name('OtShow');

        Route::get('Ot/{otID}/edit', 'ListController@OtEdit')
            ->name('OtEdit');

        Route::post('Ot/{otID}/update', 'ListController@OtUpdate')
            ->name('OtUpdate');
    });
});

Auth::routes();

// usunięcie rejestracji
//Auth::routes(['register' => false]);
