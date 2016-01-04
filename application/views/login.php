<!doctype html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Login</title>

	<!-- CSS -->
	
	<link rel="stylesheet" href="<?=site_url('assets/css/reset-login.css');?>">
	<link rel="stylesheet" href="<?=site_url('assets/css/animate.css');?>">
	<link rel="stylesheet" href="<?=site_url('assets/css/styles-login.css');?>">
	
</head>

	<!-- Main HTML -->
	
<body>
	
	<!-- Begin Page Content -->
	
	<div id="container">
		<h3 style='color:red;' ><blink><?=@$pesan;?></blink>
		</h3>
		<form method="post" action="<?=site_url('auth/cek_login');?>">
		
		<label for="username">Username:</label>
		
		<input type="name" id="username" name="username">
		
		<label for="password">Password:</label>
		
		
		
		<input type="password" id="password" name="password" >
		
		<div id="lower">
		
		<input type="checkbox"><label class="check" for="checkbox">Keep me logged in</label>
		
		<input type="submit" name="btnlogin" value="Login">
		
		</div>
		
		</form>
		
	</div>
	
	
	<!-- End Page Content -->
	
</body>

</html>
	
	
	
	
	
		
	