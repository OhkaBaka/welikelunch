<?php

// These are being set in production, but not in the demo code.
if( !isset($sql_host) ) $sql_host = "";
if( !isset($sql_user) ) $sql_user = "";
if( !isset($sql_pass) ) $sql_pass = "";
if( !isset($sql_db) ) $sql_db = "";
if( !isset($email_domains) ) $email_domains = ['trulove.cc','poolsupplyworld.com'];

//
$mysqli = new mysqli($sql_host,$sql_user,$sql_pass,$sql_db);

function getComments( $eatery ){
	/* validate eatery as integer */

	/* lookup eatery */
	$result = $mysqli->query( "SELECT * FROM wll_eatery WHERE d_email = " . $email .";" );
}

function getEateries(){}

function addComment(){}

function addEatery(){}

function addDiner( $email, $pass1, $name ){
	/* sanitize and validate as email : return error on fail*/
	$email = filter_var( trim( $email ), FILTER_VALIDATE_EMAIL );
	if( !$email ) {
		return '{ "error":"An Invalid Email was entered" }';
	}

	/* if address does not match return error */
	$splitAddress = explode( '@', $email );
	if( in_array( $splitAddress[1], $email_domains ) ) {
		return '{ "error":"The email does not meet requirements." }';
	}

	/* if diner exists return error */
	$result = $mysqli->query( "SELECT * FROM wll_diner WHERE d_email = " . $email .";" );
	if( mysqli_num_rows( $result ) ) {
		return '{ "error":"Diner already exists." }';
	}

	/* otherwise save the user and return confirmation */
	if ($result = $mysqli->query("SELECT DATABASE()")) {
		$row = $result->fetch_row();
		printf("Default database is %s.\n", $row[0]);
		$result->close();
		return '{ "error":"Diner was created." }';
	}

}

function verifyDiner(){}

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* return name of current default database */
if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}

/* return name of current default database */
if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}

$mysqli->close();