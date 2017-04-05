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
        
        // Perform simple calculatiosn for $total and $maxpeople
        $total = $this->getTotal($subtotal, $tip, $round);
        $maxPeople = $total*100 +1;
        
        dump($total);
        dump($maxPeople);
        
        $amountDue = $this->splitCheck($total, $people);
        dump($amountDue);
        
        
        return view('calculate')->with([
        'subtotal' => $subtotal,
        'tip' => $tip,
        'round' => $round,
        'people' => $people
        ]);
    
    }
    
    
    
    function getTotal($subtotal, $tip, $round = false) {
    
        $total = $subtotal * (1+$tip);
        $total = ceil($total);
        
        if ($round){
            $total = round($total);
            return $total;
        }
          
        return $total;

    } # end function getTotal
        
    
    
    function splitCheck($total, $people) {

        $amountDue = $total/$people;
        $amountDue = round($amountDue, 2, PHP_ROUND_HALF_UP);
        
        return $amountDue;
    
    } # end function splitCheck
    
    
  
}
