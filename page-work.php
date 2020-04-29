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
			<h5>Meet the Designer</h5>
			<h3>Hi, I’m Cristina Robinson.</h3>
			<p>I'm a web design expert, a nerd when it comes to WordPress, and my passion is empowering users to have the best digital experience possible. My goal is to make your online presence run like clockwork so you can focus on what you do best.</p>
	
			<p>Take a peek behind the scenes by checking out some of my work-in-progress on <a href="https://dribbble.com/LovelyGeek"><i class="fab fa-dribbble"></i> dribbble</a> and my code on <a href="https://github.com/lovelygeek/"><i class="fab fa-github"></i> GitHub</a>.</p>
			
			<p class="button"><a href="<?php echo home_url(); ?>/about/">Learn More About Cristina</a></p>
		</div>
	</div>				
</div>


<div id="services-offered" class="cf">
	<h3>What I Can Do For You</h3>
	<div class="wrap">
		<div id="inner-service-left" class="d-1of2 t-1of2 m-all">
			<h5>Web Design + Development</h5>
			<p>Whether you're starting from scratch or giving your current site a refresh, I can create a custom site that aligns with your target audience using WordPress or Squarespace. This ensures I can meet your website needs at any budget. You'll be equipped with a beautiful and functional website that sets you and users up for success.</p>
			<p style="text-align:center;"><a href="<?php echo home_url(); ?>/studio/contact/" class="button">I wanna launch my site!</a></p>
		</div>
		
	
		<div id="inner-service-right" class="d-1of2 t-1of2 m-all">
			<h5>Creative Strategy + Support</h5>
			<p>Maybe you already have a website but you need help with keeping it maintained. Perhaps you started to DIY and want to be guided by a professional. Or it could be that you simply don’t have time to do <em>all the things</em>. From monthly maintenance to creative service retainers, I'm here to help.</p>
			<p style="text-align:center;"><a href="<?php echo home_url(); ?>/studio/contact/" class="button">Yep. I need help!</a></p>
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
			<p>You believe your users needs > your personal design preferences</p>
			<p>You’re passionate about your business</p>
			<p>You don’t want to simply copy what everyone else is doing</p>	
		</div>
		
		<div class="grid-item d-1of2 t-1of2 m-all">
			<p>You’re excited about giving your users the best digital experience</p>
			<p>You’re done taking the cheap and quick route</p>
			<p>You’re ready to invest in your online presence</p>	
		</div>
	</div>
</div>	

<div id="book-cta" class="cf">
	<h4>Work With The Lovely Geek</h4>
	<h2>Let's make some magic!</h2>
	<p style="text-align:center;"><a href="<?php echo home_url(); ?>/studio/contact/" class="button">Inquire Now</a></p>
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
