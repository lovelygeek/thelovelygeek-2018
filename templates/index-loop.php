<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
		<div class="inner-article cf">
			
			<div id="feat-img" class="d-1of2 t-1of2 m-all">
				<img src="http://via.placeholder.com/455x607">
			</div>
			
			<div class="post-content d-1of2 t-1of2 m-all">
				<header class="article-header">
					
					<?php get_template_part( 'templates/category-tags'); ?>
		
					<?php get_template_part( 'templates/header', 'title'); ?>
		
				</header>
		
				<section class="entry-content cf">
											
					<?php the_excerpt(); ?>
		
				</section>
		
				<footer class="article-footer cf">
		
					<?php get_template_part( 'templates/comment', 'count'); ?>
		
		            <?php get_template_part( 'templates/byline'); ?>
		
				</footer>
			</div>
			
		</div>
	</article>

<?php endwhile; endif; ?>

<?php get_template_part( 'templates/post-navigation'); ?>