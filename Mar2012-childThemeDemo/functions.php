<?php

/* Remember that this file will be processed before the parent's functions.php */


/* 
 * So, if we want to remove a filter (or action, or style/script, etc) that the parent theme adds, we have to do two things:
 * 1) Hook into a action that runs *after* the parent's add_action is executing
 * 2) Remove the filter while inside that hook's callback function
 */
 
//remove_filter( 'excerpt_length', 'twentyeleven_excerpt_length' );	// This won't work, because this statement is being executed *before* the add_filter() statement in twentyeleven/functions.php

/*
function ctdemo_removeExcerptFilter()
{
	remove_filter( 'excerpt_length', 'twentyeleven_excerpt_length' );	// This works, because it's executed after the parent's add_filter() statement
}
add_action( 'init', 'ctdemo_removeExcerptFilter' );
*/



/*
 * Loading jQuery from Google's CDN instead of the local server
 */
/*
function ctdemo_registerScripts()
{
    wp_deregister_script( 'jquery' );
    wp_register_script(
		'jquery',
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',
		array(),
		'1.7.1',
		true	// most scripts should be included just before </html> for performance
	);
		
    wp_enqueue_script( 'jquery' );
}    
add_action( 'wp_enqueue_scripts', 'ctdemo_registerScripts', 11 );	// The third parameter is the priority. The default is 10, so using 11 will make this run after most theme's have called it.
*/

?>