<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
 * inbox mail Controller
 */
Route::get('/', 'InboxMailController@getIndex');


/*
 * Send mail Controller
 */
Route::get('/sent', 'SentMailController@getIndex');
Route::get('/new', 'SentMailController@newLetter');
Route::post('/send', 'SentMailController@sendLetter');
Route::post('/delete', 'SentMailController@delete');

Route::get('/letter/{id}', 'SentMailController@oneLetter');