<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillController extends Controller
{
    
    /*
     *
    */
    public function index(){
        
        Return 'Making first controller';
        
    }
    
    
    public function setDefaults(){
        
        
        dump(config('bill.defaultNumberOfPeople'));
        
    }
        
        
        
    
    
  
}
