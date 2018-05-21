<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

		<div class="inner-page">
			<header class="article-header">
	
				<?php get_template_part( 'templates/header', 'title'); ?>
	
			</header> <?php // end article header ?>
	
			<section class="entry-content cf" itemprop="articleBody">
				
				<?php the_post_thumbnail('single-post-feat-img', array('class' => 'aligncenter')); ?>				
				
				<?php the_content(); ?>
			
			</section> <?php // end article section ?>
	
			<footer class="article-footer cf">
	
			</footer>
		
		</div>
		
	</article>

<?php endwhile; endif; ?>