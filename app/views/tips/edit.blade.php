@extends('layouts/main')

@section('content')
<h1>Edit Tip</h1>

{{ Form::model($tip, array('method' => 'PATCH','class'=>'form-update',  'route' =>	array('tips.update', $tip->id))) }}

{{ Form::text('tipSymbol',null, array('class'=>'input-block-level form-control', 'placeholder'=>'Symbol:') ) }}
     
{{ Form::text('tipCurrentPrice',null, array('class'=>'input-block-level form-control', 'placeholder'=>'Current Stock Price:') ) }}
    
{{ Form::text('tipBuyPrice',null, array('class'=>'input-block-level form-control', 'placeholder'=>'Buy At Price:') ) }}
    
{{ Form::text('tipSellPrice',null, array('class'=>'input-block-level form-control', 'placeholder'=>'Sell At Price:') ) }}
{{ Form::submit('Update', array('class' => 'btn btninfo'))
}}
{{ link_to_route('tips.index', 'Cancel', $tip->id,
array('class' => 'btn')) }}

{{ Form::close() }}
@if ($errors->any())
<ul>
{{ implode('', $errors->all('<li class="error">:message</
li>')) }}
</ul>
@endif

@stop