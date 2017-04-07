<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillController extends Controller

{

        
    
    /*
     * GET
     * Function that validates the form submission and calculates the amount
     * due for each person, always making sure the bill is paid over overpaid
    */
    
    public function calculate(Request $request){
        
        /* Check if the form has been submitted via GET, then validate
         * 
         * Input fields in form were purposely not created as number fields in order
         * to test the validation
        */
        
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
            
            // return view WITH all variavles (including calculated variables)
            return view('calculate')->with([
            'subtotal' => $subtotal,
            'tip' => $tip,
            'round' => $round,
            'people' => $people,
            'total' => $total,
            'amountDue' => $amountDue
            ]);
        } else{
            
            // return view WITHOUT all variavles (including calculated variables)
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
    # in place to always round up when splitting the check and assigning $amountDue
    
    function roundUp($value, $places=0) {
        
        if ($places < 0) {
            $places = 0;
            }
        $mult = pow(10, $places);
        
        return ceil($value * $mult) / $mult;
    
    } # end function roundUp
    
  
}
