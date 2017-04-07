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
            
                'subtotal' => 'required|numeric',                       
                'tip' => 'required|numeric',
                'people' => 'required|numeric',
                
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
            
            $amountDue = $this->splitCheck($total, $people);
            
            
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
            'people' => $people
            ]);
            
            
        }
        
    
    }
    
    
    
    function getTotal($subtotal, $tip, $round = false) {
    
        $total = $subtotal * (1+$tip);
        $total = round($total, 2);
        
        if ($round){
            $total = ceil($total);
            return number_format($total, 2);
        } else{
            
            return number_format($total, 2);
        
        }


    } # end function getTotal
        
    
    
    function splitCheck($total, $people) {

        $amountDue = $total/$people;
        $amountDue = $this->roundUp($amountDue, 2);
        
        return number_format($amountDue, 2);
    
    } # end function splitCheck
    
    
    # function from http://php.net/manual/en/function.ceil.php
    # steve_phpnet // nanovox \\ com
    
    
    function roundUp($value, $places=0) {
        
        if ($places < 0) {
            $places = 0;
            }
        $mult = pow(10, $places);
        
        return ceil($value * $mult) / $mult;
    }
    
  
}
