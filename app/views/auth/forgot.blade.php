@extends('templates.plain-template')
@section('content')
<div class="container w-xxl w-auto-xs">
  <a href class="navbar-brand block m-t">
  	<i class="fa fa-hacker-news"></i> Yak
  </a>
  <div class="m-b-lg">

    <div class="wrapper text-center">
      <strong>Forgot your password? Just provide us your email address and we'll send you a new one.</strong>
    </div>

    {{ Form::open(['action' => 'AuthController@passswordRequest']) }}
      
      @include('partials.errors.validation')

      <div class="list-group list-group-sm"> 
        <div class="list-group-item">
        	{{ Form::email('email', null, ['class' => 'form-control no-border', 'placeholder' => 'Email']) }}
        </div>
      </div>

      {{ Form::submit('Reset Password', ['class' => 'btn btn-lg btn-danger btn-block']) }}      

      <div class="text-center m-t m-b">
      	<a href="{{ action('AuthController@signin') }}">Back to Sign In page</a>
      </div>

    {{ Form::close() }}

  </div>
</div>
@stop