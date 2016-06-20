<?php

//Get all eaterys, formatted for display
function build_eatery_list(){
	$eatery_data = get_eatery_list();
	$eatery_table = "";

	foreach($eatery_data as $eatery){
		$eatery_row = '<tr data-eid="' . $eatery['eid'] . '"><td class="col-md-3 eatery_link" onclick="loadEatery(\'' . $eatery['eid'] . '\');">' . htmlentities( $eatery['eatery'] ) . '</td>';
		$eatery_row .= '<td class="col-md-3">' . htmlentities( $eatery['address'] ) . '</td>';
		$eatery_row .= '<td class="col-md-2">' . $eatery['suggester'] . '</td>';
		$eatery_row .= '<td class="col-md-2"><a target="_blank" href="https://www.google.com/maps/search/' . urlencode( $eatery['address'] ) . '">';
		$eatery_row .= '<img src="http://maps.googleapis.com/maps/api/staticmap?markers=color:blue|' . urlencode( $eatery['address'] ) . '&markers=color:yellow|2005+E+Indian+School+Rd+Ste+100,+Phoenix,+AZ+85016&size=100x100&key=ABQIAAAAvwR4dZG84g_plzGO1oAx9BRFvf734m_1IckaSObe5rel7hil9RR9SqeNV8FaFxAHjh75woIeU0g4vQ"></a></td>';
		$eatery_row .= '<td class="success col-md-1">' . $eatery['thumbsup'] . '</td>';
		$eatery_row .= '<td class="danger col-md-1">' . $eatery['thumbsdown'] . '</td>';
		$eatery_row .= '<td class="comments col-md-1">' . $eatery['commentcount'] . '</td></tr>';
		$eatery_table .= $eatery_row;
	}
	$eatery_table = "<table class='table table-striped table-hover table-condensed eatery-table' >" . $eatery_table . "</table>";
	return $eatery_table;
}

// Build a single eatery, formatted for display with comments and rating/comment form
// Build comments in a secondary function
function build_eatery( $eid ){
	$eatery=get_eatery_list( $eid );
	$eatery=$eatery[0];

	$eatery_info_code = '<div id="eateryabout">';
	$eatery_info_code .= '	<span class="eateryname">' . htmlentities($eatery['eatery']) . '</span>';
	$eatery_info_code .= '	<a class="eateryaddress" target="_blank" href="http://maps.google.com/maps/search/' . urlencode($eatery['address']) . '">' . htmlentities($eatery['address']) . '<br>';
	$eatery_info_code .= '		<img src="http://maps.googleapis.com/maps/api/staticmap?markers=color:blue|' . urlencode($eatery['address']) . '&markers=color:yellow|2005+E+Indian+School+Rd+Ste+100,+Phoenix,+AZ+85016&size=300x300&key=ABQIAAAAvwR4dZG84g_plzGO1oAx9BRFvf734m_1IckaSObe5rel7hil9RR9SqeNV8FaFxAHjh75woIeU0g4vQ">';
	$eatery_info_code .= '	</a>';
	$eatery_info_code .= '	<span class="suggested">suggested by ' . $eatery['suggester'] . '</span>';
	if( $eatery['uplist'] != "") $eatery_info_code .= '	<span class="thumbsuplist">Liked By:' . $eatery['uplist'] . '</span>';
	if( $eatery['downlist'] != "") $eatery_info_code .= '	<span class="thumbsdownlist">Disliked By:' . $eatery['downlist'] . '</span>';
	$eatery_info_code .= '</div>';

	return $eatery_info_code ;
}

function build_comments( $eid){
	$comment_data = get_comments( $eid );
	$comment_table = "";
	foreach($comment_data as $comment){
		$comment_row = '<tr data-cid="' . $comment['cid'] . '"><td class="col-md-8">';
		$comment_row .= '<span class="comment_text">' . $comment['comment'] . '</span>';
		$comment_row .= '<span class="comment_diner">' . $comment['diner'] . '</span>';
		$comment_row .= '<span class="comment_date">' . $comment['date'] . '</span>';
		$comment_row .= '</td>';
		$comment_table .= $comment_row;
	}
	$comment_table = "<table class='table table-striped table-hover table-condensed comment-table' >" . $comment_table . "</table>";
	return $comment_table;
}
?>