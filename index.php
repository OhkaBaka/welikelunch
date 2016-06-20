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
				#eatery_list { max-height: 500px; overflow-y: auto; }
				#comment_list { max-height: 500px; overflow-y: auto; }

				.comment_text{ font: 14pt helvetica italic bold; display: block; width:100%; }
				.comment_diner{ font: 10pt helvetica ; }
				.comment_date{ font: 8pt helvetica; color: gray; }
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
				<p style="display:none;">This space intentionally left blank, I wasn't planning to put ANYTHING cool in here.</p>
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
						<div id="review" class="tab-pane fade in active">
							<div id="eatery_details"
								<span class="initial_message">Select Eatery from the List</span>
							</div>
							<div id="comment_list"></div>
							<form id="rating_comment_form" class="form-horizontal" >
								<fieldset>
									<legend></legend>
									<input id="eid" name="eid" type="hidden" value="">
									<div class="form-group">
										<label class="col-md-4 control-label" for="email">Email</label>
										<div class="col-md-5"><input id="email" name="email" type="text" placeholder="someone@poolsupplyworld.com" class="form-control input-md" required=""></div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="pass">Password</label>
										<div class="col-md-5"><input id="pass" name="pass" type="password" placeholder="********" class="form-control input-md" required=""></div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="thumbsup">Rating</label>
										<div class="col-md-8">
											<button id="thumbsup" name="thumbsup" class="btn btn-success"><span class="glyphicon glyphicon-thumbsup">Up</button>
											<button id="thumbsdown" name="thumbsdown" class="btn btn-danger"><span class="glyphicon glyphicon-thumbsdown">Down</span></button>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="comment">Comment</label>
										<div class="col-md-5"><textarea class="form-control" id="comment" name="comment"></textarea></div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="add_comment"></label>
										<div class="col-md-5"><button id="add_comment" name="add_comment" class="btn btn-primary">Add Comment</button></div>
									</div>
								</fieldset>
							</form>
						</div>
						<div id="diner" class="tab-pane fade">
							<form id="add_diner_form" class="form-horizontal">
								<fieldset>

									<!-- Form Name -->
									<legend></legend>

									<!-- Text input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="name">Name</label>	
										<div class="col-md-5">
										<input id="d_name" name="d_name" type="text" placeholder="NomNomNom" class="form-control input-md" required="">
											
										</div>
									</div>

									<!-- Text input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="email">Email Address</label>	
										<div class="col-md-5">
										<input id="d_email" name="d_email" type="text" placeholder="someone@poolsupplyworld.com" class="form-control input-md" required="">
											
										</div>
									</div>

									<!-- Password input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="pass1">Password</label>
										<div class="col-md-5">
											<input id="d_pass1" name="d_pass1" type="password" placeholder="" class="form-control input-md">
											
										</div>
									</div>

									<!-- Password input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="pass2">Re-Enter Password</label>
										<div class="col-md-5">
											<input id="d_pass2" name="d_pass2" type="password" placeholder="" class="form-control input-md">
											
										</div>
									</div>

									<!-- Button -->
									<div class="form-group">
										<label class="col-md-4 control-label" for="submit"></label>
										<div class="col-md-5">
											<button id="d_create" name="d_create" class="btn btn-primary">Create</button>
										</div>
									</div>

								</fieldset>
							</form>
						</div>
						<div id="eatery" class="tab-pane fade">

							<form id="add_eatery_form" class="form-horizontal">
								<fieldset>

									<!-- Form Name -->
									<legend></legend>

									<div class="form-group">
										<label class="col-md-4 control-label" for="email">Email</label>
										<div class="col-md-5"><input id="e_email" name="e_email" type="text" placeholder="someone@poolsupplyworld.com" class="form-control input-md" required=""></div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="pass">Password</label>
										<div class="col-md-5"><input id="e_pass" name="e_pass" type="password" placeholder="********" class="form-control input-md" required=""></div>
									</div>

									<!-- Text input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="name">Eatery Name</label>	
										<div class="col-md-5">
										<input id="e_name" name="e_name" type="text" placeholder="" class="form-control input-md" required="">
											
										</div>
									</div>

									<!-- Text input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="address">Address</label>	
										<div class="col-md-5">
										<input id="e_address" name="e_address" type="text" placeholder="" class="form-control input-md" required="">
											
										</div>
									</div>

									<!-- Button -->
									<div class="form-group">
										<label class="col-md-4 control-label" for="create"></label>
										<div class="col-md-5">
											<button id="e_create" name="e_create" class="btn btn-primary">Create</button>
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
									<th class="col-md-1"><span class="glyphicons glyphicons-thumbs-up"></span></span></th>
									<th class="col-md-1"><span class="glyphicons glyphicons-thumbs-down"></span></th>
									<th class="col-md-1"><span class="glyphicons glyphicons-comments"></span></th>
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

			function loadCommentList( eid ){
				$( "#comment_list" ).load( "./api/?func=build_comments&eid=" + eid);
			}

			function loadEatery( eid ){
				$("#eatery_details" ).load( "./api/?func=build_eatery&eid=" + eid );
				$("#eid").val(eid);
				$("#comment").val("");
				loadCommentList( eid );
			}

			$("#rating_comment_form").submit(function(event){
				event.preventDefault();
				submitComment();
			});

			function submitComment(){
				// Initiate Variables With Form Content		
				var email = $("#email").val();
				var pass = $("#pass").val();
				var eid = $("#eid").val();
				var comment = $("#comment").val();
				$.ajax({
					type: "GET",
					url: "api/",
					data: "func=add_comment&eid=" + eid + "&email=" + email + "&pass=" + pass + "&comment=" + comment,
					dataType: 'json',
					success : function(resp){
						if( resp['success']) {
							alert( resp['success'] );
							$('#comment').val("");
							loadEateryList();
							loadEatery( $("#eid").val()  );
						} else {
							alert( resp['error'] );
						}
					}
				});
			}

			$("#thumbsdown").click(function(event){
				event.preventDefault();
				submitRating( 0 );
			});

			$("#thumbsup").click(function(event){
				event.preventDefault();
				submitRating( 5 );
			});

			function submitRating( rating ){
				// Initiate Variables With Form Content		
				var email = $("#email").val();
				var pass = $("#pass").val();
				var eid = $("#eid").val();
				$.ajax({
					type: "GET",
					url: "api/",
					data: "func=add_rating&eid=" + eid + "&email=" + email + "&pass=" + pass + "&rating=" + rating,
					dataType: 'json',
					success : function(resp){
						if( resp['success']) {
							alert( resp['success'] );
							$('#comment').val("");
							loadEateryList();
							loadEatery( $("#eid").val()  );
						} else {
							alert( resp['error'] );
						}
					}
				});
			}

			$("#add_diner_form").submit(function(event){
				event.preventDefault();
				addDiner();
			});

			function addDiner(){
				// Initiate Variables With Form Content		
				var email = $("#d_email").val();
				var pass1 = $("#d_pass1").val();
				var pass2 = $("#d_pass2").val();
				var name = $("#d_name").val();
				$.ajax({
					type: "GET",
					url: "api/",
					data: "func=add_diner&email=" + email + "&pass1=" + pass1 + "&pass2=" + pass2 + "&name=" + name,
					dataType: 'json',
					success : function(resp){
						if( resp['success']) {
							alert( resp['success'] );
						} else {
							alert( resp['error'] );
						}
					}
				});
			}

			$("#add_eatery_form").submit(function(event){
				event.preventDefault();
				addEatery();
			});

			function addEatery(){
				// Initiate Variables With Form Content		
				var email = $("#e_email").val();
				var pass = $("#e_pass").val();
				var name = $("#e_name").val();
				var address = $("#e_address").val();
				$.ajax({
					type: "GET",
					url: "api/",
					data: "func=add_eatery&email=" + email + "&pass=" + pass + "&name=" + name + "&address=" + address,
					dataType: 'json',
					success : function(resp){
						if( resp['success']) {
							alert( resp['success'] );
							loadEateryList();
							$("#e_name").val("");
							$("#e_address").val("");
						} else {
							alert( resp['error'] );
						}
					}
				});
			}
		</script>

	</body>
</html>
