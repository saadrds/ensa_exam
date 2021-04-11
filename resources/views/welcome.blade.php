@if(session()->has('username')) 
  <script>window.location = "/login";</script>
@endif
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ensa Surveilllance</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="/css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<div class="logoensa image-holder">
					<img src="img/registration-form-4.jpg" alt="ensas">
				</div>
				
				<form action="login" method="post" id="form1">
				@csrf
					<h3 class="mb-4">Sign Up</h3>
					<br><br><br>
					<div class="form-holder active">
						<input type="text" placeholder="username" name="username" class="form-control">
					</div>
					<div class="form-holder">
						<input type="password" placeholder="Password" name="password" class="form-control" style="font-size: 15px;">
					</div>
					<br><br>
					<div class="form-login mt-4">
						<button type="submit" form="form1" value="Submit" class="mt-4">Login</button>
						
					</div>
					@if(@isset($msg))
					<br>
					<div style="color:red; margin-left:50px;">{{$msg}}</div>
					@endif
					<div>

					</div>
				</form>
			</div>
		</div>

		<script src="/js/jquery-3.3.1.min.js"></script>
		<script src="/js/main.js"></script>
	</body>
</html>