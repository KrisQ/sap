<?php
use Illuminate\Support\Facades\Auth;

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
    $user = Auth::user();
    return view('welcome', compact('user'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'Admin\AdminController@index')->name('admin');
Route::resource('/admin/users', 'Admin\AdminUserController');
Route::get('/users/ajax_user', 'Admin\AdminUserController@ajax_userTable');
Route::post('/users/ajax_store', 'Admin\AdminUserController@ajax_store');
Route::delete('/users/ajax_delete/{id}', 'Admin\AdminUserController@ajax_destroy');
Route::get('/users/ajax_edit/{id}', 'Admin\AdminUserController@ajax_edit');
Route::put('/users/ajax_update/{id}', 'Admin\AdminUserController@ajax_update');

Route::get('/questions', 'QuestionsController@index');
