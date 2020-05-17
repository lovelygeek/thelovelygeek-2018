<?php
/*
 Template Name: Web Design Detail Page
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
					
				</main>

		</div>

	</div>
	

	<div id="available-packages" class="cf">
		
		<?php the_field('available_packages'); ?>
		
		<div class="wrap"> 
			<div class="d-1of2 t-1of2 m-all">
				<div class="package">
					<div class="inner-package">
						<?php the_field('package_col_1'); ?>
					</div>
				</div>		
			</div>	

			<div class="d-1of2 t-1of2 m-all">
				<div class="package">
					<div class="inner-package">
						<?php the_field('package_col_2'); ?>
					</div>
				</div>		
			</div>
				
		</div>														

	</div>
	
	
	<div id="creative-process" class="cf">
		<h3>The Creative Process</h3>
		<div class="wrap">
			
			<div class="outer-stage d-1of2 t-1of2 m-all">
				<div class="stage">
					<h5>Discovery</h5>	
					<p>You’ll fill out a detailed questionnaire which we’ll review in a discovery call. We’ll discuss your goals/needs and learn about your target audience. We’ll map out your site in the form of a site architecture and develop a strategy for content.</p>
				</div>	
			</div>
			
			<div class="outer-stage d-1of2 t-1of2 m-all last-col">
				<div class="stage">
					<h5>Design</h5>	
					<p>Next we’ll move into wireframes where we establish content placement and visual hierarchy. I’ll put together a moodboard based on your branding, and then we’ll move into the design.  This is where we put it all together  and you’ll get a live prototype of your website.</p>
				</div>	
			</div>					

			<div class="outer-stage d-1of2 t-1of2 m-all">
				<div class="stage">
					<h5>Development</h5>	
					<p>After signing off on the design, it will be developed into a living breathing website. You’ll receive two rounds of QA (quality assurance) plus a one hour training walking you through your site and how to enter content.</p>
				</div>	
			</div>
			
			<div class="outer-stage d-1of2 t-1of2 m-all last-col">
				<div class="stage">
					<h5>Launch</h5>	
					<p>Once the site has been finalized and final payment received, you’ll sign a launch agreement. Then it’s time to launch your site! You’ll recieve a social media launch kit to announce your new site. Pop, fizz, clink! 🥂</p>
				</div>	
			</div>			
		</div>
	</div>
	
	<div id="faqs" class="cf">
		<h3>Frequently Asked Questions</h3>
		
		<div class="wrap">
		
			<div class="d-1of2 t-1of2 m-all">
				<?php the_field('faq_col_1'); ?>
			</div>
			
			<div class="d-1of2 t-1of2 m-all">
				<?php the_field('faq_col_2'); ?>
			</div>			
		
		</div>
		
	</div>
	
	
	<div id="next-steps" class="cf">
		<h3 id="Book">Next Steps</h3>
		
		<div class="wrap">
			
			<div class="booking d-1of3 t-1of2 m-all">
				<?php the_field('booking_details'); ?>
			</div>	
			
			<div class="form d-2of3 t-1of2 m-all">
				<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.14/iframeResizer.min.js"></script><iframe src="https://hello.dubsado.com:443/public/form/view/5eacf7ca3f33eb56f948c97d" frameborder="0" style="width:1px; min-width:100%;"></iframe><script type="text/javascript">setTimeout(function(){iFrameResize({checkOrigin: false, heightCalculationMethod: "taggedElement"});}, 30)</script>
			</div>	
			
		</div>
	</div>			
		
<?php get_footer(); ?>