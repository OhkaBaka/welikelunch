<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
				body {
						padding-top: 50px;
						padding-bottom: 20px;
				}
		</style>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/main.css">

		<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">We Like Lunch</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<form class="navbar-form navbar-right" role="form">
						<div class="form-group">
							<input type="text" placeholder="Email" class="form-control">
						</div>
						<div class="form-group">
							<input type="password" placeholder="Password" class="form-control">
						</div>
						<button type="submit" class="btn btn-success">Sign in</button>
					</form>
				</div><!--/.navbar-collapse -->
			</div>
		</nav>

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1>Lunch Tracking Thingee</h1>
				<p>Display graph of restaurants here using Google visualizations?</p>
			</div>
		</div>

		<div class="container">
			<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-6">
					<div class="tab" style="display:none" >
						<form class="form-horizontal">
							<fieldset>

								<!-- Form Name -->
								<legend>Create Diner</legend>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="name">Name</label>	
									<div class="col-md-4">
									<input id="name" name="name" type="text" placeholder="NomNomNom" class="form-control input-md" required="">
										
									</div>
								</div>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="email">Email Address</label>	
									<div class="col-md-4">
									<input id="email" name="email" type="text" placeholder="someone@poolsupplyworld.com" class="form-control input-md" required="">
										
									</div>
								</div>

								<!-- Password input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="pass1">Password</label>
									<div class="col-md-4">
										<input id="pass1" name="pass1" type="password" placeholder="" class="form-control input-md">
										
									</div>
								</div>

								<!-- Password input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="pass2">Re-Enter Password</label>
									<div class="col-md-4">
										<input id="pass2" name="pass2" type="password" placeholder="" class="form-control input-md">
										
									</div>
								</div>

								<!-- Button -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="submit"></label>
									<div class="col-md-4">
										<button id="submit" name="submit" class="btn btn-primary">Create</button>
									</div>
								</div>

							</fieldset>
						</form>
					</div>
					<div>
						<h2>Heading</h2>
						<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
						<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
					</div>
				</div>
				<div class="col-md-6">
					<h2>Heading</h2>
					<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
					<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			 </div>
			</div>

			<hr>

			<footer>
				<p>&copy; Company 2015</p>
			</footer>
		</div> <!-- /container -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
