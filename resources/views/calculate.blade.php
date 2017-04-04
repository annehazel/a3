@extends('layouts.master')


@section('title')
    Bill Calculator
@endsection


@section('content')
    <h1>Bill Calculator</h1>
    
    
    <form method="get" action="/">
    <!--textbox, type of number-->
        <div class="form-group">
            <label for="subtotal" >Bill total (subtotal)<span class="required">*</span>:</label><br/>
            <input type="number" step="0.01" id="subtotal" name="subtotal" value="" /><br/>
        </div>
            
        <!--dropdown -->
        <div class="form-group">
            <label for="tip" >How much tip would you like to leave?<span class="required">*</span></label><br/>      
            <select name="tip" id="tip">
                <option value=0>No Tip</option>
                <option value=.1>10%</option>
                <option value=.15>15%</option>
                <option value=.20>20%</option>
                <option value=.25>25%</option>
            </select>
            <br/>
        </div>            
            
        <!--checkbox -->
        <div class="form-group">
            <input type="checkbox" name="round" >
            <label for="round">Yes, round the total (including the tip) up to the nearest whole dollar</label>
            <br/>
        </div>
            
         <!--textbox, number -->
        <div class="form-group">
            <label for="people" >The check should be split between how many people?<span class="required">*</span></label><br/>
            <input type="number" id="people" name="people" value="2" /><br/>
        </div>
        
        <input type="submit" class="btn">   
        
    </form>
        
@endsection

