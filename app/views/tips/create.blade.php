@extends('layouts.main')

@section('content')

<h1>Post Stock Tip</h1>
@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

{{ Form::open(array('route' => 'tips.store', 'class'=>'form-signup')) }}
  
{{ Form::text('tipSymbol',null, array('class'=>'input-block-level form-control', 'placeholder'=>'Symbol:') ) }}
     
{{ Form::text('tipCurrentPrice',null, array('class'=>'input-block-level form-control', 'placeholder'=>'Current Stock Price:') ) }}
    
{{ Form::text('tipBuyPrice',null, array('class'=>'input-block-level form-control', 'placeholder'=>'Buy At Price:') ) }}
    
{{ Form::text('tipSellPrice',null, array('class'=>'input-block-level form-control', 'placeholder'=>'Sell At Price:') ) }}
     
{{ Form::text('tipExpert',null, array('class'=>'input-block-level form-control', 'placeholder'=>'Expert:') ) }}
     
{{ Form::submit('Submit Tip', array('class'=>' btn btn-large btn-primary btn-block')) }}
{{ Form::close() }}



@stop