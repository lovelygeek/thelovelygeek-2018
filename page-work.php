<?php
/*
 Template Name: Portfolio Listing
 *
 * This is the template page that shows a grid list of all my portfolio pieces usings the Portfolio shortcode via the Jetpack Portfolio CPT. 
 * 
*/
?>

<?php get_header(); ?>

<div id="all-projects" class="cf">
	<h1>Design Work</h1>
	<div class="wrap">
		<?php echo do_shortcode('[portfolio display_types=false display_content=false display_tags=true columns=3 orderby=rand]'); ?>		
	</div>	
</div>	

<?php get_footer(); ?>