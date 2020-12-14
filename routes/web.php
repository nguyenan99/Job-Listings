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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','Frontend\HomeController@index');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'HomeAdminController@index')->name('home')->middleware('checkAdmin');
});
Route::prefix('categories')->group(function () {
    Route::get("/", 'CategoryController@index')->name('categories.index')->middleware('checkAdmin');
    Route::get("/create", 'CategoryController@create')->name('categories.create')->middleware('checkAdmin');
    Route::post("/", 'CategoryController@store')->name('categories.store')->middleware('checkAdmin');
    Route::get("{id}/edit", 'CategoryController@edit')->name('categories.edit')->middleware('checkAdmin');
    Route::put("{id}", 'CategoryController@update')->name('categories.update')->middleware('checkAdmin');
    Route::get("/delete/{id}", 'CategoryController@destroy')->name('categories.destroy')->middleware('checkAdmin');
});
Route::prefix('companies')->group(function () {
    Route::get("/", 'CompanyController@index')->name('companies.index')->middleware('checkAdmin');
    Route::get("/create", 'CompanyController@create')->name('companies.create')->middleware('checkAdmin');
    Route::post("/", 'CompanyController@store')->name('companies.store')->middleware('checkAdmin');
    Route::get("{id}/edit", 'CompanyController@edit')->name('companies.edit')->middleware('checkAdmin');
    Route::put("{id}", 'CompanyController@update')->name('companies.update')->middleware('checkAdmin');
});
Route::prefix('locations')->group(function () {
    Route::get("/", 'LocationController@index')->name('locations.index')->middleware('checkAdmin');
    Route::get("/create", 'LocationController@create')->name('locations.create')->middleware('checkAdmin');
    Route::post("/", 'LocationController@store')->name('locations.store')->middleware('checkAdmin');
    Route::get("{id}/edit", 'LocationController@edit')->name('locations.edit')->middleware('checkAdmin');
    Route::put("{id}", 'LocationController@update')->name('locations.update')->middleware('checkAdmin');
});
Route::prefix('jobs')->group(function () {
    Route::get("/", 'JobController@index')->name('jobs.index')->middleware('checkAdmin');
    Route::get("/create", 'JobController@create')->name('jobs.create')->middleware('checkAdmin');
    Route::post("/", 'JobController@store')->name('jobs.store')->middleware('checkAdmin');
    Route::get("{id}/edit", 'JobController@edit')->name('jobs.edit')->middleware('checkAdmin');
    Route::put("{id}", 'JobController@update')->name('jobs.update')->middleware('checkAdmin');
});

// frontend
Route::group(['namespace' => 'Frontend'], function (){
    Route::get("/home",'HomeController@index')->name('get.home');
    Route::get("{id}/job-detail",'HomeController@getJobDetail')->name('get.job-detail');
    Route::get("/search-result",'SearchJobController@index')->name('get.search_job_result');
    Route::get('/create-job','HomeController@getCreateJob')->name('get.create_job');
    Route::get('/create-company','HomeController@getCreateCompany')->name('get.create_company');
    Route::get('/candidates','HomeController@getCandidates')->name('get.candidates');
    Route::post('/company','HomeController@storeCompany')->name('store.company');
    Route::post('/job','HomeController@storeJob')->name('store.job');
    Route::get('/list-job','HomeController@getListJob')->name('get.list_job');
    Route::get('/{id}/job','HomeController@getUpdateJob')->name('get.update.job');
    Route::get("{id}/delete-job",'HomeController@deleteJob')->name('delete.job');
    Route::get('{id}/editJob','HomeController@editJob')->name('edit.job');
    Route::put('{id}/updateJob','HomeController@updateJob')->name('update.job');
    Route::get('company-detail','Home2Controller@getCompany')->name('get.my_company');
    Route::get('{id}/editCompany','Home2Controller@editCompany')->name('get.edit_company');
    Route::put('{id}/update-company','Home2Controller@updateCompany')->name('update.company');
    Route::get('/job-applied','Home2Controller@getApplied')->name('get.applied');
});
Route::prefix('users')->group(function () {
    Route::get("/user-index",'UserController@index')->name('get.user.index')->middleware('checkAdmin');
    Route::get("/signup",'UserController@create')->name('get.signup');
    Route::post("/",'UserController@store')->name('store.user');
    Route::post('/login','UserController@postLogin')->name('post.login');
    Route::get('login','UserController@getLogin')->name('get.login');
    Route::get('logout','UserController@logout')->name('logout');
    Route::get('resume-detail','UserController@getResume')->name('get.resume');
    Route::get('profile','UserController@getProfile')->name('get.profile');
    Route::get('{id}/profile','UserController@getEdit')->name('get.edit_profile');
    Route::put('{id}/profile','UserController@updateUser')->name('update.user');
    Route::get('{id}/apply','UserController@apply')->name('apply');
    Route::get('{id}/get-resume','UserController@getResume')->name('get.resume');
    Route::get('{id}/remove-candidate/{job_id}','UserController@removeCandidate')->name('remove.candidate');
    Route::get('/search-candidate','Frontend\SearchJobController@searchCandidate')->name('search.candidate');
});

