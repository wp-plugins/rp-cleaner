<?php 
/**
* Plugin Name: RP cleaner
* Plugin URI: http://rohitchoudhary.in/plugins
* Description: RP cleaner will remove all of the deafult widget comes with the fresh installation of wordpress.
* Author: Rohit Poonia
* Author URI: http://rohitchoudhary.in
* Version: 1.0
* License: GPLv2    
*/

function wdc_clean_dashboard_activity() {
    
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');   // Activity Box
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Right Now
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Recent Comments
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Incoming Links
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Recent Drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
    
}
add_action('wp_dashboard_setup', 'wdc_clean_dashboard_activity');

// Welcome Box
function wdc_my_welcome_panel() {

	?>
<script type="text/javascript">
/* Hide default welcome message */
jQuery(document).ready( function($) 
{
	$('div.welcome-panel-content').hide();
});
</script>

	<div class="custom-welcome-panel-content">
            <h3>  <?php if (is_user_logged_in()) {
            
            $wdc_user = wp_get_current_user();
            date_default_timezone_set('Asia/Calcutta');
            $Hour = date('G');
            
            if ( $Hour >= 5 && $Hour <= 11 ) {
                    
                echo 'Hello and Good Morning ' .$wdc_user->display_name . ' !';
                
                } else if ( $Hour >= 12 && $Hour <= 18 ) {
                    
                echo 'Hello and Good Afternoon ' .$wdc_user->display_name . ' !';    
                    
                    
                } else if ( $Hour >= 19 || $Hours <= 4 ) {
                    
                  echo 'Hello and Good Evening ' .$wdc_user->display_name . ' !';  
                    
                    
                }
            
            
            
        }else{
            
            echo 'Welcome';
            
            
        }
?></h3>
        
	<p class="about-description"><?php _e( 'Here you can place your custom text, give your customers instructions, place an ad or your contact information.' ); ?></p>
	<div class="welcome-panel-column-container">
	<div class="welcome-panel-column">
		<h4><?php _e( "Let's Get Started" ); ?></h4>
		<a class="button button-primary button-hero load-customize hide-if-no-customize" href="http://your-website.com"><?php _e( 'Call me maybe !' ); ?></a>
			<p class="hide-if-no-customize"><?php printf( __( 'or, <a href="%s">edit your site settings</a>' ), admin_url( 'options-general.php' ) ); ?></p>
	</div>
	<div class="welcome-panel-column">
		<h4><?php _e( 'Next Steps' ); ?></h4>
		<ul>
		<?php if ( 'page' == get_option( 'show_on_front' ) && ! get_option( 'page_for_posts' ) ) : ?>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
		<?php elseif ( 'page' == get_option( 'show_on_front' ) ) : ?>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Add a blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
		<?php else : ?>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Write your first blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add an About page' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
		<?php endif; ?>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-view-site">' . __( 'View your site' ) . '</a>', home_url( '/' ) ); ?></li>
		</ul>
	</div>
	<div class="welcome-panel-column welcome-panel-last">
		<h4><?php _e( 'More Actions' ); ?></h4>
		<ul>
			<li><?php printf( '<div class="welcome-icon welcome-widgets-menus">' . __( 'Manage <a href="%1$s">widgets</a> or <a href="%2$s">menus</a>' ) . '</div>', admin_url( 'widgets.php' ), admin_url( 'nav-menus.php' ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-comments">' . __( 'Turn comments on or off' ) . '</a>', admin_url( 'options-discussion.php' ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-learn-more">' . __( 'Learn more about getting started' ) . '</a>', __( 'http://codex.wordpress.org/First_Steps_With_WordPress' ) ); ?></li>
		</ul>
	</div>
	</div>
	<div class="">
	<h3><?php _e( 'If you need more space' ); ?></h3>
	<p class="about-description">Create a new paragraph!</p>
	<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod.
	
	Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Etiam porta sem malesuada magna mollis euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
	</div>
	</div>

<?php
}

add_action( 'welcome_panel', 'wdc_my_welcome_panel' );