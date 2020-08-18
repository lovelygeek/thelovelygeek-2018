<?php
/*
 Template Name: Services Page
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

<div id="services-block" class="cf">
	<h1>Services</h1>
	<p>Strategic website design and development plus additional support for your digital needs.</p>
	
	<div class="wrap">
		
		<div class="d-1of2 t-1of2 m-all">
			<div class="outer-white-border">
				<img src="https://via.placeholder.com/600x420" alt="placeholder">
				<div class="inner-card">
					<h3>Web Design & Development</h3>	
					<p>Whether you’re starting from scratch or giving your current site a refresh, I can create a custom site that aligns with your target audience using WordPress or Squarespace. This ensures I can meet your website needs at any budget. You’ll be equipped with a beautiful and functional website that sets you and your users up for success.</p>
					<h6>Investment Begins At</h6>
					<p><span class="numerals">$2,000</span></p>
					<p class="button"><a href="#">Learn More</a></p>				
				</div>	
			</div>
		</div>
		
	
		<div class="d-1of2 t-1of2 m-all">
			<div class="outer-white-border">
				<img src="https://via.placeholder.com/600x420" alt="placeholder">
				<div class="inner-card">	
					<h3>Creative Retainer Packages</h3>
					<p>Maybe you already have a website but you need help with keeping it maintained. Perhaps you started to DIY and want to be guided by a professional. Or it could be that you simply don’t have time to do all the things. My monthly creating retainer packages are the perfect solution for businesses that have ongoing design and marketing needs.</p>
					<h6>Investment Begins At</h6>
					<p><span class="numerals">$300/</span> MONTH</p>
					<p class="button"><a href="#">Learn More</a></p>
				</div>	
			</div>
		</div>
		
	</div>
		
</div>			


<div id="six-col-block" class="cf">
	
	<div class="wrap">
		
		<h3>Additional Offerings</h3>
		<p>Here are a few other things I can do either on an hourly basis or as part of my retainer packages.</p>
		
		<div class="d-1of6">
			<ul>
				<li>App Design</li>
				<li>Business Cards</li>
				<li>Digital Ad Design</li>
			</ul>	
		</div>
		<div class="d-1of6">
			<ul>
				<li>App Design</li>
				<li>Business Cards</li>
				<li>Digital Ad Design</li>
			</ul>	
		</div>	
		<div class="d-1of6">
			<ul>
				<li>App Design</li>
				<li>Business Cards</li>
				<li>Digital Ad Design</li>
			</ul>	
		</div>	
		<div class="d-1of6">
			<ul>
				<li>App Design</li>
				<li>Business Cards</li>
				<li>Digital Ad Design</li>
			</ul>	
		</div>	
		<div class="d-1of6">
			<ul>
				<li>App Design</li>
				<li>Business Cards</li>
				<li>Digital Ad Design</li>
			</ul>	
		</div>	
		<div class="d-1of6">
			<ul>
				<li>App Design</li>
				<li>Business Cards</li>
				<li>Digital Ad Design</li>
			</ul>	
		</div>			
	</div>	

</div>


<div id="featured-projects" class="cf">
	<div class="wrap">
		<h3>Featured Design Work</h3>
		<?php echo do_shortcode('[portfolio display_types=false display_content=false display_tags=false columns=3 showposts=3 orderby=rand]'); ?>	
		<p class="button"><a href="#">View More Work</a></p>	
	</div>	
</div>		


<div id="good-fit"  class="cf">
	<div class="wrap">	
		<h5>You might be my client if...</h5>
		
		<div class="grid-item d-1of2 t-1of2 m-all">
			<?php the_field('left_points'); ?>	
		</div>
		
		<div class="grid-item d-1of2 t-1of2 m-all">
			<?php the_field('right_points'); ?>
		</div>
	</div>
</div>

<div id="kind-words" class="cf">
	<div class="wrap">
		<h3>A few <span class="script">kind words</span> from some lovely clients</h3>
		<?php echo do_shortcode('[testimonials columns=1 showposts=1 display_content=full orderby=rand]'); ?>	
	</div>	
</div>		

<?php get_footer(); ?>
