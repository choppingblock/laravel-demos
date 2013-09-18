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

    <script>

    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.myAwesomeDropzone = {
        //paramName: "url", // The name that will be used to transfer the file
        // maxFilesize: 3, // MB
        addRemoveLinks: true,
        autoProcessQueue: false,
        uploadMultiple: false,
        parallelUploads: 100,
        maxFiles: 100,

        // The setting up of the dropzone
          init: function() {
            var myDropzone = this;

            // First change the button to actually tell Dropzone to process the queue.
            this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
              // Make sure that the form isn't actually being sent.
              e.preventDefault();
              e.stopPropagation();
              myDropzone.processQueue();
            });

            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function() {
              // Gets triggered when the form is actually being sent.
              // Hide the success button or the complete form.
            });
            this.on("successmultiple", function(files, response) {
              // Gets triggered when the files have successfully been sent.
              // Redirect user or notify of success.
            });
            this.on("errormultiple", function(files, response) {
              // Gets triggered when there was an error sending the files.
              // Maybe show form again, and notify user of error
            });
          }
 
    };



    </script>

    <form action="{{ url('images/create')}}" id="my-awesome-dropzone" class="dropzone">
        <div class="dropzone-previews"></div> <!-- this is were the previews should be shown. -->
        <button type="submit">Submit</button>
</form>
	
@endsection