<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

		<header class="article-header entry-header">
			
			<?php get_template_part( 'templates/category-tags'); ?>

			<h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
			
			<?php get_template_part( 'templates/byline'); ?>
                  
		</header> <?php // end article header ?>

        <section class="entry-content cf" itemprop="articleBody">

				<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('single-post-feat-img', array('class' => 'aligncenter'));
				} else { ?>
				<img src="http://via.placeholder.com/592x776" class="aligncenter">
				<?php } ?>		        
	        
	        

        	<?php if ( has_post_format()) { 
        		get_template_part( 'format', get_post_format() ); 
        	}
        	?>
        
        	<?php the_content(); ?>

        </section> <?php // end article section ?>

		<footer class="article-footer">

			<?php // Delete or comment out if you don't need this on your page or post. Edit in /templates/byline.php ?>
			<? /*php get_template_part( 'templates/byline');*/ ?>
			
		</footer> <?php // end article footer ?>

        <hr />
        <?php comments_template(); ?>

	</article> <?php // end article ?>

<?php endwhile; endif; ?>

<div class="post-navigation cf">
	
	<div class="previous_post_link"> <?php previous_post_link('%link', '&larr; Previous Post'); ?> </div> <!--FLOAT LEFT usually points to older entries (toward the end of the set)-->
	<div class="next_post_link"><?php next_post_link('%link','Next Post &rarr;'); ?></div> <!-- FLOAT RIGHT usually points to newer entries (toward the beginning of the set)-->

</div>

	<?php plate_related_posts('tag'); ?>

