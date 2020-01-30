<html>
<head>
</head>
<body>
	<form action="register" method="POST">
	<input type="hidden" name="_token"
	value="<?php echo csrf_token();?> "/>
	Create Username: <input name="username" type="text"><br>
	Create Password: <input name="password" type="password"><br>
	
	<input name="register" value="register" type="submit"><br>
	</form>
<a href="loginpage">Already have an Account? Click Here!</a>


</body>


</html>