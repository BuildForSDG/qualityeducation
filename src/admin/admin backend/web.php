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
Route::get('/',function(){
	return view('project.best');
});
//Route::get('/','project@proj');

Route::get('login','project@login');
Route::get('adminlogin','admin@login');
Route::get('signup','project@signup');
Route::get('register','admin@signup');
Route::get('/','project@index');
Route::get('/home','project@index');
Route::any('signin','project@signin');
Route::any('userlogin','project@userlogin');
Route::any('course','project@course');
Route::any('/addcourse','admin@courses');
Route::any('morecourses','project@morecourses');
Route::any('jobs','project@jobs');
Route::any('enrol','project@enrol');
Route::any('viewmore','admin@enrol');
Route::any('addjob','admin@addjob');
Route::any('jobss','admin@jobss');
Route::any('deletes','admin@deletes');
Route::any('admin','admin@admin');
Route::any('manage','admin@manage');
Route::any('adminregister','admin@adminregister');
Route::any('loginadmin','admin@adminlogin');
Route::any('admins','admin@index');
Route::any('add_chapter','admin@add_chapter');
Route::get('/getchapter','admin@data');
Route::get('/getchapters','project@datum');
Route::get('/managejob','admin@managejob');
Route::get('/index','admin@index');
Route::any('/logout','admin@logout');
Route::any('/deletecourse','admin@deletecourse');
Route::any('/deletechapter','admin@deletechapter');


