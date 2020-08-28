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


<div id="about-extended" class="cf">
	<div class="wrap">
		<h3>It all <span class="script">started</span> in high school…</h3>
		<div class="aboutText"><?php the_field('about_extended'); ?></div>
	</div>		
</div>		
	


<div id="experience" class="cf">

	<div class="wrap">
		
		<h5>Some of my previous experience</h5>

		<div class="d-1of4 t-1of2 m-1of2">
			<img src="<?php echo get_theme_file_uri(); ?>/library/images/logo-t29.svg" alt="Three29">
			<p>Lead Designer<br />2015-2019</p>
		</div>
		
		<div class="d-1of4 t-1of2 m-1of2">
			<img src="<?php echo get_theme_file_uri(); ?>/library/images/logo-digitalgear.svg" alt="Digital Gear" class="dg">
			<p>Lead Web Designer<br />2011-2015</p>
		</div>

		<div class="d-1of4 t-1of2 m-1of2">
			<img src="<?php echo get_theme_file_uri(); ?>/library/images/logo-aisac.svg" alt="The Art Instutite of California - Sacramento">
			<p>Bachelor of Science<br />Web Design & Interactive Media</p>
		</div>
		
		<div class="d-1of4 t-1of2 m-1of2">
			<img src="<?php echo get_theme_file_uri(); ?>/library/images/logo-intel.svg" alt="Intel">
			<p>Assistant Web Master<br />2005</p>
		</div>		
		
	</div>

</div>


<div id="awards-press" class="cf">
	<div class="wrap">
		<h3>Awards & Press</h3>
		
		<div class="d-1of2 t-1of-2 m-all"><?php the_field('left_col'); ?></div>
		<div class="d-1of2 t-1of-2 m-all"><?php the_field('right_col'); ?></div>
	</div>		
</div>	


<div id="six-col-block" class="cf">
	
	<div class="wrap">
		<?php the_field('heading_opt_text'); ?>
		
		<div class="d-1of6 t-1of3 m-1of3"><?php the_field('col_1'); ?></div>
		<div class="d-1of6 t-1of3 m-1of3"><?php the_field('col_2'); ?></div>
		<div class="d-1of6 t-1of3 m-1of3"><?php the_field('col_3'); ?></div>
		<div class="d-1of6 t-1of3 m-1of3"><?php the_field('col_4'); ?></div>
		<div class="d-1of6 t-1of3 m-1of3"><?php the_field('col_5'); ?></div>
		<div class="d-1of6 t-1of3 m-1of3"><?php the_field('col_6'); ?></div>		
	</div>	

</div>


<div id="book-cta" class="cf">
	<?php the_field('call_to_action'); ?>	
</div>


<?php get_footer(); ?>
