<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TechnologyController;
use App\Models\technology;
use App\Http\Controllers\TypeTechnologiesController;
use App\Models\typeTechnologies;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Portfolio/Accueil', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('accueil');

Route::get('/competences', function () {
    return Inertia::render('Portfolio/Competences', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,

        'masteredTypes' => typeTechnologies::join('technologies', 'type_technologies.id', '=', 'technologies.type_id')
        ->select('type_technologies.name as typeName', 'type_technologies.id as typeId')
        ->where('technologies.visible', true)
        ->where('technologies.level', '>', 50)
        ->distinct()->get(),

        'masteredTechno' => technology::join('type_technologies', 'technologies.type_id', '=', 'type_technologies.id')
        ->select('technologies.name', 'level', 'fontAwesomeClass', 'visible', 'type_id')
        ->where('technologies.visible', true)
        ->where('technologies.level', '>', 50)
        ->get(),

        'notMasteredTypes' => typeTechnologies::join('technologies', 'type_technologies.id', '=', 'technologies.type_id')
        ->select('type_technologies.name as typeName', 'type_technologies.id as typeId')
        ->where('technologies.visible', true)
        ->where('technologies.level', '<', 50)
        ->distinct()->get(),

        'notMasteredTechno' => technology::join('type_technologies', 'technologies.type_id', '=', 'type_technologies.id')
        ->select('technologies.name', 'level', 'fontAwesomeClass', 'visible', 'type_id')
        ->where('technologies.visible', true)
        ->where('technologies.level', '<', 50)
        ->get(),
    ]);
})->name('competences');

Route::get('/projets', [ProjectController::class, 'index'])->name('portfolio');

Route::get('/veille-technologique', function () {
    return Inertia::render('Portfolio/VeilleTechnologique', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('veille-technologique');

Route::get('/contact', function () {
    return Inertia::render('Portfolio/Contact', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('contact');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/technologies', [TypeTechnologiesController::class, 'index'])->name('admin.technologies');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/portfolio', function () {
    return Inertia::render('PortfolioAdmin', [
        '_token' => csrf_token(),
    ]);
})->name('admin.portfolio');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/articles', function () {
    return Inertia::render('ArticlesAdmin');
})->name('admin.articles');

/**
 * Technologies
 */
 Route::post('/create-type-technologies', [TypeTechnologiesController::class, 'store']);
 Route::post('/delete-type-technologies', [TypeTechnologiesController::class, 'delete']);
 Route::post('/update-type-technologies', [TypeTechnologiesController::class, 'update']);
 Route::post('/create-technology', [TechnologyController::class, 'store']);
 Route::post('/update-technology', [TechnologyController::class, 'update']);
 Route::post('/delete-technology', [TechnologyController::class, 'delete']);

 /**
  * Portfolio
  */
Route::post('/upload-image', [ProjectController::class, 'uploadImage']);
Route::post('/create-project', [ProjectController::class, 'store']);
Route::get('/projets/{id}', [ProjectController::class, 'indexProject'])->name('portfolio.projet');

/**
 * Contact
 */
Route::post('/take-contact', [ContactController::class, 'takeContact']);

/**
 * Autres
 */
Route::get('/mentions-legales', function(){
    return Inertia::render('Portfolio/MentionsLegales');
})->name('mentions-legales');

Route::get('/cgu', function(){
    return Inertia::render('Portfolio/CGU');
})->name('cgu');

/**
 * Test
 */

Route::get('/test', function(){
    return view('emails.contact');
});