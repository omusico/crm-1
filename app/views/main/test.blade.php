@extends('templates.main-template')
@section('content')
<div class="col-lg-6">
	<h4 class="text-danger">Click anywhere in the below text to begin editing <i class="fa fa-smile-o"></i></h4>
	<div id="editor1" contenteditable="true">
		<h1>This is an editable title</h1>
		<p><img style="float:left; margin:10px" src="{{ asset('img/a0.jpg') }}"></p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
	<div style="margin-top: 120px;">
		<button class="btn btn-info enable-edit">Enable Editing</button>
		<button class="btn btn-danger disable-edit">Disable Editing</button>
		<button class="btn btn-success save-edit">Save Changes</button>
	</div>
</div>
@stop