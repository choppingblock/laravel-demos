@extends('layouts.default')

@section('header')
	<h1>Images Home Page</h1>
@endsection

@section('content')
	<table class="pure-table">
		<thead>
	        <tr>
	            <th>Title</th>
	        </tr>
    	</thead>
    	<tbody>
    		@foreach($images as $image)
    			<tr>
    				<td>{{ $image->title }}</td>
    			</tr>
    		@endforeach
    	</tbody>
    </table>

    <nav class="formnav">
		{{ HTML::linkRoute('new_image', 'New Image', null, array('class' => 'pure-button')) }}
	</nav>
@stop