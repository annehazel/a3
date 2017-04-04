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
    public function calculate(Request $request){
        
        $subtotal = $request->input('subtotal');
        $tip = $request->input('tip');
        $round = $request->input('round');
        $people = $people->input('people');
        
        return view('calculate');
    
    }   
        
    
    
  
}
