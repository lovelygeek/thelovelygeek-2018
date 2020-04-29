<?php
/*
 Template Name: NEW Studio Page
 *
 * This is the base custom page template. 
 * 
 * Change the "Template Name" at the top and save as page-newname.php and it will
 * show up as a template in the Page Templates drop-down on page edit screens in 
 * the admin. 
 * 
 * Then change it as you need for each page or groups of pages. 
 * 
 * Convenience, look it up.
 * 
 * Remember to keep the markup and content separate. 
 * 
 * For more info: http://codex.wordpress.org/Page_Templates
 * 
 * Visual interactive WordPress template hierarchy: https://wphierarchy.com
*/
?>

<?php get_header(); ?>

<div id="hero-image" class="cf"></div>

<div id="intro-block" class="cf">
	
	<div class="wrap">
		<div class="grid-item d-1of2 t-1of2 m-all">
			<img src="<?php echo get_theme_file_uri(); ?>/library/images/meet-the-designer.jpg" alt="placeholder">	
		</div>
		
		<div class="grid-item d-1of2 t-1of2 m-all">
			<?php the_field('intro_text'); ?>
		</div>
	</div>				
</div>


<div id="services-offered" class="cf">
	<h3>What I Can Do For You</h3>
	<div class="wrap">
		<div id="inner-service-left" class="d-1of2 t-1of2 m-all">
			<?php the_field('left_content'); ?>
		</div>
		
	
		<div id="inner-service-right" class="d-1of2 t-1of2 m-all">
			<?php the_field('right_content'); ?>
		</div>
		
	</div>	
</div>			

<div id="featured-projects" class="cf">
	<div class="wrap">
		<h3>Projects I'm Proud Of</h3>
		<?php echo do_shortcode('[portfolio display_types=false display_content=false display_tags=false columns=3 showposts=6 orderby=rand]'); ?>		
	</div>	
</div>	


<div id="good-fit"  class="cf">
	<div class="wrap">	
		<h5>You might be my client if...</h5>
		
		<div class="grid-item d-1of2 t-1of2 m-all">
			<?php the_field('left_points'); ?>	
		</div>
		
		<div class="grid-item d-1of2 t-1of2 m-all">
			<?php the_field('right_points'); ?>
		</div>
	</div>
</div>	

<div id="book-cta" class="cf">
	<?php the_field('call_to_action'); ?>
</div>	

<div id="from-blog" class="cf">
	<h3>More From The Blog</h3>

	<div class="wrap">
	<?php
	global $post;
	$args = array( 'posts_per_page' => 3, 'order'=> 'DESC', 'category_name' => 'web' );
	$postslist = get_posts( $args );
	foreach ( $postslist as $post ) :
	  setup_postdata( $post ); ?> 
		
			<div class="related-post m-all t-1of3 d-1of3">
				<span class="related-thumb"><?php the_post_thumbnail( 'plate-image-600' ); ?></span>
				<div class="card-bottom"> 
					<h6><?php the_category( ' ' ); ?></h6>
					<h3 class="related-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo wp_html_excerpt( get_the_title(), 45, '...'  ); ?></a></h3>
				</div>	
			</div>   

	<?php
	endforeach; 
	wp_reset_postdata();
	?>
	</div>	
</div>

<?php get_footer(); ?>
