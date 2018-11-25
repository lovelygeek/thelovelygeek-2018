<?php
/*
 Template Name: Shop Page
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
					
					<?php if( have_rows('shop_layout') ):
					
						while ( have_rows('shop_layout') ): the_row();
							
							if( get_row_layout() == 'shop_category_heading' ):
					
								include 'templates/shop-heading.php';
					
							elseif( get_row_layout() == 'shop_products' ):
					
								include 'templates/shop-products.php';
					
							endif;
					
						endwhile;
					
					endif;?>	

				</main>

		</div>

	</div>

<?php get_footer(); ?>