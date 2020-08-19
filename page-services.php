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
	<p>Strategic website design and additional support for your digital needs.</p>
	
	<div class="wrap">
		
		<div class="d-1of2 t-1of2 m-all">
			<div class="outer-white-border">
				<img src="<?php the_field('left_card_image'); ?>" alt="supporting image for service description" />
				<div class="inner-card">
					<?php the_field('left_content'); ?>				
				</div>	
			</div>
		</div>
		
	
		<div class="d-1of2 t-1of2 m-all">
			<div class="outer-white-border">
				<img src="<?php the_field('right_card_image'); ?>" alt="supporting image for service description" />
				<div class="inner-card">	
					<?php the_field('right_content'); ?>	
				</div>	
			</div>
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


<div id="featured-projects" class="cf">
	<div class="wrap">
		<h3>Featured Design Work</h3>
		<?php echo do_shortcode('[portfolio display_types=false display_content=false display_tags=true columns=3 showposts=3 orderby=rand]'); ?>	
		<p class="button"><a href="<?php echo home_url(); ?>/work">View More Work</a></p>	
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


<div id="book-cta" class="cf">
	<?php the_field('call_to_action'); ?>	
</div>
	
<?php get_footer(); ?>
