<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillController extends Controller
{

    
    /*
     *
    */
    public function index(){
        
        return 'Making first controller';
        
    }

    
    /*
     *
    */    
    public function setDefaults(){
                
        dump(config('bill.defaultNumberOfPeople'));
        
    }

    
    /*
     *
    */    
    public function show(){
        
        return view('show');
    
    }   
        
    
    
  
}
