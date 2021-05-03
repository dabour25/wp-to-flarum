<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/users-export', MainController::class.'@exportUsers');
Route::get('/users-import', MainController::class.'@importUsersView');
Route::post('/users-import', MainController::class.'@importUsers');

Route::get('/tags-export', MainController::class.'@exportTags');
Route::get('/tags-import', MainController::class.'@importTagsView');
Route::post('/tags-import', MainController::class.'@importTags');

Route::get('/discussions-export', MainController::class.'@exportDiscussions');
Route::get('/discussions-import', MainController::class.'@importDiscussionsView');
Route::post('/discussions-import', MainController::class.'@importDiscussions');

Route::get('/discussions-tags-export', MainController::class.'@exportDiscussionsTags');
Route::get('/discussions-tags-import', MainController::class.'@importDiscussionsTagsView');
Route::post('/discussions-tags-import', MainController::class.'@importDiscussionsTags');

Route::get('/posts-export', MainController::class.'@exportPostsTags');
Route::get('/posts-import', MainController::class.'@importPostsTagsView');
Route::post('/posts-import', MainController::class.'@importPostsTags');
