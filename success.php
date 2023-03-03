<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="index.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecCheck</title>
</head>
<body>
  <header>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	 
		<div class="navbar-brand">
			<h1>Home Page</h1>
		</div>
		
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
  
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
	 	<ul class="navbar-nav">
 			<li class="nav-item"><a class="nav-link" href="index.html" target="_blank">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="login.html" target="_blank">Login</a></li>
  			
			
  			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Other</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="index.html" target="_blank">Home</a>
						<a class="dropdown-item" href="index.html" target="_blank">Placeholder</a>
					</div>
		     </li>
		</ul>
		
		<ul class="nav navbar-nav ml-auto w-110 justify-content-end">
 			<li class="nav-item"><a class="nav-link" href="#copyright">Bottom of Page</a></li>
 	    </ul>
	 </div>
	</nav>
  </header>
    <?php
        $fname = $_GET["fname"];
        echo "<h1>Welcome $fname</h1>";
    ?>
    
</body>
</html>