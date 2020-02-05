<?php
use Illuminate\Http\Request;
use Resources\views\navbar;
use App\models\userModel;
use App\services\Data\dataService;
use App\services\Data\userService;
use App\Http\Controllers\userController;
?>
@extends('layouts.appmaster')
@section('title', 'Users-Admin')

@section('content')
<html>
<head>
</head>
<body>
<h2>Display Users</h2>
   <style>
    #tablesearch {
    fornt-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    with: 100%;
    }
    
    #tablesearch td, #tablesearch th {
    border: 2px solid #ddd;
    border-radius: 4px;
    padding: 8px;
    }
    
    #tablesearch tr:nth-child(even){background-color: #f2f2f2;}
    
    #tablesearch tr:hover {background-color: #ddd;}
    
    #tablesearch th {
    padding-top: 8px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #339;
    color: white;
    }
    </style>
  </head>


<h2 align="center">All the Users available.</h2> 
	<br>
	<table id="tablesearch" class="display">
  <thead>
    <tr>
      
      <th>First Name</th>
      <th>Last Name</th>
      <th>User Name</th>
      <th>Role</th>
      <th>Update Role</th>
      <th>Delete User</th> 
      
      
    </tr>
  </thead>
  <tbody>
  <?php 
  $UserService = new userService();
  $userArray = $UserService->ViewUsers();
  
  foreach ($userArray as $user)
  {
  ?>
	<tr>
      
      <td><?php echo $user->getFirstname()?></td>
      <td><?php echo $user->getLastname()?></td>
      <td><?php echo $user->getUsername()?></td>
      
      <form action="../updateUserHandler.php" class="input-group" method = "get">
      <td><?php  if($user->getRole() == 1){?>
          <input type="text"  value='admin' name="role"
          />
          <?php } if($user->getRole() == 3){?>
          <input type="text"  value='suspended' name="role"
          />
      <?php } if($user->getRole() == 0){ ?>
          <input type='text'  value='user' name='role'/>
          
      <?php } ?></td>
     
      <td>
          
          	<input type="hidden"  value="<?php echo $user->getId()?>" name="user_id"/>
          	<input type="submit" class="btn btn-success" name="update" Value="Update"/>
      	 
  	  </td>
  	   </form>
      <td>
          <form action="../DeleteUserHandler.php" class="input-group" method = "get">
          <input type="hidden"  value="<?php echo $user->getId()?>" name="id"/>
          <input type="submit" class="btn btn-primary " name="Delete" Value="Delete"/>
      </form>
      </td>
      
    </tr>

    <?php }?>
    
  </tbody>
</table>
<script>
$(document).ready( function () {
    $('#tablesearch').DataTable();
} );
</script>

</body>

@endsection
</html>