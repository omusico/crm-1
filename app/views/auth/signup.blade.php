@extends('templates.plain-template')
@section('content')
<div class="container w-xxl w-auto-xs">
  <a href class="navbar-brand block m-t">
  	<i class="fa fa-hacker-news"></i> Yak
  </a>
  <div class="m-b-lg">

    <div class="wrapper text-center">
      <strong>Sign up to be inspired!</strong>
    </div>

    {{ Form::open(['action' => 'AuthController@postSignup']) }}
      
      @include('partials.errors.validation')

      <div class="list-group list-group-sm"> 
        <div class="list-group-item">
        	{{ Form::email('email', null, ['class' => 'form-control no-border', 'placeholder' => 'Email']) }}
        </div>
        
        <div class="list-group-item">
        	{{ Form::password('password', ['class' => 'form-control no-border', 'placeholder' => 'Password']) }}
        </div>

        <div class="list-group-item">
        	{{ Form::password('password_confirm', ['class' => 'form-control no-border', 'placeholder' => 'Confirm Password']) }}
        </div>
      </div>

      {{ Form::submit('Sigin In', ['class' => 'btn btn-lg btn-primary btn-block']) }}      

      <div class="text-center m-t m-b">
      	<p>Already registered? <a class="font-bold" href="{{ action('AuthController@signin') }}">Sign in</a></p>
      </div>
      
    {{ Form::close() }}

  </div>
</div>
@stop