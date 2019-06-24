<?php

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

Route::get('/greeting/{name?}', function ($name = null) {

    if ($name) {

        echo 'Hello ' . $name . '!';

    } else {

        echo 'Hello World!';

    }

});
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', function (Illuminate\Http\Request $request) {
    if ($request->username == 'admin'
        && $request->password == 'admin') {
        return view('welcome_admin');
    }

    return view('login_error');
});
Route::get('/ProductDiscount', function () {

    return view('ProductDiscount');

});
Route::post('/DisplayDiscount', function (Illuminate\Http\Request $request) {
    $description = $request->description;
    $price = $request->price;
    $discountPercent = $request->discountPercent;
    $discountPrice = $price - $price * $discountPercent / 100;
    $discountAmount = $price - $discountPrice;
    if ($request->description && $request->price && $request->discountPercent) {

        return view('DisplayDiscount', compact('description', 'price', 'discountPercent', 'discountPrice', 'discountAmount'));
    }
    echo 'Moi Nhap Lai';
})->name('index');

Route::get('/Dictionary',function (){
    return view('Dictionary');
});
Route::post('/Dictionary',function (Illuminate\Http\Request $request){
    $search=$request->search;
    $result='';
    $dictionary=[
        'math'=>'toán',
        'apple'=>'táo',
        'book'=>'quyển sách'
    ];
    foreach ($dictionary as $key =>$value){
        if($search===$key){
            $result=$value;
            break;
        }else{
            $result='Khong Tim Thay';
        }
    }
    return view('Dictionary',compact('result'));


});
