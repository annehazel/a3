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
    public function calculate(Request $request){
        
        // Retrieve input from form submission / GET request
        $subtotal = $request->input('subtotal');
        $tip = $request->input('tip');
        $round = $request->has('round');
        $people = $request->input('people');
        

        
        
        
        
        
        
        return view('calculate')->with([
        'subtotal' => $subtotal,
        'tip' => $tip,
        'round' => $round,
        'people' => $people
        ]);
    
    }   
        
    
    
  
}
