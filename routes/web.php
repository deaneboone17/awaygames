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

//Games Routes

//Route::get('/games', ['as'=>'games','uses'=> 'GamesController@index']);

//Route::get('/games/{game}', 'GamesController@show');


	
//Dashboard Routes

Route::get('/dashboard', ['uses'=>'DashboardsController@index'
	]);

Route::get('/dashboard/edit', 'DashboardsController@show');


//Teams Routes
Route::get('/teams', ['as'=>'teams','uses'=>'TeamsController@index']);

Route::get('/teams/{team}', 'TeamsController@show');


//Games Routes

Route::get('/games/{game}', ['as'=>'games','uses'=>'GamesController@show','middleware'=>'games']);



//Flights Routes
Route::get('/flights', ['as'=>'flights', 'uses'=>'FlightsController@index']);

Route::post('/flights', ['as'=>'flights', 'uses'=>'FlightsController@store']);

Route::get('/flights/{flight}',['as'=>'flights_show', 'uses'=> 'FlightsController@show', 'middleware'=>'flights']);

//Returns Routes
Route::get('/returns', ['as'=>'returns', 'uses'=>'ReturnsController@index']);

Route::get('/returns/{return}',['as'=>'returns_show', 'uses'=> 'ReturnsController@show', 'middleware'=>'returns']);


//Ticket Routes
Route::get('/tickets', 'TicketsController@index');

Route::get('/tickets/{ticket}', ['as'=>'tickets_show', 'uses'=> 'TicketsController@show', 'middleware'=>'tickets']);


//Hotel Routes
Route::get('/hotels', 'HotelsController@index');

Route::get('/hotels/{hotel}', ['as'=>'hotels_show', 'uses'=> 'HotelsController@show', 'middleware'=>'hotels']);



//Points of Interest Routes
Route::get('/pois', 'PoisController@index');

Route::get('/pois/{poi}', ['as'=>'pois_show', 'uses'=> 'PoisController@show', 'middleware'=>'pois']);


//Trips Routes
Route::get('/trips', 'TripsController@index');

Route::get('/trips/{trip}', ['as'=>'trip_show', 'uses'=> 'TripsController@show', 'middleware'=>'trips']);

Route::get('/trips/{trip}/save',['as'=>'trip_save', 'uses'=>'TripsController@saveTrip', 'middleware'=>'trips']);

Route::get('/trips/{trip}/edit', ['as'=>'trip_edit', 'uses'=> 'TripsController@edit', 'middleware'=>'trips']);

Route::get('/trips/{trip}/share', ['as'=>'trip_share','uses'=>'TripsController@share','middleware'=>'trips']);

Route::get('/trips/{trip}/delete', ['as'=>'trip_delete','uses'=>'TripsController@delete','middleware'=>'trips']);


//Contact Form Routes
//Route::get('/contact', ['as'=>'contact', 'uses'=>'ContactFormController@index']);

//Share Routes

Route::get('/dashboard/share', ['as'=>'share', 'uses'=> 'ShareController@show']);

//Route::get('/trips/{trip}/share', 'ShareController@show');

Route::post('/dashboard/share', ['as'=>'share', 'uses'=>'EmailController@store']);

//Admin Routes
Route::get('/admin', ['as'=>'admin', 
	'uses'=> 'AdminController@index',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);
	

Route::get('/admin/dash', ['as'=>'admin_dash', 
	'uses'=> 'AdminController@dash',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);

Route::get('/user/{user}/delete', ['as'=>'admin_delete', 
	'uses'=> 'AdminController@delete',
	'middleware'=>'roles',
	'roles'=>['SuperAdmin']
	]);

Route::get('/user/{user}/edit', ['as'=>'admin_edit', 
	'uses'=> 'AdminController@edit',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);
	
Route::get('/user/{user}/role', ['as'=>'admin_role', 
	'uses'=> 'AdminController@roleAssign',
	'middleware'=>'roles',
	'roles'=>['SuperAdmin']
	]);

Route::post('/user/{user}/role', ['as'=>'admin_role', 
	'uses'=> 'AdminController@role',
	'middleware'=>'roles',
	'roles'=>['SuperAdmin']
	]);

Route::post('/user/{user}/update', ['as'=>'admin_update', 
	'uses'=> 'AdminController@update',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);

Route::get('/user/create', ['as'=>'admin_create', 
	'uses'=> 'AdminController@create',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);
	
Route::post('/user', ['as'=>'admin_store', 
	'uses'=> 'AdminController@store',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);
	


//Preferences Routes

Route::get('/user/{user}/preferences', ['as'=>'preferences', 
	'uses'=> 'PreferencesController@edit'
	]);

Route::post('/user/{user}/preferences', ['as'=>'preferences', 
	'uses'=> 'PreferencesController@update'
	]);


//Header-Menu Routes
Route::get('/faq', 'FaqsController@index');

Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');

Route::get('/about', 'AboutController@index');

Route::get('/terms', 'AboutController@terms');

Route::get('/privacy', 'AboutController@privacy');

Route::get('/attributions', 'AboutController@attrib');
/*
Route::get('/admin', ['as'=>'admin', 
	'uses'=> 'AdminController@index',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);

Route::get('/admin/dash', ['as'=>'admin_dash', 
	'uses'=> 'AdminController@dash',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);

Route::get('/user/{user}/delete', ['as'=>'admin_delete', 
	'uses'=> 'AdminController@delete',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);

Route::get('/user/{user}/edit', ['as'=>'admin_edit', 
	'uses'=> 'AdminController@edit',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);

Route::post('/user/{user}/update', ['as'=>'admin_update', 
	'uses'=> 'AdminController@update',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);

Route::get('/user/create', ['as'=>'admin_create', 
	'uses'=> 'AdminController@create',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);

Route::post('/user', ['as'=>'admin_store', 
	'uses'=> 'AdminController@store',
	'middleware'=>'roles',
	'roles'=>['Admin','SuperAdmin']
	]);

*/




//Test Routes

Route::get('events', ['uses'=>'TestController@getYelp']);

Route::get('/schedule', 'SchedulesController@getSchedules');

Route::get('/', function () {
    return view('index');
});






Route::get('/select', function () {
    return view('select');
});




//Auth Routes

Auth::routes();

Route::get('Auth/login', ['as'=>'Auth/login', 'uses'=>'Auth\LoginController@showLoginForm']);
Route::post('Auth/login',['as'=>'Auth/login', 'uses'=>'Auth\LoginController@login']);
Route::get('Auth/logout',['as'=>'logout', 'uses'=>'Auth\LoginController@logout']);

// Registration routes...
Route::get('Auth/register', ['as'=>'Auth/register', 'uses'=>'Auth\RegisterController@showRegistrationForm']);
Route::post('Auth/register',['as'=>'Auth/register', 'uses'=>'Auth\RegisterController@register']);






Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
