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

					<?php // Edit the loop in /templates/loop. Or roll your own. ?>
					<?php get_template_part( 'templates/loop'); ?>
					
					<?php if( have_rows('press_grid') ): ?>
					
						<div id="inner-spotlight" class="m-all t-all d-all cf">
							
							<h3>Press</h3>
					
						<?php while( have_rows('press_grid') ): the_row(); 
					
							// vars
							$title = get_sub_field('title');
							$link = get_sub_field('link');
							$publication = get_sub_field('publication');
							?>
					
							<div class="grid-item d-1of2 t-1of2 m-all">
								<p><?php echo $publication; ?><br />
					
								<?php if( $link ): ?>
									<a href="<?php echo $link; ?>">
								<?php endif; ?>
					
									<?php echo $title; ?>
					
								<?php if( $link ): ?>
									</a></p>
								<?php endif; ?>
					
							</div>
					
						<?php endwhile; ?>
					
						</div>
					
					<?php endif; ?>

				</main>

		</div>

	</div>



<?php get_footer(); ?>
