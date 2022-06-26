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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about', 'HomeController@about')->name('about');


Route::get('/ghome', 'GuestController@index')->name('ghome');
Route::get('/gcontact', 'GuestController@contact')->name('gcontact');
Route::get('/gabout', 'GuestController@about')->name('gabout');
Route::get('/gvacancy', 'GuestController@vacancy')->name('vacancy');
Route::get('/showvacancy', 'GuestController@showvacancy')->name('showvacancy');


//Route::get('/branches', 'BranchController@index')->name('branches.index');
//create
//Route::get('/branches', 'BranchController@create')->name('branches.create');
//store
//Route::post('/branches', 'BranchController@store')->name('branches.store');
//show
//Route::get('/branches/{branch}', 'BranchController@show')->name('branches.show');
//edit
//Route::get('/branches/{branch}/edit', 'BranchController@edit')->name('branches.edit');
//update
//Route::put('/branches/{branch}', 'BranchController@update')->name('branches.update');
//delete
//Route::delete('/branches/{branch}', 'BranchController@delete')->name('branches.delete');


Route::resource('users', 'UserController');
Route::resource('branches', 'BranchController');
Route::resource('recruiters', 'RecruiterController');
Route::resource('applicants', 'ApplicantController');
Route::resource('vacancies', 'VacancyController');
Route::resource('educations', 'EducationController');
Route::resource('experiences', 'ExperienceController');
Route::resource('applications', 'ApplicationController');
Route::resource('interviews', 'InterviewController');
Route::get('/applications/view/{id}', 'ApplicationController@view')->name('applications.view');
Route::get('/vacancies/search', 'VacancyController@search')->name('vacancies.search');
//Route::get('/sendSMS', 'NexmoSMSController@index');
Route::get('/send', 'ApplicationController@send')->name('applications.send');
