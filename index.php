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
				legend { border-width: 0px; }
				#eatery_list { max-height: 500px; }
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

				</div><!--/.navbar-collapse -->
			</div>
		</nav>

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1>WeLikeLunch</h1>
				<p>Display graph of restaurants here using Google visualizations?</p>
			</div>
		</div>

		<div class="container">
			<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-6">

					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#review">Review Eatery</a></li>
						<li><a data-toggle="tab" href="#diner">Add Diner</a></li>
						<li><a data-toggle="tab" href="#eatery">Add Eatery</a></li>
					</ul>

					<div class="tab-content">
						<div id="eatery_review" class="tab-pane fade in active">
							<span class="initial_message">Select Eatery from the List</span>
						</div>
						<div id="diner" class="tab-pane fade">
							<form class="form-horizontal">
								<fieldset>

									<!-- Form Name -->
									<legend></legend>

									<!-- Text input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="name">Name</label>	
										<div class="col-md-5">
										<input id="name" name="name" type="text" placeholder="NomNomNom" class="form-control input-md" required="">
											
										</div>
									</div>

									<!-- Text input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="email">Email Address</label>	
										<div class="col-md-5">
										<input id="email" name="email" type="text" placeholder="someone@poolsupplyworld.com" class="form-control input-md" required="">
											
										</div>
									</div>

									<!-- Password input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="pass1">Password</label>
										<div class="col-md-5">
											<input id="pass1" name="pass1" type="password" placeholder="" class="form-control input-md">
											
										</div>
									</div>

									<!-- Password input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="pass2">Re-Enter Password</label>
										<div class="col-md-5">
											<input id="pass2" name="pass2" type="password" placeholder="" class="form-control input-md">
											
										</div>
									</div>

									<!-- Button -->
									<div class="form-group">
										<label class="col-md-4 control-label" for="submit"></label>
										<div class="col-md-5">
											<button id="submit" name="submit" class="btn btn-primary">Create</button>
										</div>
									</div>

								</fieldset>
							</form>
						</div>
						<div id="eatery" class="tab-pane fade">

							<form class="form-horizontal">
								<fieldset>

									<!-- Form Name -->
									<legend></legend>

									<!-- Text input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="name">Eatery Name</label>	
										<div class="col-md-5">
										<input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">
											
										</div>
									</div>

									<!-- Text input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="address">Address</label>	
										<div class="col-md-5">
										<input id="address" name="address" type="text" placeholder="" class="form-control input-md" required="">
											
										</div>
									</div>

									<!-- Button -->
									<div class="form-group">
										<label class="col-md-4 control-label" for="create"></label>
										<div class="col-md-5">
											<button id="create" name="create" class="btn btn-primary">Create</button>
										</div>
									</div>

								</fieldset>
							</form>
						</div>

					</div>
				</div>
				<div class="col-md-6">
					<div class="table-responsive">
						<table class="table" >
							<thead>
								<tr>
									<th class="col-md-2">Eatery</th>
									<th class="col-md-4">Address</th>
									<th class="col-md-3">Map</th>
									<th class="col-md-1"><span class="halflings halflings-thumbs-up"></span></span></th>
									<th class="col-md-1"><span class="halflings halflings-thumbs-down"></span></th>
									<th class="col-md-1"><span class="halflings halflings-comments"></span></th>
								</tr>
							</thead>
						</table>
						<div id="eatery_list">
						</div>
					</div>
				</div>
			</div>

			<hr>

			<footer>
				<p>&copy; 2016</p>
			</footer>
		</div> <!-- /container -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<script>
			function loadEateryList(){
				$( "#eatery_list" ).load( "./api/?func=build_eatery_list");
			}
			$( function(){
				loadEateryList();
			});

			function loadEatery( $eid ){
				$( "#eatery_review" ).load( "./api/?func=build_eatery&eid=" + $eid );

			}
		</script>

	</body>
</html>
