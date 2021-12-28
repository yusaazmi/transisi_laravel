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
Route::middleware('role:admin')->group(function(){
    // companies
    Route::get('/admin/companies','CompanyController@index')->name('admin.company');
    Route::get('/admin/company/add','CompanyController@create')->name('company.add');
    Route::post('/admin/company/add','CompanyController@store');
    Route::get('/admin/company/delete/{id}','CompanyController@destroy');
    Route::get('/admin/company/edit/{id}','CompanyController@edit')->name('company.edit');
    Route::post('/admin/company/edit/{id}','CompanyController@update');
    // employees
    Route::get('/admin/employees','EmployeeController@index')->name('admin.employee');
    Route::get('/admin/employee/add','EmployeeController@create')->name('employee.add');
    Route::post('/admin/employee/add','EmployeeController@store');
    Route::get('/admin/employee/delete/{id}','EmployeeController@destroy');
    Route::get('/admin/employee/edit/{id}','EmployeeController@edit')->name('employee.edit');
    Route::post('/admin/employee/edit/{id}','EmployeeController@update');
});

