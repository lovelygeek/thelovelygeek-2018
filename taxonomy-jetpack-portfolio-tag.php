<?php
/*
 * Jetpack Portfolio Tag Taxonomy Templatate
 *
 * This is the custom post type taxonomy template. If you edit the custom taxonomy name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom taxonomy is called "register_taxonomy('shoes')",
 * then your template name should be taxonomy-shoes.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates#Displaying_Custom_Taxonomies
*/
?>

<?php get_header(); ?>



<div id="pp-archive" class="cf">
	
<?php

the_archive_title( '<h1 class="page-title">', '</h1>' );

// Not all themes show these but you can if you want to
the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>	
	
	
	<div class="wrap">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" class="d-1of2 t-1of2 m-all cf pp" role="article">
			<div class="outer-white-border">
				<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('plate-img-600');
				} else { ?>
				<img src="http://via.placeholder.com/600">
				<?php } ?>	
				<div class="inner-card">
					<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo wp_html_excerpt( get_the_title(), 40, '...'  ); ?></a></h3>
					<?php the_terms( $post->ID, 'jetpack-portfolio-tag', ' ', ', ' ); ?>		
				</div>	
			</div>
		</article>
		<?php endwhile; endif; ?>
		
	</div>
		
</div>

<?php get_footer(); ?>