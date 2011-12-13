<?php
/*
Plugin Name: wpseaUserInfoWidget
Plugin URI: http://wpseattle.com
Description: Example widget that displays a given user's bio
Version: 0.1
Author: WordPress Seattle Meetup Developers
Author URI: http://wpseattle.com
*/

add_action( 'widgets_init', 'wpsea_register_widget');

function wpsea_register_widget() {
    register_widget( 'wpseaUserInfoWidget' );
}

class wpseaUserInfoWidget extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'classname' => 'wpsea_userinfo_widget', // CSS class used on front end
            'description' => 'Display user\'s biographical info'
        );

        parent::__construct( 'wpsea_userinfo_widget', 'WPSea User Info', $widget_ops );
   }

   public function form($instance) {
       $defaults = array( 'ID' => '1' ); // Setup default values if none are supplied
       $instance = wp_parse_args( (array) $instance, $defaults ); // Ensure there are values present

       extract($instance); // Convert all the array keys into variable names

       if(!function_exists('get_users') || !function_exists('get_userdata')) {
           echo "<p>Your version of WordPress is not supported. Please update WordPress and try again.";
       }
?>
        <p>Please select a user to display</p>
       <p>User:
           <select name="<?php echo $this->get_field_name( 'ID' );?>">
<?php
        $users = get_users();
        foreach ( $users AS $u) {
            $selected = ($u->ID == $instance['ID']) ? 'SELECTED': '';
            echo '<option value="' . $u->ID . '" ' . $selected . '>' . $u->display_name . '</option>';
        }
?>
           </select>
       </p>
<?php
   } // end function form()

   public function update($new_instance, $old_instance) {
       $instance = $old_instance; // Backup existing instance

       // Run logic for any updates
       $instance['ID'] = $new_instance['ID'];

       return $instance;
   } // end function update()

   public function widget($args, $instance) {
       extract($args); // Create vars out of widget args

       $u = get_userdata($instance['ID']);
    //   echo '<pre>'; var_dump($u); echo '</pre>';

       echo "<strong>" . $u->display_name . "</strong>";
       echo "<p><span style=\"float: left; margin-right: 5px\">";
       echo get_avatar($u->ID);
       echo "</span>". $u->user_description . "</p>";
   }

} // end class

