<?php

use Illuminate\Support\Facades\Route;

use App\Models\Repository;

use App\Http\Controllers\RepositoryController;

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
    return view('index');
})->name('home');

Route::get('/repos', [RepositoryController::class, 'updateRepos'])->name('update');

Route::get('/json', function () {
    $repositories = Repository::orderByDesc('stars')->limit(1000)->get();
    return Response::json($repositories);
})->name('json');