<?php
/*
 Template Name: About
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

	<div id="content">

		<div id="inner-content" class="wrap cf">

				<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				
						<div class="inner-page">
					
							<section class="entry-content cf" itemprop="articleBody">
								
								<?php the_post_thumbnail('', array('class' => 'aligncenter')); ?>				
								
								<?php the_content(); ?>
							
							</section> <?php // end article section ?>
					
							<footer class="article-footer cf">
					
							</footer>
						
						</div>
						
					</article>
				
				<?php endwhile; endif; ?>


				</main>

		</div>

	</div>



<?php get_footer(); ?>
