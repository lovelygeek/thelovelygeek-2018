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
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>
	
	<div class="wrap">
		<?php echo do_shortcode('[portfolio display_types=false display_content=false display_tags=true columns=2 orderby=rand]'); ?>		
	</div>	
</div>	


<div id="client-list" class="cf">
	
	<div class="wrap">
		<?php the_field('heading_opt_text'); ?>
		<div class="list d-1of4 t-1of2 m-all"><?php the_field('col_1'); ?></div>
		<div class="list d-1of4 t-1of2 m-all"><?php the_field('col_2'); ?></div>
		<div class="list d-1of4 t-1of2 m-all"><?php the_field('col_3'); ?></div>
		<div class="list d-1of4 t-1of2 m-all"><?php the_field('col_4'); ?></div>
	</div>
	
</div>


<div id="book-cta" class="cf">
	<?php the_field('call_to_action'); ?>	
</div>
	
<?php get_footer(); ?>