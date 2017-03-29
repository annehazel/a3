<?php



Route::get('/', 'BillController@show');


/*
 * Testing custom config file
 */
Route::get('/bill/defaults' , 'BillController@setDefaults');



/*
 * Routes for error handling and testing
 */
if(config('app.env') == 'local'){
  Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
} 
 
