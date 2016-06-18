<?php
// Setting the variables for the live server in an undocumented file
if( file_exists( 'local_config.php' ) ) include_once( 'local_config.php');

// These are being set in production in the above "local_config" (the defaults are sufficient for my home environment)
if( !isset( $sql_host ) ) $sql_host = "localhost";
if( !isset( $sql_user ) ) $sql_user = "root";
if( !isset( $sql_pass ) ) $sql_pass = "";
if( !isset( $sql_db ) ) $sql_db = "welikelunch";
if( !isset( $email_domains ) ) $email_domains = ['poolsupplyworld.com'];
//
$mysqli = new mysqli($sql_host,$sql_user,$sql_pass,$sql_db);

// Add a Diner to the system
function add_diner( $email, $pass1, $pass2, $name ){
	global $email_domains, $mysqli;
	if( $pass1 != $pass2 ){
		return '{ "error":"Passwords do not match" }';
	}
	/* MD5 is not the most SECURE secure, but it is enough for this project */
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
		if( $result->num_rows ) return '{ "error":"Diner already exists." }';
	}
	/* otherwise save the user and return confirmation */
	if ($result = $mysqli->query("INSERT INTO wll_diner SET d_email = '" . $email . "', d_pass='" . $pass . "', d_name='" . $name . "';")) {
		return '{ "success":"Diner was created." }';
	}
	return '{ "error":"No Action Took Place." }';
}

// Add a lunch destination to the system
function add_eatery( $email, $pass, $name, $address ){
	global $mysqli;
	//Verify Diner
	$did = verify_diner($email, $pass, true);
	if( !$did ) return verify_diner($email, $pass);

	//Check to see if eatery already exists
	if( $result = $mysqli->query( "SELECT * FROM wll_eatery WHERE e_name = '" . $name . "' AND e_address='" . $address ."';" ) ){
		// Determine number of rows result set, if there are any, fail
		// Address is going to make this messy, I realize, maybe in the future it would use a standardizer
		if( $result->num_rows ) {
			return '{ "error":"Eatery already exists." }';
		} else {
			/* otherwise save the user and return confirmation */
			if ( $result = $mysqli->query( "INSERT INTO wll_eatery SET e_name = '" . $name . "', e_address='" . $address . "';" ) ) {
				return '{ "success":"Eatery was created." }';
			}
			return '{ "error":"Query Error." }';
		}
	}
}

// Add a comment to an eatery
function add_comment( $email, $pass, $eid, $comment ){
	global $mysqli;
	//Verify Diner
	$did = verify_diner($email, $pass, true);
	if( !$did ) return verify_diner($email, $pass);

	//Make sure comment is sanitized and has length
	$comment = filter_var($comment, FILTER_SANITIZE_STRING);
	if( !$comment || $comment == "" ) return '{ "error":"No valid comment found." }';

	// Get the date and time 
	$date = date( 'Y-m-d H:i:s' );

	//Make sure eatery exists
	if( $result = $mysqli->query( "SELECT * FROM wll_eatery WHERE e_id = " . $eid . ";" ) ){

		// Determine if there are rows in the result set
		if( $result->num_rows ) {
			// Save the comment and return confirmation
			if( $result = $mysqli->query( "INSERT INTO wll_comment SET e_id = " . $eid . ", d_id=" . $did . ", c_date = '" . $date . "', c_value = '" . $comment . "' ;" ) ){
				return '{ "success":"Comment was added." }';
			}
			return '{ "error":"Query Error." }';
		}
		return '{ "error":"No eatery found." }';
	}
}

//Add a rating to an eatery
function add_rating( $email, $pass, $eid, $rating ){
	global $mysqli;
	//Verify Diner
	$did = verify_diner($email, $pass, true);
	if( !$did ) return verify_diner($email, $pass);

	//Make sure $eid is an integer
	if( !is_int( $eid ) ) return '{ "error":"Eatery is invalid." }';

	//Make sure rating is an integer
	if( !is_int( $rating ) || $rating < 0 || $rating > 5 ) return '{ "error":"Rating is invalid." }';

	// Get the date and time 
	$date = date( 'Y-m-d H:i:s' );

	//Make sure eatery exists
	if( $result = $mysqli->query( "SELECT * FROM wll_eatery WHERE e_id = " . $eid . ";" ) ){
		// Determine if there are rows in the result set
		if( $result->num_rows ) {
			// Save the comment and return confirmation
			if ( $result = $mysqli->query( "INSERT INTO wll_rating SET e_id = " . $eid . ", d_id = " . $did . ", r_date = '" . $date . "', r_value = " . $rating . " ;" ) ) {
				return '{ "success":"Rating was added." }';
			}
			return '{ "error":"Query Error." }';
		}
		return '{ "error":"No eatery found." }';
	}
}

