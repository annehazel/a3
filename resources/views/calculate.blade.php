@extends('layouts.master')


@section('title')
    Bill Calculator
@endsection


@section('content')
    <h1>Bill Calculator</h1>
    
    
    <form method="get" action="/">
    <!--textbox, type of number-->
        <div class="form-group">
            <label for="subtotal" >Bill total (subtotal)<span class="required" value= "">*</span>:</label><br/>
            <input type="number" step="0.01" id="subtotal" name="subtotal" value="{{ $subtotal or 0 }}" /><br/>
        </div>
            
        <!--dropdown -->
        <div class="form-group">
            <label for="tip" >How much tip would you like to leave?<span class="required">*</span></label><br/>      
            <select name="tip" id="tip">
                <option value=0 {{ ($tip==0) ? 'selected' : null }}>No Tip</option>
                <option value=.1 {{ ($tip==.1) ? 'selected' : null }}>10%</option>
                <option value=.15 {{ ($tip==.15) ? 'selected' : null }}>15%</option>
                <option value=.20 {{ ($tip==.20) ? 'selected' : null }}>20%</option>
                <option value=.25 {{ ($tip==.25) ? 'selected' : null }}>25%</option>
            </select>
            <br/>
        </div>            
            
        <!--checkbox -->
        <div class="form-group">
            <input type="checkbox" name="round" {{ ($round) ? 'CHECKED' : '' }}>
            <label for="round">Yes, round the total (including the tip) up to the nearest whole dollar</label>
            <br/>
        </div>
            
         <!--textbox, number -->
        <div class="form-group">
            <label for="people" >The check should be split between how many people?<span class="required">*</span></label><br/>
            <input type="number" id="people" name="people" value="{{ $people or null }}"/><br/>
        </div>
        
        <input type="submit" class="btn">   
        
    </form>
        
@endsection

