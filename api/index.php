<?php

#welikelunch api

// dBug is the precious... do not trust the fat ugly var_dump, it is tricksy and false
include_once("../dBug.php");
include_once("wll_queries.php");
include_once("wll_structures.php");

$called_func = "none";
if( isset( $_GET['func'] ) ){
	$called_func = $_GET['func'];
}

switch ( $called_func ) {
	case 'add_diner':
		$email = $_GET['email'];
		$pass1 = $_GET['pass1'];
		$pass2 = $_GET['pass2'];
		$name = $_GET['name'];
		print add_diner( $email, $pass1, $pass2, $name );
		break;
	case 'add_eatery':
		$email = $_GET['email'];
		$pass = $_GET['pass'];
		$name = $_GET['name'];
		$address = $_GET['address'];;
		print add_eatery( $email, $pass, $name, $address );
		break;
	case 'add_comment':
		$email = $_GET['email'];
		$pass = $_GET['pass'];
		$eid = $_GET['eid'];
		$comment = $_GET['comment'];;
		print add_comment( $email, $pass, $eid, $comment );
		break;
	case 'add_rating':
		$email = $_GET['email'];
		$pass = $_GET['pass'];
		$eid = $_GET['eid'];
		$rating = $_GET['rating'];;
		print add_comment( $email, $pass, $eid, $rating );
		break;
	case 'build_eatery_list':
		print build_eatery_list();
		break;
	case 'build_comments':
		$eid = $_GET['eid'];
		print build_comments( $eid );
		break;
	case 'build_eatery':
		$eid = $_GET['eid'];
		print build_eatery( $eid );
		break;
	default:
		runTests();
		break;
}








function runTests(){
	//Set Bobby Tables to a variable
	$bobby = 'robert\'); DROP TABLE students;<script>alert(\'Bobby\');</script>';
	// TEST ADD DINER
	print 'Testing add_diner: <br>';
		//Valid
		print add_diner( 'test_' . rand( 10000, 99999 ) . '@poolsupplyworld.com','ocelot','ocelot','Christopher' ) . '<br>';
		//Duplicate
		print add_diner( 'ctrulove@poolsupplyworld.com','ocelot','ocelot','Christopher' ) . '<br>';
		//Bobby Tables Email
		print add_diner( $bobby,'ocelot','ocelot','Christopher' ) . '<br>';
		//Mismatch Passwords
		print add_diner( 'ctrulove@poolsupplyworld.com','ocelot','goat','Christopher' ) . '<br>';
		//Interloper
		print add_diner( 'bob@gravystore.com','ocelot','ocelot','Christopher' ) . '<br>';
		//Bobby Tables Name
		print add_diner( 'ctrulove@poolsupplyworld.com','ocelot','ocelot', $bobby ) . '<br>';

	// TEST ADD EATERY
	print '<br>Testing add_eatery: <br>';
		//Valid
		print add_eatery( 'ctrulove@poolsupplyworld.com', 'ocelot', 'Luncheria_' . rand( 10000, 99999 ) , rand( 1400, 4000 ) . ' E Camelback Road, Phoenix AZ, 85014' ) . '<br>';
		//Duplicate
		print add_eatery( 'ctrulove@poolsupplyworld.com', 'ocelot', 'Chipotle', '1660 E Camelback Rd #185, Phoenix, AZ 85014' ) . '<br>';
		//Bad Password
		print add_eatery( 'ctrulove@poolsupplyworld.com', 'goat', 'Chipotle', '1660 E Camelback Rd #185, Phoenix, AZ 85014' ) . '<br>';
		//Unknown User/Other
		print add_eatery( 'bob@gravystore.com', 'gravy1986', 'Gravy Train', '2210 E Camelback Road, Phoenix AZ, 85014' ) . '<br>';

	// TEST ADD COMMENT
	print '<br>Testing add_comment: <br>';
		//Valid
		print add_comment( 'ctrulove@poolsupplyworld.com', 'ocelot', 2, 'This place is Mecca' ) . '<br>';
		//Empty Comment
		print add_comment( 'ctrulove@poolsupplyworld.com', 'ocelot', 2, '' ) . '<br>';
		//Bobby Tables Comment
		print add_comment( 'ctrulove@poolsupplyworld.com', 'ocelot', 2, $bobby . ' loves this place' ) . '<br>';
		//Bad EID
		print add_comment( 'ctrulove@poolsupplyworld.com', 'ocelot', 2016, 'This place is Mecca' ) . '<br>';
		//Bad Password
		print add_comment( 'ctrulove@poolsupplyworld.com', 'goat', 2, 'This place is Mecca' ) . '<br>';
		//Unknown User/Other
		print add_comment( 'bob@gravystore.com', 'gravy1986', 2, 'This place is Mecca' ) . '<br>';

	// TEST ADD COMMENT
	print '<br>Testing add_rating: <br>';
		//Valid
		print add_rating( 'ctrulove@poolsupplyworld.com', 'ocelot', 2, 5 ) . '<br>';
		//Invalid Rating
		print add_rating( 'ctrulove@poolsupplyworld.com', 'ocelot', 2, 7 ) . '<br>';
		//Bobby Tables Rating
		print add_rating( 'ctrulove@poolsupplyworld.com', 'ocelot', 2, $bobby ) . '<br>';
		//Bad EID
		print add_rating( 'ctrulove@poolsupplyworld.com', 'ocelot', 2016, 5 ) . '<br>';
		//Bad Password
		print add_rating( 'ctrulove@poolsupplyworld.com', 'goat', 2, 5 ) . '<br>';
		//Unknown User/Other
		print add_rating( 'bob@gravystore.com', 'gravy1986', 2, 5 ) . '<br>';

	// TEST GET COMMENTS
	print '<br>Testing get_comments: <br>';
		//Valid
		new dBug( get_comments( 2 ) );
		//invalid
		new dBug( get_comments( 1973 ) );

	// TEST GET COMMENTS
	print '<br>Testing get_eatery_list: <br>';
		//Valid
		new dBug( get_eatery_list( ) );
}
