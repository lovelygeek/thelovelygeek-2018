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
	

<div id="values" class="cf">
	<div class="wrap">
		<h3>Values I <span class="script">believe</span> in</h3>
		<p>The way I operate is simple: be a decent human being. Everyone is welcome here.</p>
		<div class="d-1of6 t-1of3 m-1of3"><img src="<?php echo get_theme_file_uri(); ?>/library/images/icon-science.svg" alt="science is real"><h5>science</h5><p>is real</p></div>
		<div class="d-1of6 t-1of3 m-1of3"><img src="<?php echo get_theme_file_uri(); ?>/library/images/icon-blm.svg" alt="black lives matter"><h5>black</h5><p>lives matter</p></div>
		<div class="d-1of6 t-1of3 m-1of3"><img src="<?php echo get_theme_file_uri(); ?>/library/images/icon-lgbtq.svg" alt="love is love"><h5>love</h5><p>always wins</p></div>
		<div class="d-1of6 t-1of3 m-1of3"><img src="<?php echo get_theme_file_uri(); ?>/library/images/icon-womxn.svg" alt="pro choice"><h5>women's</h5><p>rights are human rights</p></div>
		<div class="d-1of6 t-1of3 m-1of3"><img src="<?php echo get_theme_file_uri(); ?>/library/images/icon-liberty.svg" alt="humans are not illegal"><h5>humans</h5><p>are not illegal</p></div>
		<div class="d-1of6 t-1of3 m-1of3"><img src="<?php echo get_theme_file_uri(); ?>/library/images/icon-kindness.svg" alt="kindness matters"><h5>kindness</h5><p>is everything</p></div>
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


<div id="top-three" class="cf">
	<div class="wrap">
		<?php the_field('top_three_intro'); ?>
		
		<div class="d-1of3 t-1of3 m-all">
			<h5><?php the_field('first_col_header'); ?></h5>
			<?php 
			$image = get_field('first_col_feat_img');
			if( !empty( $image ) ): ?>
			    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			<?php endif; ?>
			<div class="inner-card"><?php the_field('first_col'); ?></div>
		</div>
		<div class="d-1of3 t-1of3 m-all">
			<h5><?php the_field('middle_col_header'); ?></h5>
			<?php 
			$image = get_field('middle_col_feat_img');
			if( !empty( $image ) ): ?>
			    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			<?php endif; ?>
			<div class="inner-card"><?php the_field('middle_col'); ?></div>
		</div>
		<div class="d-1of3 t-1of3 m-all">
			<h5><?php the_field('last_col_header'); ?></h5>
			<?php 
			$image = get_field('last_col_feat_img');
			if( !empty( $image ) ): ?>
			    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			<?php endif; ?>
			<div class="inner-card"><?php the_field('last_col'); ?></div>
		</div>										
		<div class="d-all t-all m-all"><p class="button"><a href="<?php echo home_url(); ?>/blog">View the blog</a></p></div>
	</div>
	
		
</div>

<div id="fun-facts" class="cf">

	<div class="wrap">
		
		<h5>A few fun facts about me</h5>

		<div class="d-1of4 t-1of2 m-1of2">
			<img src="<?php echo get_theme_file_uri(); ?>/library/images/icon-flute.svg" alt="flute" class="flute">
			<p><?php the_field('fact_1'); ?></p>
		</div>
		
		<div class="d-1of4 t-1of2 m-1of2">
			<img src="<?php echo get_theme_file_uri(); ?>/library/images/icon-vader.svg" alt="darth vader">
			<p><?php the_field('fact_2'); ?></p>
		</div>

		<div class="d-1of4 t-1of2 m-1of2">
			<img src="<?php echo get_theme_file_uri(); ?>/library/images/icon-doxie.svg" alt="doxie" class="doxie">
			<p><?php the_field('fact_3'); ?></p>
		</div>
		
		<div class="d-1of4 t-1of2 m-1of2">
			<img src="<?php echo get_theme_file_uri(); ?>/library/images/icon-spiritual.svg" alt="moon stars">
			<p><?php the_field('fact_4'); ?></p>
		</div>		
		
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
<h2>Ready to work with me?</h2>
<p>Get in touch to schedule your complimentary 15 minute discovery call.</p>
<div class="wrap"><a href="<?php echo home_url(); ?>/services/" class="button">View My Services</a> <span class="script">or</span> <a href="<?php echo home_url(); ?>/services/contact/" class="button">Inquire Now</a></div>		
</div>


<?php get_footer(); ?>
