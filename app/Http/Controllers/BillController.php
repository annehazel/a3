<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillController extends Controller
{

        
    
    /*
     *
    */    
    public function calculate(Request $request){
        
        if ($_GET){
            $this->validate($request, [
            
                'subtotal' => 'required',                       
                'tip' => 'required',
                'people' => 'required'
                
            ]);
    
        }
        
        
        
        // Retrieve input from form submission / GET request
        $subtotal = $request->input('subtotal');
        $tip = $request->input('tip');
        $round = $request->has('round');
        $people = $request->input('people');
        
        if($subtotal >.01){
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
            'people' => $people,
            'total' => $total,
            'amountDue' => $amountDue
            ]);
        } else{
            
            return view('calculate')->with([
            'subtotal' => $subtotal,
            'tip' => $tip,
            'round' => $round,
            'people' => $people,
            ]);
            
            
        }
        
    
    }
    
    
    
    function getTotal($subtotal, $tip, $round = false) {
    
        $total = $subtotal * (1+$tip);
        $total = round($total, 2);
        
        if ($round){
            $total = ceil($total);
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
