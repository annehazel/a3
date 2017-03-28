<?php



Route::get('/bill', 'BillController@index');


Route::get('/', function () {
    return view('welcome');
});





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
 
