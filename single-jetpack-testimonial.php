<?php 
/*
 * Jetpack Testimonial Single Post Template
 *
 * This is the custom post type single post template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type call is "register_post_type( 'staff' )",
 * then your template name should be single-staff.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="wrap cf">
			
			<h1 class="entry-title single-title">A few <span class="script">kind words</span> from some lovely clients</h1>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<div class="outer-white-border">
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
						<div id="feat-img" class="d-1of2 t-1of2 m-all">
							<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('');
							} else { ?>
							<img src="http://via.placeholder.com/600">
							<?php } ?>								
						</div>
						<div class="post-content d-1of2 t-1of2 m-all">
							<section class="entry-content cf">
							<?php if ( has_post_format()) { 
							get_template_part( 'format', get_post_format() ); 
							}
							?>
							
							<?php the_content(); ?>
							<h6 itemprop="headline" rel="bookmark">– <?php the_title(); ?></h6> 
							</section>							
						</div>	
					</article>	
				</div>
			
			<?php endwhile; endif; ?>
			
		</div>

	</div>

<?php get_footer(); ?>
