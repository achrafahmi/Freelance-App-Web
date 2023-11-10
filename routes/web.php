<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Middleware\CheckRole;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/createmission', [App\Http\Controllers\HomeController::class, 'createmission'])->name('createmission');

Route::get('/addprofile', [App\Http\Controllers\HomeController::class, 'addprofile'])->name('addprofile');

Route::get('/acceil', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/myprofile', [App\Http\Controllers\FreelancerController::class, 'myprofile'])
        ->name('myprofile');

Route::match(['get', 'post'], '/project.create', [App\Http\Controllers\ProjetController::class, 'create'])->name('project.create');

Route::get('/learnmore', [App\Http\Controllers\HomeController::class, 'learnmore'])->name('learnmore');

Route::get('/projet/{projet}', [App\Http\Controllers\ProjetController::class, 'show'])->name('projet.show');

Route::post('/freelancer.create', [App\Http\Controllers\FreelancerController::class, 'create'])->name('freelancer.create');

Route::get('/annonces', [App\Http\Controllers\HomeController::class, 'annonces'])->name('annonces');

Route::get('/bestfreelancer',[App\Http\Controllers\HomeController::class, 'bestfreelancer'])->name('bestfreelancer');

Route::post('/rating.create', [App\Http\Controllers\RatingController::class, 'create'])->name('rating.create');

Route::post('password/change', [App\Http\Controllers\Auth\ResetPasswordController::class, 'changePassword'])->name('password.change');

Route::get('/allfreelancers',[App\Http\Controllers\HomeController::class, 'allfreelancers'])->name('allfreelancers');

Route::post('/freelancers.search',[App\Http\Controllers\FreelancerController::class, 'search'])->name('freelancers.search');

Route::post('/repport.create',[App\Http\Controllers\RepportController::class, 'create'])->name('repport.create');

Route::prefix('Admin')->middleware(['role.check'])->group(function () {
    
    Route::get('/admindashboard', [App\Http\Controllers\HomeController::class, 'admindashboard'])
        ->name('admindashboard');

    Route::get('/admin-projectsstats', [App\Http\Controllers\ProjetController::class, 'projectsstats'])
        ->name('admin-projectsstats');

    Route::get('/admin-projectsrepported', [App\Http\Controllers\ProjetController::class, 'projectsrepported'])
        ->name('admin-projectsrepported');

    Route::get('/admin-usersregistered', [App\Http\Controllers\HomeController::class, 'usersregistered'])
        ->name('admin-usersregistered');
    
    Route::match(['get' , 'post'],'/user.delete',[App\Http\Controllers\HomeController::class, 'deleteuser'] )
        ->name('user.delete');
    
    Route::match(['get' , 'post'],'/user.block',[App\Http\Controllers\HomeController::class, 'blockuser'] )
        ->name('user.block');

    Route::match(['get' , 'post'],'/projet.delete',[App\Http\Controllers\ProjetController::class, 'deleteprojet'] )
        ->name('projet.delete');

    });



Route::match(['get','post'], '/profil.edit' , [App\Http\Controllers\FreelancerController::class, 'editprofil'])
->name('profil.edit');

Route::match(['get' ,'post'], '/annonce.action',[App\Http\Controllers\ProjetController::class, 'annonceaction'])
->name('annonce.action');


Route::get('/courses', [App\Http\Controllers\HomeController::class, 'courses'])
        ->name('courses');

Route::post('/course.create', [App\Http\Controllers\CourseController::class, 'create'])
        ->name('course.create');

Route::post('/lesson.create', [App\Http\Controllers\LessonController::class, 'create'])
        ->name('lesson.create');

Route::get('/category.courses', [App\Http\Controllers\CourseController::class, 'categorycourses'])
        ->name('categorycourses');

Route::get('/course.lessons', [App\Http\Controllers\LessonController::class, 'courselessons'])
        ->name('courselessons');

Route::get('/course.search', [App\Http\Controllers\CourseController::class, 'searchcourse'])
        ->name('searchcourse');

Route::match(['get','post'],'/course', [App\Http\Controllers\CourseController::class, 'createcourserating'])
        ->name('createcourserating');

Route::match(['get','post'],'/usercourselessons', [App\Http\Controllers\LessonController::class, 'usercourselessons'])
        ->name('usercourselessons');

Route::post('/deletelesson', [App\Http\Controllers\LessonController::class, 'deleteLesson'])
        ->name('deletelesson');