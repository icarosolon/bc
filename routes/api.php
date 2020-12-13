<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/articles', 'Api\ArticleController@index');
Route::get('/articles/{id}', 'Api\ArticleController@show');
Route::get('/articles/{id}/documents', 'Api\ArticleController@documents');
Route::get('/articles/search/{termo}', 'Api\ArticleController@search');
Route::post('/articles', 'Api\ArticleController@store');
//Route::get('/articles/{id_article}/documents/{id_document}', [DocumentController::class, 'show']);

//Documents
Route::get('/documents', 'Api\DocumentController@index');
Route::get('/document/{id}', 'Api\DocumentController@show');
Route::get('/document/download/{article_id}', 'Api\DocumentController@download'); //recebe o id do artigo
Route::post('/document', 'Api\DocumentController@store');
