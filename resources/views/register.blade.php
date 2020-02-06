@extends('layouts.appmasterlogin')
@section('title', 'Registration Page')


@section('content')
	<form action="register" method="POST">
	
	<input type="hidden" name="_token"
	value="{{ csrf_token() }} "/>
	<!-- Create Username: <input name="username" type="text"><br>
	Create Password: <input name="password" type="password"><br> -->
	
	<div class="container">
  	<h2 align="center">Register</h2>
  	
  	<div class="row">
    <div class="col">

      <input type="text" class="form-control" placeholder="First name" name="firstname" maxlength="25" required>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Last name" name="lastname" maxlength="25" required/>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Username" name="username" required>
    </div>
    <div class="col">
      <input type="email" class="form-control" placeholder="Email" name="email" required/>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <input type="password" class="form-control" placeholder="Password" name="password" required/>
    </div>
    
    <div class="col">
      <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpass" required/>
    </div>
  </div>
  <div class="row">
  	<div class="col">
  		<input type="tel" class="form-control" placeholder="Phone Number" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required/>
</div>
  	<div class="col">
	<small>Format: 123-456-7890</small>
	</div>
</div>
<br>  	
  	<div class="row">
    <div class="col">
  	  <button type="submit" class="btn btn-primary" name="register">Register</button>
  	  	<p>
  			Already a member? <a href="loginpage">Sign in</a>
  		</p>
  	</div>
  </div>
	</form>
@endsection
