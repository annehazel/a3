<?php



Route::get('/', 'BillController@calculate');





/*
 * Routes for error handling and testing
 */
if(config('app.env') == 'local'){
  Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
} 
 
