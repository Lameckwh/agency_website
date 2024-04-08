<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FallbackController;

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

Route::resource('news', PostsController::class);
Route::get('news/{id}/edit', [PostsController::class, 'edit'])->name('news.edit');
Route::get('news/{id}/delete', [PostsController::class, 'destroy'])->name('news.delete');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PostsController::class, 'welcome'])->name('welcome');

Route::get('/dashboard', function () {
    $userType = auth()->user()->usertype;

    if ($userType == 'admin') {
        $posts = App\Models\Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    } else {
        return redirect()->route('news.index');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
Route::fallback(FallbackController::class);
Route::post('/upload', [PostsController::class, 'upload'])->name('ckeditor.upload');
