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
        $round = $request->has('round');
        $people = $request->input('people');
        
        dump($subtotal);
        
        return view('calculate')->with([
        'subtotal' => $subtotal,
        'tip' => $tip,
        'round' => $round,
        'people' => $people
        ]);
    
    }   
        
    
    
  
}
