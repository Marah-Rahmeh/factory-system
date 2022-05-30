<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
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
    // return Client::find(6)->addresse()->get();
});

Route::get('/home', function () {
    //return view('index');
    return view('dashboard');
})->name('home');

// Route::get('chart-js', [ChartJSController::class, 'index']);
Route::get('dashboard', 'App\Http\Controllers\ChartJSController@index')->name('dashboard');

//Route::resource('clients', ClientController::class);

Auth::routes();

Route::get('/cards', function () {
    //return view('index');
    return view('cards');
})->name('cards');


// Route::controller(ClientController::class)->group(function () {
//     Route::get('/client', 'index');
//     Route::get('/clients/{id}', 'show');

// });

// Route::get('/client/index', function () {
//     return 'Hello';
// });

// Route::resource('clients','ClientController');

Route::get('clients', 'App\Http\Controllers\ClientController@index')->name('clients');
Route::post('add-clients', 'App\Http\Controllers\ClientController@store')->name('add-clients');
Route::get('clients/create', 'App\Http\Controllers\ClientController@create')->name('clients/create');
Route::get('client/{id}/edit','App\Http\Controllers\ClientController@edit')->name('<client><id>edit');
Route::get('client/{id}/show','App\Http\Controllers\ClientController@show')->name('<client><id>show');
Route::post('clients/{id}/update','App\Http\Controllers\ClientController@update')->name('<clients><id>update');
Route::get('clients/{id}/delete','App\Http\Controllers\ClientController@destroy')->name('<clients><id>delete');

Route::get('print','App\Http\Controllers\ReportController@show')->name('print');
Route::get('proposal-report','App\Http\Controllers\ReportController@proposal')->name('proposal-report');
Route::get('contracts-report','App\Http\Controllers\ReportController@contracts')->name('contracts-report');
Route::get('projects-report','App\Http\Controllers\ReportController@projects')->name('projects-report');
Route::get('print-report','App\Http\Controllers\ReportController@index')->name('print-report');

Route::get('rep','App\Http\Controllers\ReportController@contracts')->name('rep');
Route::get('/reports', function () {
    //return view('index');
    return view('reports.test');
})->name('reports');

Route::get('proposals', 'App\Http\Controllers\ProposalController@index')->name('proposals');
Route::post('add-proposals', 'App\Http\Controllers\ProposalController@store')->name('add-proposals');
Route::get('proposals/create', 'App\Http\Controllers\ProposalController@create')->name('proposals/create');
Route::get('proposal/{id}/add2', 'App\Http\Controllers\ProposalController@create2')->name('<proposal><id>add2');
Route::get('proposal/{id}/edit','App\Http\Controllers\ProposalController@edit')->name('<proposal><id>edit');
Route::post('update-proposal', 'App\Http\Controllers\ProposalController@update')->name('update-proposal');
Route::get('proposal/{id}/show','App\Http\Controllers\ProposalController@show')->name('<proposal><id>show');
Route::get('proposal/{id}/delete','App\Http\Controllers\ProposalController@destroy')->name('<proposal><id>delete');
Route::get('proposal/{id}/approve','App\Http\Controllers\ProposalController@approve')->name('<proposal><id>approve');
Route::get('proposal/{id}/test','App\Http\Controllers\ProposalController@test')->name('<proposal><id>test');
Route::get('proposal/{id}/print','App\Http\Controllers\ProposalController@print')->name('<proposal><id>print');

Route::get('contracts', 'App\Http\Controllers\ContractController@index')->name('contracts');
Route::post('add-contracts', 'App\Http\Controllers\ContractController@store')->name('add-contract');
Route::get('contract/{id}/add2', 'App\Http\Controllers\ContractController@create2')->name('<contract><id>add2');
Route::get('contract/create', 'App\Http\Controllers\ContractController@create')->name('contract/create');
Route::get('contract/{id}/show','App\Http\Controllers\ContractController@show')->name('<contract><id>show');
Route::get('contract/{id}/edit','App\Http\Controllers\ContractController@edit')->name('<contract><id>edit');
Route::post('contract/{id}/update','App\Http\Controllers\ContractController@update')->name('<contract><id>update');
Route::get('contract/{id}/delete','App\Http\Controllers\ContractController@destroy')->name('<contract><id>delete');
Route::get('contract/{id}/print','App\Http\Controllers\ContractController@print')->name('<contract><id>print');

Route::get('addresse/{id}/show','App\Http\Controllers\AddresseController@show')->name('<addresse><id>show');


Route::get('projects', 'App\Http\Controllers\ProjectController@index')->name('projects');
Route::post('add-projects', 'App\Http\Controllers\ProjectController@store')->name('add-project');
Route::get('projects/create', 'App\Http\Controllers\ProjectController@create')->name('projects/create');
Route::get('project/{id}/add2', 'App\Http\Controllers\ProjectController@create2')->name('<project><id>add2');
Route::get('projects/{id}/edit','App\Http\Controllers\ProjectController@edit')->name('<project><id>edit');
Route::get('projects/{id}/edit2','App\Http\Controllers\ProjectController@edit2')->name('<project><id>edit2');
Route::post('projects/{id}/update','App\Http\Controllers\ProjectController@update')->name('<project><id>update');
Route::get('projects/{id}/show','App\Http\Controllers\ProjectController@show')->name('<project><id>show');
Route::get('projects/{id}/delete','App\Http\Controllers\ProjectController@destroy')->name('<project><id>delete');

Route::post('add-task', 'App\Http\Controllers\TaskController@store')->name('add-task');
Route::get('task/{id}/add', 'App\Http\Controllers\TaskController@create')->name('<task><id>add');
Route::get('task/{id}/edit','App\Http\Controllers\TaskController@edit')->name('<task><id>edit');
Route::post('task/{id}/update','App\Http\Controllers\TaskController@update')->name('<task><id>update');
Route::get('task/{id}/show','App\Http\Controllers\TaskController@show')->name('<task><id>show');
Route::get('task/{id}/delete','App\Http\Controllers\TaskController@destroy')->name('<task><id>delete');

Route::get('employees', 'App\Http\Controllers\EmployeeController@index')->name('employees');
Route::post('add-employee', 'App\Http\Controllers\EmployeeController@store')->name('add-employee');
Route::get('employees/create', 'App\Http\Controllers\EmployeeController@create')->name('employees/create');
Route::get('employee/{id}/edit','App\Http\Controllers\EmployeeController@edit')->name('<employee><id>edit');
Route::get('employee/{id}/show','App\Http\Controllers\EmployeeController@show')->name('<employee><id>show');
Route::post('employee/{id}/update','App\Http\Controllers\EmployeeController@update')->name('<employees><id>update');
Route::get('employees/{id}/delete','App\Http\Controllers\EmployeeController@destroy')->name('<employees><id>delete');
