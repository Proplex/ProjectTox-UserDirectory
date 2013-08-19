<?php

// Start YOURLS engine
require_once( dirname(__FILE__).'/includes/load-yourls.php' );
$page = YOURLS_SITE . '/add.php' ;

// Part to be executed if FORM has been submitted
if ( isset( $_REQUEST['url'] ) && $_REQUEST['url'] != 'http://' ) {

	// Get parameters -- they will all be sanitized in yourls_add_new_link()
	$url     = $_REQUEST['url'];
    $url     = "tox://".$url;
	$keyword = isset( $_REQUEST['keyword'] ) ? $_REQUEST['keyword'] : '' ;
	$title   = isset( $_REQUEST['title'] ) ?  $_REQUEST['title'] : '' ;
	$text    = isset( $_REQUEST['text'] ) ?  $_REQUEST['text'] : '' ;

	// Create short URL, receive array $return with various information
	$return  = yourls_add_new_link( $url, $keyword, $title );
	
	$shorturl = isset( $return['shorturl'] ) ? $return['shorturl'] : '';
	$message  = isset( $return['message'] ) ? $return['message'] : '';
	$title    = isset( $return['title'] ) ? $return['title'] : '';
	$status   = isset( $return['status'] ) ? $return['status'] : '';
	
}

echo "<h1>Tox Directory</h1>\n";

// Part to be executed if FORM has been submitted
if ( isset( $_REQUEST['url'] ) && $_REQUEST['url'] != 'http://' ) {
	
	if( $status == 'success' ) {
        $keyword = "http://users.vexx.us/u/".$keyword;
        echo <<<HTML
		<h2>Added</h2>
        <a href="$keyword">$keyword</a>
HTML;
		
	}

// Part to be executed when no form has been submitted
} else {

		$site = YOURLS_SITE;
		
		// Display the form
		echo <<<HTML
		<form method="post" action="">
		<p><label>Tox ID: <input type="text" class="text" name="url" value="" /></label></p>
		<p><label>(Optional) Custom URL: $site/u/<input type="text" class="text" name="keyword" /></label></p>
        <p><label>Username you'd like to display: <input type="text" class="text" name="title" value="" /></label></p>
		<p><input type="submit" class="button primary" value="Shorten" /></p>
		</form>	
HTML;

}

?>
