<?php
/*
Plugin Name: Random Post
Plugin URI: http://eyuva.com/random_post
Description: This plugin will display a random post on a particular page.
Author: Hiren Wadhiya
Version: 1.0
Author URI: http://eyuva.com
*/

function random_posts_function(){
 	query_posts(array('orderby' => 'rand', 'showposts' => 1));
	 	if (have_posts()) {
	 		while (have_posts()) {
	 			the_post();	?>

	 			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> 
	 			<?php the_content(); ?>
	 			<?php 
			}
	 	}
	 	wp_reset_query();
	 	return $return_string;
}

function register_shortcodes(){
	add_shortcode('random-post','random_posts_function');
}

add_action('init','register_shortcodes');

?>
