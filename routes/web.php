<?php

use App\Exports\SurveyExport;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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
//['verify' => true, 'register' => false]
Auth::routes();
Route::get('/', function () {
    return redirect('login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('questionnaires','QuestionnaireController');
Route::get('questionnaires/{questionnaire}/questions/create','QuestionController@create');
Route::post('questionnaires/{questionnaire}/questions','QuestionController@store');
Route::get('questionnaires/{questionnaire}/questions/{question}/edit','QuestionController@edit');
Route::put('questionnaires/{questionnaire}/questions/{question}','QuestionController@update');

Route::get('surveys/{questionnaire}-{slug}', 'SurveyController@show');
Route::get('surveys', 'SurveyController@index');
Route::post('surveys/{questionnaire}-{slug}', 'SurveyController@store');
Route::get('surveys/download', 'SurveyController@download');
Route::get('downloadSurveyFile', 'SurveyController@downloadExcel');
