<?php

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
/*
|--------------------------------------------------------------------------
| LANDING ROUTES
|--------------------------------------------------------------------------
*/
//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = \Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
Route::get('participation/{userid}/{adposteduser_id}/{adid}/{participation_id}','LandingController@participation')->name('particapte');
Route::get('/', 'LandingController@index')->name('main');
Route::post('save-contact','LandingController@savecontact')->name('save_contact');
Route::view('privacy-policy','privacy_policy')->name('privacy_policy');
/*
|--------------------------------------------------------------------------
| AJAX REQUEST FOR COUNTRY CITY STATE
|--------------------------------------------------------------------------
*/
	Route::get('get-state-by-countryid','LandingController@getstatebycountryid')->name('get_state');
	Route::get('get-city-by-stateid','LandingController@getcitybystateid')->name('get_city');


Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['verify' => true]);

Route::get('change-password','HomeController@change_password')->name('change_password');
Route::post('change-password','HomeController@change_passwordstore')->name('change_password');

/*|----------------------------------------------------------------------------------------------|
  |--------------------------------BUSINESS USER ROUTING-----------------------------------------|
  |----------------------------------------------------------------------------------------------|*/
Route::group(['prefix' => 'business','middleware'=> ['auth','verified','businessrole','agreeaccept']],function(){
  Route::post('business-detail','HomeController@businessstore')->name('business_detail')->withoutMiddleware ('agreeaccept');
  Route::namespace('Business')->group(function () {
	Route::resource('dashboard','BusinessController');
			Route::get('account-setting','BusinessController@account_setting')->name('account');
  	Route::resource('Ads','AdController');
  	Route::resource('leads','LeadController');
  	Route::get('send-payment-bfa','LeadController@sendpaymenttobfa')->name('sendpaymenttobfa');
  	Route::get('upload-Ads','AdController@uploadadindex')->name('upload_ad');
  	Route::get('ad-participants','AdController@ad_participants')->name('participants');
  	Route::get('get-format','AdController@get_format')->name('get-format');
  });
});

/*|----------------------------------------------------------------------------------------------|
  |----------------------------------MEDIA USER ROUTING------------------------------------------|
  |----------------------------------------------------------------------------------------------|*/
 Route::group(['prefix' => 'media','middleware'=> ['auth','verified','mediarole']],function(){
  Route::namespace('Media')->group(function () {
	Route::resource('media_dashboard','MediaController');
		Route::get('account-setting','MediaController@account_setting')->name('media_account');
	Route::resource('payment-detail','PaymentController');
	Route::resource('ad-detail','Adcontroller');
	Route::get('participated-ad','Adcontroller@participated_ad_index')->name('participated_ad');
	Route::resource('media_lead','LeadController');
	Route::get('with-draw-request','LeadController@withdrawrequest')->name('withdrawrequest');
		Route::get('payment-from-bfa','LeadController@paymentfrombfa')->name('paymentfrombfa');
	
	Route::get('download-media','Adcontroller@download_media')->name('download_media');
  });
});


/*|----------------------------------------------------------------------------------------------|
  |------------------------------------ADMIN ROUTING---------------------------------------------|
  |----------------------------------------------------------------------------------------------|*/
Route::namespace('Admin')->group(function () {
	Route::resource('admin-login','AdminController');
	Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
		Route::get('home','AdminController@home')->name('admin_home');
		Route::get('logout','AdminController@logout')->name('admin_logout');
		Route::get('change-password','AdminController@change_pass_admin')->name('change_pass_admin');
		Route::match(['PUT','PATCH'],'change-password','AdminController@update')->name('change_pass_admin_upd');
		Route::get('delete-user/{userid}','AdminController@del_user')->name('del_user');
		//contact us
		Route::get('contact-list','SettingController@contact_list')->name('contact_list');
		//country
		Route::get('country','SettingController@country')->name('country_index');
		Route::post('country-store','SettingController@country_store')->name('country_store');
		Route::get('country-edit/{id}','SettingController@country_edit')->name('country_edit');
		Route::post('country-update/{id}','SettingController@country_update')->name('country_update');
		Route::get('country-del/{id}','SettingController@country_del')->name('country_del');
		// country end
		//state 
		Route::get('state','SettingController@state')->name('state_index');
		Route::post('state-store','SettingController@state_store')->name('state_store');
		Route::get('state-edit/{id}','SettingController@state_edit')->name('state_edit');
		Route::post('state-update/{id}','SettingController@state_update')->name('state_update');
		Route::get('state-del/{id}','SettingController@state_del')->name('state_del');
		//state end
		//city
		Route::get('city','SettingController@city')->name('city_index');
		Route::post('city-store','SettingController@city_store')->name('city_store');
		Route::get('city-edit/{id}','SettingController@city_edit')->name('city_edit');
		Route::post('city-update/{id}','SettingController@city_update')->name('city_update');
		Route::get('city-del/{id}','SettingController@city_del')->name('city_del');
		//city end
		//mediatype
		Route::get('media-type','SettingController@mediatype')->name('mediatype_index');
		Route::post('media-type-store','SettingController@mediatype_store')->name('mediatype_store');
		Route::get('media-type-edit/{id}','SettingController@mediatype_edit')->name('mediatype_edit');
		Route::post('media-type-update/{id}','SettingController@mediatype_update')->name('mediatype_update');
		Route::get('media-type-del/{id}','SettingController@mediatype_del')->name('mediatype_del');
		//mediatype end
		//admin business user 
		Route::namespace('Business')->group(function () {
			Route::resource('business-partner','BusinessUserController');
			Route::resource('business-ads','BusinessadsController');
		});
		//admin media user
		Route::namespace('Media')->group(function () {
			Route::resource('media-partner','MediaUserController');
			Route::resource('ad-participants','Mediaadscontroller');
			Route::get('leads','Mediaadscontroller@participant_leads')->name('participant_leads');
			Route::get('pay-from-business','Mediaadscontroller@paymentfrombusiness')->name('paymentfrombusiness');
			Route::get('action-withdraw-request','Mediaadscontroller@actionwithdrawrequest')->name('actionwithdrawrequest');
			
		});
	});
});

