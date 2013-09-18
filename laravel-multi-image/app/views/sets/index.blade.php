@extends('layouts.default')

@section('header')
	<h1>Sets Listing Page</h1>
@endsection

@section('content')
	<table class="pure-table">
		<thead>
	        <tr>
	            <th>Label</th>
	        </tr>
    	</thead>
    	<tbody>
    		@foreach($sets as $set)
    			<tr>
    				<td>{{ $set->label }}</td>
    			</tr>
    		@endforeach
    	</tbody>
    </table>

    <nav class="formnav">
	</nav>
@stop