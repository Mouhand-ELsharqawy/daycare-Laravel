<?php

use App\Http\Controllers\ChildController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\ConsumableController;
use App\Http\Controllers\CurriculumoptionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FemaleParentController;
use App\Http\Controllers\MainOfficeController;
use App\Http\Controllers\MaleParentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SchoolTripController;
use App\Http\Controllers\ToyController;
use App\Http\Controllers\WaitingListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(ChildController::class)->group(function(){
    Route::get('/childs','index');
    Route::get('/childs/{id}','show');
    Route::post('/childs','store');
    Route::post('/childs/{id}','update');
    Route::delete('/childs/{id}','destroy');
});

Route::controller(ChildrenController::class)->group(function(){
    Route::get('/childrens','index');
    Route::get('/childrens/{id}','show');
    Route::post('/childrens','store');
    Route::post('/childrens/{id}','update');
    Route::delete('/childrens/{id}','destroy');
});

Route::controller(ConsumableController::class)->group(function(){
    Route::get('/consumables','index');
    Route::get('/consumables/{id}','show');
    Route::post('/consumables','store');
    Route::post('/consumables/{id}','update');
    Route::delete('/consumables/{id}','destroy');
});

Route::controller(CurriculumoptionController::class)->group(function(){
    Route::get('/curriculum/option','index');
    Route::get('/curriculum/option/{id}','show');
    Route::post('/curriculum/option','store');
    Route::post('/curriculum/option/{id}','update');
    Route::delete('/curriculum/option/{id}','destroy');
});

Route::controller(EmployeeController::class)->group(function(){
    Route::get('/employee','index');
    Route::get('/employee/{id}','show');
    Route::post('/employee','store');
    Route::post('/employee/{id}','update');
    Route::delete('/employee/{id}','destroy');
});

Route::controller(FemaleParentController::class)->group(function(){
    Route::get('/female/parent','index');
    Route::get('/female/parent/{id}','show');
    Route::post('/female/parent','store');
    Route::post('/female/parent/{id}','update');
    Route::delete('/female/parent/{id}','destroy');
});
Route::controller(MainOfficeController::class)->group(function(){
    Route::get('/main/office','index');
    Route::get('/main/office/{id}','show');
    Route::post('/main/office','store');
    Route::post('/main/office/{id}','update');
    Route::delete('/main/office/{id}','destroy');
});

Route::controller(MaleParentController::class)->group(function(){
    Route::get('/male/parent','index');
    Route::get('/male/parent/{id}','show');
    Route::post('/male/parent','store');
    Route::post('/male/parent/{id}','update');
    Route::delete('/male/parent/{id}','destroy');
});

Route::controller(ProgramController::class)->group(function(){
    Route::get('/program','index');
    Route::get('/program/{id}','show');
    Route::post('/program','store');
    Route::post('/program/{id}','update');
    Route::delete('/program/{id}','destroy');
});

Route::controller(SchoolTripController::class)->group(function(){
    Route::get('/schooltrip','index');
    Route::get('/schooltrip/{id}','show');
    Route::post('/schooltrip','store');
    Route::post('/schooltrip/{id}','update');
    Route::delete('/schooltrip/{id}','destroy');
});

Route::controller(ToyController::class)->group(function(){
    Route::get('/toys','index');
    Route::get('/toys/{id}','show');
    Route::post('/toys','store');
    Route::post('/toys/{id}','update');
    Route::delete('/toys/{id}','destroy');
});
Route::controller(WaitingListController::class)->group(function(){
    Route::get('/waitlist','index');
    Route::get('/waitlist/{id}','show');
    Route::post('/waitlist','store');
    Route::post('/waitlist/{id}','update');
    Route::delete('/waitlist/{id}','destroy');
});
