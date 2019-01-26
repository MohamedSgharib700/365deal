<?php

use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Auth::routes('auth:api');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});
*/
if (in_array(Request::segment(2), Config::get('app.alt_langs')))
{
    App::setLocale(Request::segment(2));
    Config::set('app.locale_prefix', Request::segment(2));
}
Route::group(['middleware'=>'Lang'],function (){
    //-------------offer--------------------
    Route::group(['prefix' => Config::get('app.locale_prefix')], function() {

        Route::group(['prefix' => 'offer'], function () {
            Route::get('/', 'ApiOffer@index');
            Route::post('/', 'ApiOffer@store');
            Route::get('show/{id}', 'ApiOffer@show');
            Route::get('filter', 'ApiOffer@filter');
            Route::get('Dorating', 'ApiOffer@DoRatingOffer');
            Route::get('getaddress/{id}', 'ApiOffer@getaddress');
            Route::get('checkUserRate', 'ApiOffer@checkUserRate');
            Route::get('market/{id}', 'ApiOffer@market');
            Route::get('GetDatailesMarketUser/{id_market}/{id_black}', 'ApiOffer@GetDatailesMarketUser');
            Route::get('GetCat', 'ApiOffer@GetCat');
        });

        Route::group(['prefix' => 'Services'], function () {
            Route::get('/', 'ApiServices@index');
            Route::post('/', 'ApiServices@store');            
            Route::get('servicssub', 'ApiServices@servicssub');
            Route::get('show', 'ApiServices@show');
            Route::get('create', 'ApiServices@create');
            Route::get('Related', 'ApiServices@Related');
            Route::get('specialdetails', 'ApiServices@specialdetails');
            Route::get('RangPrice', 'ApiServices@RangPrice');
            Route::get('getaddress', 'ApiServices@getaddress');
            Route::get('Categories', 'ApiServices@Categories');
            Route::get('checkUserRate', 'ApiServices@checkUserRate');
            Route::get('Dorating', 'ApiServices@DoRatingApiServices');
        });
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ar/products', 'API\ArticleController@index');
Route::get('an/products', 'API\ArticleController@index');
Route::get('ar/product/{id}', 'API\ArticleController@show');
Route::get('an/product/{id}', 'API\ArticleController@show');
Route::post('ar/products', 'API\ArticleController@store');
Route::post('an/products', 'API\ArticleController@store');
Route::put('ar/product/{id}', 'API\ArticleController@update');
Route::put('an/product/{id}', 'API\ArticleController@update');

Route::delete('ar/product/{id}', 'API\ArticleController@delete');
Route::delete('an/product/{id}', 'API\ArticleController@delete');









