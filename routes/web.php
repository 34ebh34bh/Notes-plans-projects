<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SkillController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index',[ProjController::class,'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/project/page',[ProjController::class,'ProjPage'])->name('ProjPage')->middleware('auth');
Route::get('/project/create',[ProjController::class,'ProjCreate'])->name('ProjCreate')->middleware('auth');

Route::post('/project/create',[ProjController::class,'ProjStore'])->name('Projstore')->middleware('auth');
Route::get('/project/show/{Project}',[ProjController::class,'ProjShow'])->name('ProjShow')->middleware('auth');

Route::get('/project/update/{Project}',[ProjController::class,'ProjUpdate'])->name('ProjUpdate')->middleware('auth');
Route::patch('/project/edit/{Project}',[ProjController::class,'ProjEdit'])->name('ProjEdit')->middleware('auth');

Route::delete('/project/delete/{Project}',[ProjController::class,'ProjDelete'])->name('ProjDelete')->middleware('auth');


Route::get('/plan/index',[PlanController::class,'PlanIndex'])->name('PlanIndex')->middleware('auth');

Route::get('/plan/create',[planController::class,'PlanCreatePage'])->name('PlanCreatePage')->middleware('auth');
Route::post('/plan/create',[planController::class,'planStore'])->name('planstore')->middleware('auth');

Route::get('/plan/show/{Task}',[PlanController::class,'PlanShow'])->name('PlanShow')->middleware('auth');

Route::get('/plan/edit/{Task}',[PlanController::class,'Planedit'])->name('Planedit')->middleware('auth');
Route::patch('/plan/update/{Task}',[PlanController::class,'PlanUpdate'])->name('PlanUpdate')->middleware('auth');

Route::delete('/plan/delete/{Task}',[PlanController::class,'PlanDelete'])->name('PlanDelete')->middleware('auth');


Route::get('/skill/index',[SkillController::class,'index'])->name('SkillIndex')->middleware('auth');

Route::get('/skill/create',[SkillController::class,'SkillCreate'])->name('SkillCreate')->middleware('auth');
Route::post('/skill/create',[SkillController::class,'SkillStore'])->name('SkillStore')->middleware('auth');

Route::get('/skill/show/{Skill}',[SkillController::class,'SkillShow'])->name('SkillShow')->middleware('auth');

Route::get('/skill/edit/{Skill}',[SkillController::class,'SkillEdit'])->name('SkillEdit')->middleware('auth');
Route::patch('/skill/update/{Skill}',[SkillController::class,'Skillupdate'])->name('Skillupdate')->middleware('auth');

Route::delete('/skill/delete/{Skill}',[SkillController::class,'SkillDelete'])->name('SkillDelete')->middleware('auth');



Route::get('/register/page',[AuthController::class,'RegisterPage'])->name('RegisterPage')->middleware('guest');
Route::post('/register/page',[AuthController::class,'RegisterPost'])->name('RegisterPost')->middleware('guest');
Route::get('/login',[AuthController::class,'loginPage'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class,'loginPost'])->name('login')->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');

Route::get('/profile/{user}',[AuthController::class,'profilePage'])->name('profile')->middleware('auth');
