<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="wrap cf">

			<main id="main" class="m-all t-all d-all cf" role="main">

				<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'platetheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
						<div class="inner-article cf">
							
							<div id="feat-img" class="d-1of2 t-1of2 m-all">
								<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail('blog-listing-feat-img');
								} else { ?>
								<img src="http://via.placeholder.com/455x596">
								<?php } ?>								
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
									<?php the_tags( '<p class="footer-tags tags"><i class="fas fa-tags"></i><span class="tags-title">' . __( '', 'platetheme' ) . '</span> ', ', ', '</p>' ); ?>
								</footer>
							</div>
							
						</div>
					</article>

					<?php get_template_part( 'templates/post-navigation'); ?>

				<?php endwhile; endif; ?>

			</main>

		</div>

	</div>

<?php get_footer(); ?>
