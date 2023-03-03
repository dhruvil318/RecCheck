<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset = "UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="index.css">
		<link rel="stylesheet" href="signup.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<title>Log In</title>
	</head>

	<body>
		<header>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
				<div class="navbar-brand">
					<a class="nav-link" href="index.html">RecCheck</a>
				</div>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>  
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">More</a>
								<div class="dropdown-menu">
									<a class="dropdown-item">Calendar</a>
									<a class="dropdown-item">Planner</a>
									<a class="dropdown-item">Equipment</a>
								</div>
						</li>
					</ul>
					
					<ul class="nav navbar-nav ml-auto w-110 justify-content-end">
						<li class="nav-item"><a class="nav-link" href="login.html">Log In</a></li>
						<li class="nav-item"><a class="nav-link" href="signup.html">Sign Up</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<?php
			$user = $_POST["username"];
			$pwd = $_POST["password"];
			$hashed_pwd = hash("sha256", "$pwd");

			$conn = new mysqli("reccheckdb.ctrhgcjnjceq.us-east-1.rds.amazonaws.com", "team17", "mIqmpqkB4McGexJiD7lV","reccheck");
			if(!$conn->ping()){
				echo "<script>alert(Error connecting to database);</script>";
			}

			$result = $conn->query("SELECT * FROM members WHERE username = '$user'");
			if($result->num_rows == 1){
				$row = $result->fetch_row();
				$first_name = $row[1];
				$last_name = $row[2];
				$stored_pwd = $row[4];
				
				if($stored_pwd == $hashed_pwd){
					header("location: success.php?first_name=$first_name&last_name=$last_name");
				}
				else{
					echo "<script>alert('Incorrect password');</script>";
				}
			}
			else{
				echo "<script>alert('Username does not exist');</script>";
			}
		?>
		<main>
			<h1>Log In</h1>
			<form method="post" action="login.php">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" required>
				
				<label for="password">Password</label>
				<input type="password" name="password" id="password" required>
				
				<input type="submit" value="Log In">
			</form>
		</main>
		
		<footer class="container-fluid">
			<div class="row">
				<div class="col-sm">
					<p id = "copyright">&copy; Copyright 2023 RecCheck</p>
				</div>	
			</div>
		</footer>
	</body>
</html>