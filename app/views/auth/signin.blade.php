@extends('templates.plain-template')
@section('content')
<div class="container w-xxl w-auto-xs">
  <a href class="navbar-brand block m-t">
  	<i class="fa fa-hacker-news"></i> Yak
  </a>
  <div class="m-b-lg">

    <div class="wrapper text-center">
      <strong>Sign in to be inspired!</strong>
    </div>

    {{ Form::open(['action' => 'AuthController@store']) }}
      
      @include('partials.errors.validation')

      <div class="list-group list-group-sm"> 
        <div class="list-group-item">
        	{{ Form::email('email', null, ['class' => 'form-control no-border', 'placeholder' => 'Email']) }}
        </div>
        
        <div class="list-group-item">
        	{{ Form::password('password', ['class' => 'form-control no-border', 'placeholder' => 'Password']) }}
        </div>
      </div>

      <div class="checkbox">
        <label class="i-checks">
          <input type="checkbox" value="" name="remember">
          <i></i>
          Remember Me
        </label>
      </div>

      {{ Form::submit('Login', ['class' => 'btn btn-lg btn-danger btn-block']) }}      

      <div class="text-center m-t m-b">
      	<a href="{{ action('AuthController@forgot') }}">Forgot password?</a>
      </div>
      
    {{ Form::close() }}

  </div>
</div>
@stop