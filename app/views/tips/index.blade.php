@extends('layouts/main')
@section('content')
<h1>All Stock Tips</h1>
<p>{{ link_to_route('tips.create', 'Add new tip') }}</p>
@if ($tips->count())
<table class="table table-striped table-bordered">
  <thead>
<tr>
<th>Tip Symbol</th>
<th>Current Price</th>
<th>Buy Price</th>
<th>Sell Price</th>
<th>Expert</th>
<th>Rating</th>
</tr>
</thead>
<tbody>
@foreach ($tips as $tip)
<tr>
<td>{{ $tip->tipSymbol }}</td>
<td>{{ $tip->tipCurrentPrice }}</td>
<td>{{ $tip->tipBuyPrice }}</td>
<td>{{ $tip->tipSellPrice }}</td>
<td>{{ $tip->tipExpert }}</td>
<td>{{ $tip->tipRating }}</td>
<td>{{ link_to_route('tips.edit', 'Edit',
array($tip->id), array('class' => 'btn btn-info')) }}</td>
<td>
{{ Form::open(array('method'
=> 'DELETE', 'route' => array('tips.destroy', $tip->id))) }}
{{ Form::submit('Delete', array('class' =>
'btn btn-danger')) }}
{{ Form::close() }}
</td>
</tr>
@endforeach
</tbody>
</table>
@else
There are no users
@endif
@stop