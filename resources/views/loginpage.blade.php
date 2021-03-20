<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
<script type="text/css">

</script>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Printerous</title>
	
</head>

<body class="text-center"  style="margin-top:80px; min-height:500px">
<div class="container" style="width: 50%;">
<div class="card">
<div class="card-body">

	<form action="/login/validate" method="post" class="form-signin">
		<!-- <h1 class="h3 mb-3 font-weight-normal">Welcome to Printerous</h1> -->
		<img src="image/printerous_logo2.png" width="50%">
		<h2 class="h2 mb-3 font-weight-normal">Please Log In</h2>

		<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      
		<label for="inputEmail" class="sr-only">Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" required> <br/>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password" required> <br/>

		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>

</div>
</div>
</div>
</body>
</html>