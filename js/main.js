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