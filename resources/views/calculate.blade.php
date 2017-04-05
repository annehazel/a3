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
            <input type="number" step="0.01" id="subtotal" name="subtotal" value="{{ $subtotal or null }}" /><br/>
            
            @if($errors->get('subtotal'))
                <ul>
                    @foreach($errors->get('subtotal') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            
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
                
            @if($errors->get('tip'))
                <ul>
                    @foreach($errors->get('tip') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif                
                
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
            
            @if($errors->get('people'))
                <ul>
                    @foreach($errors->get('people') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif            
            
        </div>
        
        <input type="submit" class="btn">   
        
    </form>
        
        
    @if($subtotal != null)
        
        @if($round)
        <p>After including the tip and rounding up the bill to the nearest dollar, the total is ${{$total}}.00.
           Each of the {{$people}} people owes ${{$amountDue}}.</p>
        
        @else
        <p>After including the tip, the total is ${{$total}}.
           Each of the {{$people}} people owes ${{$amountDue}}.</p>
        
        @endif
        
    @endif
    
    
    
        
@endsection

