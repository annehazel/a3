@extends('layouts.master')


@section('title')
    Bill Calculator
@endsection


@section('introContent')
    <h1>Bill Calculator</h1>
    <p>Use the calculator below to figure out how much money each person owes in order to pay the check.</p>
@endsection  // END introContent  



@section('content')
    
    <form method="GET" action="/">
    
        <!--textbox -->
        <div class="form-group">
            <label for="subtotal" >Bill total (subtotal)<span class="required" value= "">*</span>:</label><br/>
            <input type="text" step="0.01" id="subtotal" name="subtotal" value="{{ $subtotal or old('subtotal')}}" /><br/>
            
            <!-- Display validation errors -->
            @if($errors->get('subtotal'))
                <div class='required'>
                    <ul class="list-unstyled">
                        @foreach($errors->get('subtotal') as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
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
            
            <!-- Display validation errors -->    
            @if($errors->get('tip'))
                <div class='required'>
                    <ul class="list-unstyled">
                        @foreach($errors->get('tip') as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <br/>
            
        </div>            
            
        <!--checkbox -->
        <div class="form-group">
            <input type="checkbox" name="round" {{ ($round) ? 'CHECKED' : '' }}>
            <label for="round">Yes, round the total (including the tip) up to the nearest whole dollar.</label>
            <br/>
        </div>
            
         <!--textbox  -->
        <div class="form-group">
            <label for="people" >The check should be split between how many people?<span class="required">*</span></label><br/>
            <input type="text" id="people" name="people" value="{{ $people or old('people') }}"/><br/>
            
            <!-- display validation errors -->
            @if($errors->get('people'))
                <div class='required'>
                    <ul class="list-unstyled">
                        @foreach($errors->get('people') as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            @endif            
            
        </div>
        
        <button type="submit" class="btn btn-primary btn-lg btn-block">Calculate Amount Due</button>   
        
    </form>
    
    
    <!-- Display results, verified if $subotal gets assigned a value -->    
    @if($subtotal != null)
        <div class="resultsBox">
            
            <!-- Display text when user wants to round the total -->
            @if($round)
            <p>After including the tip and rounding up the bill to the nearest dollar, the total is ${{$total}}.
               Each of the {{$people}} people owes ${{$amountDue}}.</p>
            
            <!-- Display text when user does NOT want to round the total -->
            @else
            <p>After including the tip, the total is ${{$total}}.
               Each of the {{$people}} people owes ${{$amountDue}}.</p>
            
            @endif
        </div>
    @endif
    
        
@endsection // END content

