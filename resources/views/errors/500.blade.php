@extends('layout.guest-master')
@section('content')
    <div class="content" style="padding-top:150px;">
        <div id="error-404" class="d-flex flex-column align-items-center justify-content-center">
		    <div class="content">
		        <div class="error-code display-1 text-center">500</div>
		        <div class="message h4 text-center text-muted">Well, you broke the internet!!</div>
		        <div class="sub-message h6 mt-4 mb-12 text-center text-muted">
            		Just kidding, looks like we have an internal issue, please try again in couple minutes.
        		</div>
		        <a class="d-block text-center btn btn-primary" href="{{ route('login') }}">Go back to dashboard</a>
		    </div>
		</div>
    </div>
@endsection