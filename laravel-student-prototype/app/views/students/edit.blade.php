@extends('layouts.default')

@section('header')
    <h1>Editing: {{ $student->getFullName() }}</h1>
@endsection

@section('content')
	@if( $errors->count() > 0 )
        <p>The following errors have occurred:</p>

        <ul id="form-errors">
            {{ $errors->first('first_name', '<li>:message</li>') }}
            {{ $errors->first('last_name', '<li>:message</li>') }}
        </ul>   
    @endif

	{{ Form::open(array('url' => 'student/update', 'method' => 'put', 'class' => 'pure-form pure-form-aligned')) }}
        <fieldset>
            
            <!-- first name field -->
            <div class="pure-control-group">
                {{ Form::label('first_name', 'First Name') }}
                {{ Form::text('first_name', $student->first_name) }}
            </div>

            <!-- last name field -->
            <div class="pure-control-group">
                {{ Form::label('last_name', 'Last Name') }}
                {{ Form::text('last_name', $student->last_name) }}
            </div>

            <!-- email field -->
            <div class="pure-control-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', $student->email) }}
            </div>

            <!-- twitter field -->
            <div class="pure-control-group">
                {{ Form::label('twitter', 'Twitter') }}
                {{ Form::text('twitter', $student->twitter) }}
            </div>

            <!-- site url field -->
            <div class="pure-control-group">
                {{ Form::label('site_url', 'Site') }}
                {{ Form::text('site_url', $student->site_url) }}
            </div>

            <!-- blog url field -->
            <div class="pure-control-group">
                {{ Form::label('blog_url', 'Blog') }}
                {{ Form::text('blog_url', $student->blog_url) }}
            </div>

            <!-- blog url field -->
            <div class="pure-control-group">
                {{ Form::label('birthday', 'Birthday') }}
                {{ Form::text('birthday', $student->birthday) }}
            </div>

            <!-- year input -->
            <div class="pure-control-group">
                {{ Form::label('year_id', 'Year') }}
                <?php $year_options = array('' => 'Select') + Year::lists('label', 'id'); ?>
                {{ Form::select('year_id', $years = $year_options, $student->year_id); }}
            </div>

            {{ Form::hidden('id', $student->id) }}

            <nav class="formnav">
                {{ HTML::linkRoute('students', 'Students', null, array('class' => 'pure-button')) }}
                {{ Form::submit('Update Student', array('class' => 'pure-button pure-button-primary')) }}
            </nav>

        </fieldset>
	{{ Form::close() }}
@endsection