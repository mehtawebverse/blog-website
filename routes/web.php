<?php

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;


Route::controller(Controller::class)->group(function(){

    Route::get('aa','practice');
    Route::get('ab','pratwo');
});


Route::post('postingreply/{id}',[CommentController::class,'replyComment'])->name('routeToReply');
Route::delete('deleteComment/{id}',[CommentController::class,'deleteComment'])->name('routeToDeleteComment');

Route::controller(TagController::class)->group(function(){
Route::get('viewByTag/{Tag}','showBlogsByTag')->name('routeToViewByTag');
Route::get('pop','popTag')->name('routeToPopTags');
});

Route::controller(BlogController::class)->group(function () {
    Route::get('searching','search')->name('search');
    Route::get('/','trendingHome')->name('home');
    Route::get('home','trendingHome')->name('home2');
    Route::get('lb','latestBlogs')->name('routeToLatestBlogs');
    Route::get('cb/{id}','clickBlog')->name('routeToClickedBlog');
    Route::get('posts','stones')->name('poss');
});

Route::get('viewByCat/{cat}',[CategoryController::class,'showBlogsByCategory'])->name('routeToViewByCat');

Route::get('viewingFeeds',[Controller::class,'feedView'])->name('routeToViewFeeds');
Route::post('postingComment/{id}',[CommentController::class,'addComment'])->name('routeToComment');


Auth::routes();


Route::controller(BlogController::class)->middleware(['auth'])->group(function (){
    Route::delete('deletingBlog/{id}','deleteBlog')->name('routeToDeleteBlog');
});


Route::prefix('someUser')->middleware(['auth','alluser'])->group(function () {

Route::controller(TagController::class)->group(function () {
    Route::get('viewingTags','viewTag')->name('routeToViewTagPage');
    Route::post('addTags','storeTag')->name('routeToAddTag');
});

Route::controller(Controller::class)->group(function () {
Route::get('userStyle','userDashView')->name('dashUser');
Route::get('addBlog','addBlogView')->name('addBlogRoute');

});

Route::controller(BlogController::class)->group(function () {

    Route::post('addingBlog','addBlog')->name('routeToAddBlog');
    Route::get('viewingBlog','viewBlog')->name('routeToViewBlog');
    // Route::delete('deletingBlog/{id}','deleteBlog')->name('routeToDeleteBlog');
    Route::get('blogToedit/{id}','blogToBeEdited')->name('routeForBlogToBeEdited');
    Route::post('editingBlog/{id}','editBlog')->name('routeToEditBlog');
});



});



Route::prefix('adminloggedin')->middleware(['auth','admin'])->group(function () {

    Route::controller(Controller::class)->group(function () {
        Route::get('adminStyle','adminDashView')->name('dashAdmin');
        Route::get('customizingBlogs','adminCustmBlog')->name('routeToAdminCustomize');
        });

    Route::controller(CategoryController::class)->group(function () {

        Route::get('viewingCats','viewCats')->name('routeToViewCatPage');
        Route::get('categoryCust','allCategories')->name('routeToAllCats');
        Route::post('addingCat','addCategory')->name('routeToAddCats');
        Route::delete('deletingcats/{id}','deleteCategory')->name('routeToDeleteCat');
        
    });

    Route::controller(TagController::class)->group(function () {

        Route::get('tagsCust','allTags')->name('routeToAllTags');
        Route::delete('deletingtags/{id}','deleteTag')->name('routeToDeleteTag');

    });

    Route::controller(BlogController::class)->group(function(){

        Route::get('pendingstate','blogState')->name('routeToPendingBlogs');
        
        Route::get('changestate/{id}','approveBlog')->name('routeToChangeState');

        Route::delete('deletingUser/{id}','deleteUser')->name('routeToDeleteuser');
        Route::get('UserEdit','adminCustmUser')->name('routeToEditUsers');

        
    });


});




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

// Route::get('/', function () {
//     return view('home');
// })->name('home');
// Route::get('/search', [BlogController::class, 'search'])->name('search');
// Route::get('/',[BlogController::class,'trendingHome'])->name('home');
// Route::get('/home',[BlogController::class,'trendingHome'])->name('home2');
// Route::get('lb',[BlogController::class,'latestBlogs'])->name('routeToLatestBlogs');
// Route::get('cb/{id}',[BlogController::class,'clickBlog'])->name('routeToClickedBlog');

// Route::get('viewByTag/{tag}',[TagController::class,'showBlogsByTag'])->name('routeToViewByTag');
// Route::get('pop',[TagController::class,'popTag'])->name('routeToPopTags');

// Route::middleware('auth')->group(function () {
    // Route::get('viewingTags',[TagController::class,'viewTag'])->name('routeToViewTagPage');
    // Route::post('addTags',[TagController::class,'storeTag'])->name('routeToAddTag');

    // Route::get('userStyle',[Controller::class,'userDashView'])->name('dashUser');
    // Route::get('addBlog',[Controller::class,'addBlogView'])->name('addBlogRoute');
    
    // Route::post('addingBlog',[BlogController::class,'addBlog'])->name('routeToAddBlog');
    // Route::get('viewingBlog',[BlogController::class,'viewBlog'])->name('routeToViewBlog');
    // Route::delete('deletingBlog/{id}',[BlogController::class,'deleteBlog'])->name('routeToDeleteBlog');
    // Route::get('blogToedit/{id}',[BlogController::class,'blogToBeEdited'])->name('routeForBlogToBeEdited');
    // Route::post('editingBlog/{id}',[BlogController::class,'editBlog'])->name('routeToEditBlog');

    // Route::delete('deleteComment/{id}',[CommentController::class,'deleteComment'])->name('routeToDeleteComment');
// });



// Route::middleware(['auth','admin'])->group(function () {
// Route::get('viewingCats',[CategoryController::class,'viewCats'])->name('routeToViewCatPage');
// Route::get('categoryCust',[CategoryController::class,'allCategories'])->name('routeToAllCats');
// Route::post('addingCat',[CategoryController::class,'addCategory'])->name('routeToAddCats');
// Route::delete('deletingcats/{id}',[CategoryController::class,'deleteCategory'])->name('routeToDeleteCat');

// Route::get('tagsCust',[TagController::class,'allTags'])->name('routeToAllTags');
// Route::delete('deletingtags/{id}',[TagController::class,'deleteTag'])->name('routeToDeleteTag');

//     Route::delete('deletingUser/{id}',[BlogController::class,'deleteUser'])->name('routeToDeleteUser');
// Route::get('UserEdit',[BlogController::class,'adminCustmUser'])->name('routeToEditUsers');

// Route::get('adminStyle',[Controller::class,'adminDashView'])->name('dashAdmin');
// Route::get('customizingBLogs',[Controller::class,'adminCustmBlog'])->name('routeToAdminCustomize');

// });




// Route::get('viewingFeeds',[Controller::class,'feedView'])->name('routeToViewFeeds');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('irritatinghomie');