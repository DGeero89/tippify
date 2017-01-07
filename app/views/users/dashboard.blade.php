@extends('layouts/main')
@section('content')
<h1>All Stock Tips</h1>
@if(Entrust::hasRole('Admin'))
<p>{{ link_to_route('tips.create', 'Add new tip') }}</p>
@endif
@if ($tips->count())
<table id="large" class="table table-striped table-bordered sortable">
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
    <td><a href="{{url('tips/'.$tip->id)}}"><button class="btn btn-warning" style="width: 100%; font-weight: bold;">{{ $tip->tipSymbol }}</button></a></td>
<td>${{ $tip->tipCurrentPrice }}</td>
<td>${{ $tip->tipBuyPrice }}</td>
<td>${{ $tip->tipSellPrice }}</td>
<td>{{ $tip->tipExpert }}</td>
<td>
  @for ($i=1; $i <= 5 ; $i++)
         <span class="glyphicon glyphicon-star{{ ($i <= $tip->rating_cache) ? '' : '-empty'}}"></span>
    @endfor
      
  {{ number_format($tip->rating_cache, 1);}} stars
                        
  </td>

 @if(Entrust::hasRole('Admin'))
<td>{{ link_to_route('tips.edit', 'Edit',
array($tip->id), array('class' => 'btn btn-info')) }}</td>
<td>
{{ Form::open(array('method'
=> 'DELETE', 'route' => array('tips.destroy', $tip->id))) }}
{{ Form::submit('Delete', array('class' =>
'btn btn-danger')) }}
  @endif
{{ Form::close() }}
</td>
</tr>
@endforeach
  <tr>
    {{ $tips->links() }}
  </tr>
</tbody>
</table>
@else
There are no users
@endif
@stop


