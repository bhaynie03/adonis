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

Route::get('/1', function () {
    return view('welcome');
});

Route::get('/', 'HomeController@welcome_page')->name('home');

Route::get('/about', 'HomeController@about');

Route::get('/reading', 'HomeController@reading');

Route::get('/cat3', 'HomeController@cat3');

Route::get('/indexer', 'HomeController@indexer');

Route::post('/indexer', 'HomeController@indexer_store');


Route::get('/charts', 'ChartsController@trialChart');


Route::get('/workouts', 'WorkoutController@selection');

Route::get('/workouts/{workout_name}', 'WorkoutController@show');

Route::get('/workoutSession/{workout_name}', 'WorkoutController@interface');

Route::post('/workoutSession/{workout_name}', 'WorkoutController@store');

Route::post('/workoutSession_end/{workout_name}', 'WorkoutController@update');


Route::get('/statistics', 'StatisticsController@index');

Route::get('/statistics/exercise/{exercise_name}', 'StatisticsController@exercises');

Route::get('/statistics/workout_history', 'StatisticsController@workout_history');

Route::get('/statistics/workout_review/{id}', 'StatisticsController@workout_review');

Route::get('/statistics/indexer', 'StatisticsController@indexer');

Route::get('/statistics/indexer/{id}', 'StatisticsController@indexer2');

Route::post('/statistics/transfer', 'StatisticsController@transfer');


Route::get('/register', 'RegistrationController@create');
           
Route::post('/register', 'RegistrationController@store');


Route::get('/login', 'SessionsController@create')->name('login');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');













