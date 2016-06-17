<?php

#welikelunch api

// dBug is the precious... do not trust the fat ugly var_dump, it is tricksy and false
include_once("../dBug.php");
include_once("wll_queries.php");

//Get all eaterys, formatted for display
//(Should be 2 functions "get" and "display")
function build_list(){}

//Get a single eatery, formatted for display with comments and rating/comment form
//(Should be multiple functions "get" and "display"... potentially "get form" also )
function build_eatery(){}
function build_comments(){}

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
		break;
	case 'add_comment':
		break;
	default:
}

