<?php

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Route::post('verifyUser' , 'authController@verifyUsers');
Route::get('logout' , 'authController@logout');
Route::get('getAllSample' , 'receiverController@getAllSample');
Route::get('getAllEnclosedItem' , 'receiverController@getAllEnclosedItem');
Route::post('getSampleListById' , 'receiverController@getSampleListById');
Route::post('deleteReceivedSample' , 'receiverController@deleteReceivedSample');
if(Cookie::get('analyst') != null){
    Route::get('/', 'analystController@analysisReport');
    Route::get('analysisReport' , 'analystController@analysisReport');
    Route::get('sampleType' , 'analystController@sampleType');
    Route::post('insertSample' , 'analystController@insertSample');
    Route::post('getSampleList' , 'analystController@getSampleList');
    Route::post('deleteSample' , 'analystController@deleteSample');
    Route::get('enclosedItem' , 'analystController@enclosedItem');
    Route::post('insertEnclosedItem' , 'analystController@insertEnclosedItem');
    Route::post('getEnclosedItemList' , 'analystController@getEnclosedItemList');
    Route::post('deleteEnclosedItem' , 'analystController@deleteEnclosedItem');
    Route::get('methodology' , 'analystController@methodology');
    Route::post('insertMethodology' , 'analystController@insertMethodology');
    Route::post('getMethodologyList' , 'analystController@getMethodologyList');
    Route::post('deleteMethodology' , 'analystController@deleteMethodology');
    Route::get('getDataByBarcode' , 'analystController@getDataByBarcode');
    Route::post('UpdateResultAnalysis' , 'analystController@UpdateResultAnalysis');
    Route::post('forwardAdminSample' , 'analystController@forwardAdminSample');
    Route::get('directorDesignation' , 'analystController@directorDesignation');
    Route::post('insertDesignation' , 'analystController@insertDesignation');
}
if(Cookie::get('receiver') != null){
    Route::get('/', 'receiverController@receiveReport');
    Route::get('receiveReport' , 'receiverController@receiveReport');
    Route::post('insertNewSample' , 'receiverController@insertNewSample');
    Route::post('forwardReceivedSample' , 'receiverController@forwardReceivedSample');
    Route::get('barcode/{id}' , 'receiverController@barcode');
}if(Cookie::get('admin') != null){
    Route::get('/', 'adminController@finalReport');
    Route::get('finalReport' , 'adminController@finalReport');
    Route::post('getSampleListByIdAdmin' , 'adminController@getSampleListByIdAdmin');
    Route::get('users' , 'analystController@users');
    Route::post('insertUser' , 'analystController@insertUser');
    Route::post('getUserList' , 'analystController@getUserList');
    Route::post('deleteUser' , 'analystController@deleteUser');
    Route::post('pdfMaker' , 'adminController@pdfMaker');
}
