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
	<p>A selection of pieces from my design portfolio.<br />Additional work-in-progress can be viewed on <a href="https://dribbble.com/LovelyGeek" title="@LovelyGeek on dribbble"><i class="fab fa-dribbble"></i> dribbble</a> and my code on <a href="https://github.com/lovelygeek" title="@LovelyGeek on GitHub"><i class="fab fa-github"></i> GitHub</a>.</p>
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