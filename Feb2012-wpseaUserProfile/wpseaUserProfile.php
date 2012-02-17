<?php
/*
 Plugin Name: wpseaUserProfile
 Plugin URI: http://wpseattle.com
 Description: Plugin to update and extend WordPress user profiles. Used in http://www.meetup.com/SeattleWordPressMeetup/events/48917872/
 Version: 0.1
 Author: Ben Lobaugh
 Author URI: http://ben.lobaugh.net
 */


//
// Add a single text field for Twitter handle
//
add_filter( 'user_contactmethods', 'wpsea_setup_user_profile' );

function wpsea_setup_user_profile( $user_contactmethods ) {
    //echo '<pre>'; print_r($user_contactmethods); echo '</pre>';
    
    // Remove unused contact methods
    unset( $user_contactmethods['aim'] );
    unset( $user_contactmethods['yim'] );
    unset( $user_contactmethods['jabber'] );
    
    // Add Twitter contact method
    $user_contactmethods['twitter'] = 'Twitter handle (no @)';
    
    return $user_contactmethods;
}



//
//  Add content to a post on front end
//
add_filter( 'the_content', 'wpsea_post_user_profile' );

function wpsea_post_user_profile( $content ) {
    
    if( !is_singular( 'post' ))
        return $content;
    
    $id = get_the_author_meta( 'ID' );

    $s = '<div id="author-bio" style="border: 1px dotted #000; padding: 5px">';
    
    // Author gravatar
    $s .= '<div id="author-avatar" style="float:left; margin-right: 10px">' . get_avatar( $id, '150' ) . "</div>";
    
    // Author info
    $s .= '<div id="the-author-info" style="text-align:left; width: 100%">';
    
        if( $url = get_the_author_meta( 'user_url' )) {
            $s .= '<strong><a href="' . $url . '">' . get_the_author() . '</a></strong>';
        } else {
            $s .= '<strong>' . get_the_author() . '</strong>';
        }
        
        $s .= '<p>' . get_the_author_meta( 'description' ) . '</p>';
        
        $s .= '<a href="' . get_author_posts_url( $id ) . '">All posts by ' . get_the_author() . '</a>';
        $s .= '<br/><a href="http://twitter.com/' . get_the_author_meta( 'twitter' ) . '">Follow ' . get_the_author() . ' on Twitter</a>';
    
    $s .= '</div>';
    
    
    $s .= '</div>';
    
    return $content . $s;
 }