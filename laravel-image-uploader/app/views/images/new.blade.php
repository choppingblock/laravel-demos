@extends('layouts.default')

@section('header')
    <h1>Add New Image</h1>
@endsection

@section('content')
	@if( $errors->count() > 0 )
        <p>The following errors have occurred:</p>

        <ul id="form-errors">
            {{ $errors->first('first_name', '<li>:message</li>') }}
            {{ $errors->first('last_name', '<li>:message</li>') }}
        </ul>   
    @endif

	{{ Form::open(array('url' => 'images/create', 'files' => true, 'class' => 'pure-form pure-form-aligned') ) }}
		<fieldset>
            <legend>Basic Info</legend>

        	<!-- title field -->
            <div class="pure-control-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', Input::old('title')) }}
            </div>

            <!-- url field -->
            <div class="pure-control-group">
                {{ Form::label('url', 'File') }}
                {{ Form::file('url', Input::old('url')) }}
            </div>

            <!-- last name field -->
            <div class="pure-control-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::textarea('description', Input::old('description')) }}
            </div>

        </fieldset>

    <nav class="formnav">
		{{ HTML::linkRoute('images', 'Images', null, array('class' => 'pure-button')) }}
		{{ Form::submit('Add Image', array('class' => 'pure-button pure-button-primary')) }}
	</nav>

	{{ Form::close() }}
@endsection