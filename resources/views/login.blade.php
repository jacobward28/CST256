@extends('layouts.appmasterlogin')
@section('title', 'Login Page')

@section('content')

	<form action="login" method="POST">
	<input type="hidden" name="_token"
	value="{{ csrf_token() }} "/>
	<div class="container">
  	<h2 align="center">Login</h2>
  	
  	<div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Username" name="username" maxlength="25" required>
    </div>
    <div class="col">
      <input type="password" class="form-control" placeholder="Password" name="password" maxlength="25" required/>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
  	  <button type="submit" class="btn btn-primary" name="login">Login</button>
  	  	<p>
  			Not yet a member? <a href="registrationpage">Register</a>
  		</p>
  	</div>
  </div>
  </div>
 </form>

@endsection
