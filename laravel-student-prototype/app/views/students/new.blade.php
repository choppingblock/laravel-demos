@extends('layouts.default')

@section('header')
    <h1>Add New Student</h1>
@endsection

@section('content')
    @if( $errors->count() > 0 )
        <p>The following errors have occurred:</p>

        <ul id="form-errors">
            {{ $errors->first('first_name', '<li>:message</li>') }}
            {{ $errors->first('last_name', '<li>:message</li>') }}
        </ul>   
    @endif

	{{ Form::open(array('url' => 'students/create', 'class' => 'pure-form pure-form-aligned') ) }}
        <fieldset>
            <legend>Basic Info</legend>

        	<!-- first name field -->
            <div class="pure-control-group">
                {{ Form::label('first_name', 'First Name') }}
                {{ Form::text('first_name', Input::old('first_name')) }}
            </div>

            <!-- last name field -->
            <div class="pure-control-group">
                {{ Form::label('last_name', 'Last Name') }}
                {{ Form::text('last_name', Input::old('last_name')) }}
            </div>

            <!-- email field -->
            <div class="pure-control-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Input::old('email')) }}
            </div>

            <!-- twitter field -->
            <div class="pure-control-group">
                {{ Form::label('twitter', 'Twitter') }}
                {{ Form::text('twitter', Input::old('twitter')) }}
            </div>

            <!-- site url field -->
            <div class="pure-control-group">
                {{ Form::label('site_url', 'Site') }}
                {{ Form::text('site_url', Input::old('site_url')) }}
            </div>

            <!-- blog url field -->
            <div class="pure-control-group">
                {{ Form::label('blog_url', 'Blog') }}
                {{ Form::text('blog_url', Input::old('blog_url')) }}
            </div>

            <!-- birthday field -->
            <div class="pure-control-group">
                {{ Form::label('birthday', 'Birthday') }}
                {{ Form::text('birthday', Input::old('birthday')) }}
            </div>

            <!-- year input -->
            <div class="pure-control-group">
                {{ Form::label('year_id', 'Year') }}
                <?php $year_options = array('' => 'Select') + Year::lists('label', 'id'); ?>
                {{ Form::select('year_id', $years = $year_options, Input::old('year_id')); }}
            </div>
        </fieldset>
        <fieldset>
            <legend>Skills</legend>
            <!-- skills input -->
            <div class="pure-controls">
                <?php foreach ($skills as $skill): ?>

                    <?php
                        // replace/escape for spaces
                        $label = preg_replace("![^a-z0-9]+!i", "-", $skill->label);
                        $label = 'skill_' . $label;
                    ?>

                    <!-- keeping the laravel generated version here for now -->
                    <!-- Not sure about the checkbox value, cant seem to access it in controller -->
                    <!-- {{ Form::checkbox($label, $label, Input::old($label)); }}
                    {{ Form::label($label, $skill->label); }} -->

                    <label for="<?php echo $label ?>" class="pure-checkbox">
                        {{ Form::checkbox($label, $label, Input::old($label), array( 'id'=>$label )); }} <?php echo $skill->label ?>
                    </label>
                <?php endforeach; ?>
            </div>
        </fieldset>
        
    	<nav class="formnav">
    		{{ HTML::linkRoute('students', 'Students', null, array('class' => 'pure-button')) }}
    		{{ Form::submit('Add Student', array('class' => 'pure-button pure-button-primary')) }}
    	</nav>
        
	{{ Form::close() }}
@endsection