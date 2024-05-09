<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

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




##############################################################
######################## Breeze Routes #######################
##############################################################


require __DIR__.'/auth.php';


##############################################################
######################### App Routes #########################
##############################################################

// Main Controller
Route::controller(MainController::class)->name('main.')->group(function(){
    Route::get('/', 'home')->name('home');

    Route::get('/categories', 'category')->name('category');


    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact/store', 'store_contact')->name('store_contact');
});


Route::post('/subscrib/store', [SubscriberController::class, 'store'])->name('subscribe');


// User's Blog Route
Route::get('/my-blog', function(){
    $blog = Blog::find(10);

    // dd($blog);
    return view('main.pages.blog-details', compact('blog'));
})->name('my-blog')->middleware('auth');


Route::resource('blog', BlogController::class)->middleware('auth')->except('show');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{category_name}', [BlogController::class, 'category_blogs'])
    ->name('blog.category')->middleware('check.cate.name');


Route::resource('comment', CommentController::class)->middleware('auth')->only(['store','destroy']);



// Not Found Page
Route::fallback(function(){
    return view('main.pages.404');
})->name('404');

