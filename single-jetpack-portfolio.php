<?php 
/*
 * Custom Post Type Single Post Template
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

			<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
				
						<header class="article-header entry-header">
							
							<?php get_template_part( 'templates/category-tags'); ?>
				
							<h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
				                  
						</header> <?php // end article header ?>
				
				        <section class="entry-content cf" itemprop="articleBody">
				
				        	<?php if ( has_post_format()) { 
				        		get_template_part( 'format', get_post_format() ); 
				        	}
				        	?>
				        
				        	<?php the_content(); ?>
				
				        </section> <?php // end article section ?>
				
						<footer class="article-footer">
				
							<?php the_tags( '<p class="footer-tags tags"><i class="fas fa-tags"></i><span class="tags-title">' . __( '', 'platetheme' ) . '</span> ', ', ', '</p>' ); ?>
							
						</footer> <?php // end article footer ?>
				
					</article> <?php // end article ?>
				
				<?php endwhile; endif; ?>
				
				<div class="post-navigation cf">
					
					<div class="previous_post_link"> <?php previous_post_link('%link', '&larr; Previous Post'); ?> </div> <!--FLOAT LEFT usually points to older entries (toward the end of the set)-->
					<div class="next_post_link"><?php next_post_link('%link','Next Post &rarr;'); ?></div> <!-- FLOAT RIGHT usually points to newer entries (toward the beginning of the set)-->
				
				</div>


			</main>

			<? /* php get_sidebar(); */ ?>

		</div>

	</div>

<?php get_footer(); ?>
