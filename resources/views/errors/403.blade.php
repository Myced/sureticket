<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>403 Unauthorized</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One:900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="/errors/403.css" />

</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>:(</h1>
			</div>
			<h2>403 - Unauthorized Access</h2>
			<p>
				You are trying to access a resource that you don't have permission to. <br>
				You can go back to the home page or logout and login again.
			</p>


			<form  action="{{ route('logout') }}" method="post">
				@csrf
                <a href="/">home page</a>
				<input type="submit" name="logout" value="Logout" class="btn">
			</form>
		</div>
	</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
