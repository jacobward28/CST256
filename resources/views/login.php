<html>
<head>
</head>
<body>
	<form action="login" method="POST">
	<input type="hidden" name="_token"
	value="<?php echo csrf_token();?> "/>
	Username: <input name="username" type="text"><br>
	Password: <input name="password" type="password"><br>
	
	<input name="login" value="login" type="submit"><br>
	</form>

<a href="registrationpage">No Account Click Here!</a>
</body>


</html>