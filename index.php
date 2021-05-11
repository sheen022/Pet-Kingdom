<!DOCTYPE html>
<html>
<head>
	<title>PET PET KINGDOM KINGDOM</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/bootstrap-icons.css">
	<link rel="stylesheet" href="style.css">


	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	<link rel="stylesheet" href="font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
</head>
<body>

	<div class="container">
		<div class="login-box">
		<div class="row">
			<div class="col-md-6 login-left">
				<h2>Login Here</h2>
				<form action="validation.php" method="POST">
					<div class="form-group">
					<label>Username</label>
					<input type="text" name="user" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
				<!-- <button type="submit" class="btn btn-primary"> Sign In </button> -->
				</form>
			</div>

				
				<div class="col-md-6 login-right">
				<h2>Register Here</h2>
				<form action="registration.php" method="POST">
					<div class="form-group">
					<label>Username</label>
					<input type="text" name="user" class="form-control" required> 
				</div>
					<div class="form-group">					<label>Password</label>
					<input type="password" name="password" class="form-control" required>
				</div>
					<div class="form-group">					<!-- <label>Gender</label>
					<input type="text" name="gender" class="form-control" required>
				</div>
					<div class="form-group">					<label>Username</label>
					<input type="text" name="username" class="form-control" required>
				</div>
					<div class="form-group">					<label>Password</label>
					<input type="password" name="password" class="form-control" required>
				</div> -->
				<button type="submit" class="btn btn-primary"> Register </button>
				</form>
			</div>







		</div>

	</div>	

</div>
</body>
</html>