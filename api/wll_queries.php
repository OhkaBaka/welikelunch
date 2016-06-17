<?php

// Setting the variables for the live server in an un
if( file_exists( 'local_config.php' ) ) include_once( 'local_config.php');

// These are being set in production in the above "local_config"
if( !isset( $sql_host ) ) $sql_host = "localhost";
if( !isset( $sql_user ) ) $sql_user = "root";
if( !isset( $sql_pass ) ) $sql_pass = "";
if( !isset( $sql_db ) ) $sql_db = "welikelunch";
if( !isset( $email_domains ) ) $email_domains = ['poolsupplyworld.com'];

//
$mysqli = new mysqli($sql_host,$sql_user,$sql_pass,$sql_db);

function get_comments( $eatery ){
	/* validate eatery as integer */

	/* lookup eatery */
	$result = $mysqli->query( "SELECT * FROM wll_eatery WHERE d_email = " . $email .";" );
}

function get_eateries(){}

function add_comment(){}

function add_eatery(){}

function add_diner( $email, $pass1, $pass2, $name ){
	global $email_domains, $mysqli;

	if( $pass1 != $pass2 ){
		return '{ "error":"Passwords do not match" }';
	}

	$pass = md5( $pass1 );

	/* sanitize and validate as email : return error on fail */
	$email = filter_var( trim( $email ), FILTER_VALIDATE_EMAIL );
	if( !$email ) {
		return '{ "error":"An Invalid Email was entered" }';
	}

	/* if address does not match return error */
	$splitAddress = explode( '@', $email );

	if( !in_array( $splitAddress[1], $email_domains ) ) {
		return '{ "error":"The email does not meet requirements." }';
	}

	/* validate name using safe characters : return error on fail */
	if( !filter_var( trim( $name ), FILTER_VALIDATE_REGEXP, array( "options"=>array( "regexp"=>"/^[a-zA-Z0-9 \_\-\.]+$/" ) ) ) ){
		return '{ "error":"The name includes illegal characters." }';
	}

	/* if diner exists return error */
	if( $result = $mysqli->query( "SELECT * FROM wll_diner WHERE d_email = '" . $email ."';" ) ){
	    /* determine number of rows result set */
		if( $result->num_rows ) {
			return '{ "error":"Diner already exists." }';
		}
	} else {
		return '{ "error":"Query Failure." }';
	}
	/* otherwise save the user and return confirmation */
	if ($result = $mysqli->query("INSERT INTO wll_diner SET d_email = '" . $email . "', d_pass='" . $pass . "', d_name='" . $name . "';")) {
		return '{ "success":"Diner was created." }';
	}
	return '{ "error":"No Action Took Place." }';
}

function verify_diner(){}

/* check connection * /
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* return name of current default database * /
if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}

/* return name of current default database * /
if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}

$mysqli->close();
*/