<?php
use Illuminate\Http\Request;
use Resources\views\navbar;
?>
@extends('layouts.appmaster')
@section('title', 'profile page')

@section('content')
<html>
<head>
  <title>Registration</title>
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<form action="update" method="POST">
	
	<input type="hidden" name="_token"
	value="<?php echo csrf_token();?> "/>
	<!-- Create Username: <input name="username" type="text"><br>
	Create Password: <input name="password" type="password"><br> -->
	
	<div class="container">
  	<h2 align="center">Edit Profile Information</h2>
  	
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
	<small>Phone Format: 123-456-7890</small>
	</div>
</div>

<div class="row">
	<div class="col">
		<input type="text" class="form-control" placeholder="About" name="about"/>
</div>
</div>
<br>  	
  	<div class="row">
    <div class="col">
  	  <button type="submit" class="btn btn-primary" name="update">Update</button>
  	</div>
  </div>
	</form>
</body>
@endsection
</html>