// Check the Diner and Password for validity, if it fails, check further to see if it is a bad PW
// if did_response is set to true, jusr respond with the d_id or false
function verify_diner( $email, $pass, $did_response=false){
	global $mysqli;
	$pass = MD5($pass);
	/* return name of current default database */
	if( $result = $mysqli->query( "SELECT d_id FROM wll_diner WHERE d_email = '" . $email ."' AND d_pass = '" . $pass . "';" ) ){
		/* determine number of rows result set */
		if( $result->num_rows ) {
			$diner = $result->fetch_row();
			if( $did_response ) return $diner[0];
			return '{ "success":"Diner is validated." }';
		}

		if( $result = $mysqli->query( "SELECT d_id FROM wll_diner WHERE d_email = '" . $email ."';" ) ){
			/* determine number of rows result set */
			if( $result->num_rows ) {
				if( $did_response ) return false;
				return '{ "error":"Password is incorrect." }';
			}
		}
	}
	if( $did_response ) return false;
	return '{ "error":"Query Failure." }';
}

// Get comments into a PHP array
function get_comments( $eid ){
	global $mysqli;
	$comments = array();
	//Make sure $eid is an integer
	if( !is_int( $eid ) ) return '{ "error":"Eatery is invalid." }';

	/* lookup eatery */
	$result = $mysqli->query( "SELECT c_id, d_name, c_date, c_value FROM wll_comment INNER JOIN wll_diner ON wll_comment.d_id = wll_diner.d_id WHERE e_id = " . $eid ." ORDER BY c_date DESC;" );

	while ( $comment_row = mysqli_fetch_row( $result ) ) {
		$comment_object = array();
		$comment_object[ 'cid' ] = $comment_row[0];
		$comment_object[ 'diner' ] = $comment_row[1];
		$comment_object[ 'date' ] = $comment_row[2];
		$comment_object[ 'comment' ] = $comment_row[3];
		$comments[] = $comment_object;
	}
	return $comments;
}

function get_eatery_list(){
	global $mysqli;
	$eateries = array();

	$eatery_list_query = "SELECT e.e_id, e_name, e_address, thumbsdown, thumbsup, commentcount ";
	$eatery_list_query .= "FROM wll_eatery e ";
    $eatery_list_query .= "LEFT JOIN ( ";
	$eatery_list_query .= "	SELECT e_id, SUM(case when r_value = 0 then 1 else 0 end) AS thumbsdown, SUM(case when r_value = 5 then 1 else 0 end) AS thumbsup ";
    $eatery_list_query .= "    FROM wll_rating r2 GROUP BY r2.e_id ";
    $eatery_list_query .= ") r ON e.e_id = r.e_id ";
    $eatery_list_query .= " LEFT JOIN ( ";
	$eatery_list_query .= "	SELECT e_id, count( c_id ) AS commentcount FROM wll_comment c2 GROUP BY c2.e_id ";
	$eatery_list_query .= ") c ON e.e_id = c.e_id ";
    $eatery_list_query .= "ORDER BY thumbsup DESC, commentcount DESC ";

	$result = $mysqli->query( $eatery_list_query );

	while ( $eatery_row = mysqli_fetch_row( $result ) ) {
		$eatery_list_object =  array();
		$eatery_list_object[ 'eid' ] = $eatery_row[0];
		$eatery_list_object[ 'eatery' ] = $eatery_row[1];
		$eatery_list_object[ 'address' ] = $eatery_row[2];
		$eatery_list_object[ 'thumbsdown' ] = $eatery_row[3];
		$eatery_list_object[ 'thumbsup' ] = $eatery_row[4];
		$eatery_list_object[ 'commentcount' ] = $eatery_row[5];
		$eateries[] = $eatery_list_object;
	}
	return $eateries;
}
// $mysqli->close();