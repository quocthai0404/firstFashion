<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\mainController;
use App\Http\Middleware\adminAccess;
use App\Models\User;
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



Route::get('/', [mainController::class, 'showInHome'])->name('home');
Route::get('login', function(){
    return view('login');
})->name('login');
Route::post('beginLogin', [mainController::class, 'beginLogin'])->name('beginLogin');
Route::post('logout', [mainController::class, 'logout'])-> name('logout');


Route::get('create_user', function(){
    $user = new User();
    $user -> fullname = 'thai phan quoc ';
    $user -> email = 'phanquocthai198237@gmail.com';
    $user -> username = 'thaiadmin2';
    $user -> password = bcrypt('123456789');
    $user -> user_role = 1;
    $user -> save();
});

Route::get('about', function(){
    return view('about');
})->name('about');



Route::get('productMen', [mainController::class, 'productMen'])-> name('productMen');
Route::get('productWomen', [mainController::class, 'productWomen'])->name('productWomen');

Route::get('signup', function(){
    return view('signup');
})->name('signup');

Route::post('beginSignUp', [mainController::class, 'beginSignUp'])->name('beginSignUp');
Route::get('filterCat/{categoryId}', [mainController::class, 'filterCat'])->name('filterCat');
Route::get('filterCatWomen/{categoryId}', [mainController::class, 'filterCatWomen'])->name('filterCatWomen');

Route::get('filterProduct/{selectedPriceOrder}/{selectedCategory}', [mainController::class, 'filterProduct'])->name('filterProduct');
// Route::post('filterProduct', [mainController::class, 'filterProduct'])->name('filterProduct');
// Route::post('filterProductWomen', [mainController::class, 'filterProductWomen'])->name('filterProductWomen');
Route::get('filterProductWomen/{selectedPriceOrder}/{selectedCategory}', [mainController::class, 'filterProductWomen'])->name('filterProductWomen');

Route::get('filterBrand/{brandID}', [mainController::class, 'filterBrand'])->name('filterBrand');
Route::get('filterBrandWomen/{brandID}', [mainController::class, 'filterBrandWomen'])->name('filterBrandWomen');

Route::get('cart', [mainController::class, 'cart'])->name('cart');
Route::get('detailProduct/{productID}', [mainController::class, 'detailProductbyID'])->name('detailProduct');
Route::post('add-to-cart/{id}', [mainController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [mainController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [mainController::class, 'remove'])->name('remove_from_cart');

Route::get('/get-related-products/{id}', [mainController::class, 'getProductById'])->name('getProductById');

Route::middleware('auth')->group(function(){
    Route::get('viewFormCheckOut', function(){
        return view('viewFormCheckOut');
    })->name('viewFormCheckOut');
    
    Route::post('doneOrder', [mainController::class, 'doneOrder'])->name('doneOrder');
});
Route::get('contact', function(){
    return view('contact');
})->name('contact');
Route::post('contact-us', [mainController::class, 'store'])->name('contact.us.store');

//admin 


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin', [adminController::class, 'index'])->name('index');
    Route::get('allUser', [adminController::class, 'viewAllUser'])->name('viewAllUser');
    Route::get('deleteUserByID/{id}', [adminController::class, 'deleteUserByID'])->name('deleteUserByID');
    Route::get('/get-user/{id}', [adminController::class, 'getUserById'])->name('getUserById');
    Route::patch('editUser', [adminController::class, 'editUser'])->name('editUser');
    Route::get('viewAllProduct', [adminController::class, 'viewAllProduct'])->name('viewAllProduct');
    Route::get('viewAddProduct', function(){
        return view('admin.addProduct');
    })->name('viewAddProduct');
    Route::post('addNewProduct', [adminController::class, 'addNewProduct'])->name('addNewProduct');
    Route::get('deleteProduct/{id}', [adminController::class, 'deleteProduct'])->name('deleteProduct');
    Route::get('viewEditId/{id}', [adminController::class, 'viewEditId'])->name('viewEditId');
    Route::post('editProduct/{id}', [adminController::class, 'editProduct'])->name('editProduct');
    
    
    Route::get('viewAddPhotos/{id}', [adminController::class, 'viewAddPhotos'])->name('viewAddPhotos');
    Route::post('addPhotos', [adminController::class, 'addPhotos'])->name('addPhotos');
    Route::get('viewOrders', [adminController::class, 'viewOrders'])->name('viewOrders');
});

