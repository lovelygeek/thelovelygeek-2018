<?php
/*
 Template Name: Studio Page
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
					
					<div class="grid-item d-1of2 t-1of2 m-all">
						<img src="http://via.placeholder.com/1000x1000" alt="placeholder">	
					</div>
					
					<div class="grid-item d-1of2 t-1of2 m-all">
						<h3>Hi, I’m Cristina Robinson.</h3>
						<p>I'm a web design expert, a nerd when it comes to WordPress, and my passion is empowering users to have the best digital experience possible. My goal is to make your online presence run like clockwork so you can focus on what you do best.</p>

						<p>Take a peek behind the scenes by checking out some of my work-in-progress on <a href="https://dribbble.com/LovelyGeek"><i class="fab fa-dribbble"></i> dribbble</a> and my code on <a href="https://github.com/lovelygeek/"><i class="fab fa-github"></i> GitHub</a>.</p>
						
						<p class="button"><a href="#">Learn More About Cristina</a></p>
					</div>
					
				</main>
				
				<div id="services-offered" class="m-all t-all d-all cf">
					<h3>What I Can Do For You</h3>
					<div class="d-1of3 t-1of3 m-all">
						<h5>design/development</h5>
						I create custom sites that align with your target audience using WordPress and Squarespace. This ensures I can meet your website needs at any budget. You'll be equipped with a beautiful and functional website that sets you and users up for success.
					</div>
					
					<div class="d-1of3 t-1of3 m-all">
						<h5>social media</h5>
						No matter your business, a solid online presence is key to your credibilty. You know you need to be on social media but maybe you don't have the time to dedicate to regular posts. I can help strategically craft and schedule content with your customer goals in mind.
					</div>

					<div class="d-1of3 t-1of3 m-all">
						<h5>strategy/support</h5>
						Maybe you already have a website but you need help with keeping it maintained. Or perhaps you started to DIY and want to be guided by a professional. From monthly maintenance to site audits and consultations, I'm here to help.
					</div>
						
				</div>
				
				<div id="featured-projects" class="m-all t-all d-all cf">
					<h3>Projects I'm Proud Of</h3>
					<?php echo do_shortcode('[portfolio display_types=true display_content=false display_tags=false columns=3 showposts=8 orderby=title]'); ?>
				</div>
				
				<div id="good-fit"  class="m-all t-all d-all cf">
					
					<h3>You might be my client if...</h3>
					
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

	</div>
	



<?php get_footer(); ?>
