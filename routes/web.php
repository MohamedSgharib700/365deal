<?php
use Stichoza\GoogleTranslate\TranslateClient;

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
if (in_array(Request::segment(1), Config::get('app.alt_langs')))
{
    App::setLocale(Request::segment(1));
    Config::set('app.locale_prefix', Request::segment(1));
}

Route::group(['middleware'=>'Lang'],function (){
        Route::group(['prefix' => Config::get('app.locale_prefix')], function() {
           
        Route::group(['prefix' => 'offers'], function() {
            Route::get('getaddress', 'MagazinOfferController@getaddress');
            Route::get('filter', 'MagazinOfferController@filter');
            Route::GET('/', 'MagazinOfferController@index');
            Route::GET('create', 'MagazinOfferController@create');
            Route::POST('/', 'MagazinOfferController@store');
            Route::GET('{id}', 'MagazinOfferController@show');
            Route::GET('{id}/edit', 'MagazinOfferController@edit');
            Route::PUT('{id}', 'MagazinOfferController@update');
            Route::DELETE('{id}', 'MagazinOfferController@destroy');

        
        }); 


        Route::group(['prefix' => 'ServicesMain'], function() {
            Route::GET('/', 'ServicesMainController@index')->name('ServicesMain.index');
            Route::GET('create', 'ServicesMainController@create')->name('ServicesMain.create');
            Route::POST('/', 'ServicesMainController@store')->name('ServicesMain.store');
            Route::GET('{id}', 'ServicesMainController@show')->name('ServicesMain.show');
            Route::GET('{id}/edit', 'ServicesMainController@edit')->name('ServicesMain.edit');
            Route::PUT('{id}', 'ServicesMainController@update')->name('ServicesMain.update');
            Route::DELETE('{id}', 'ServicesMainController@destroy')->name('ServicesMain.destroy');
        }); 
    });
});
/*Route::get('/', function () {
   return view('welcome');

});*/


Route::get('/', function () {
    //return view('welcome');
$tr = new TranslateClient(); // Default is from 'auto' to 'en'
$tr->setUrlBase('http://translate.google.cn/translate_a/single');
echo $tr->setSource('en')->setTarget('ar')->translate('Goodbye');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





