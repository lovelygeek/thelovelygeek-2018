<?php
/*
 Template Name: Home Page
 * 
 * Use this template for a static home page. 
 * If you don't need the main loop, remove it
 * and get busy.
*/
?>

<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="wrap cf">

			<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<!--Most recent post-->
				<?php
				global $post;
				$args = array( 'posts_per_page' => 1, 'order'=> 'DESC');
				$postslist = get_posts( $args );
				foreach ( $postslist as $post ) :
				  setup_postdata( $post ); ?> 
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
						<div class="inner-article cf">
							
							<div id="feat-img" class="d-1of2 t-1of2 m-all">
								<img src="http://via.placeholder.com/455x596">
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
				
				<?php
				endforeach; 
				wp_reset_postdata();
				?>

			</main>
			
			<div id="select-categories" class="m-all t-all d-all cf">
				<div class="d-1of3 t-1of3 m-all">
					<h5>Home</h5>
						<ul class="featured-posts">
						<?php
						global $post;
						$args = array( 'posts_per_page' => 3, 'order'=> 'DESC', 'category_name' => 'life' );
						$postslist = get_posts( $args );
						foreach ( $postslist as $post ) :
						  setup_postdata( $post ); ?> 
							
								<li><span class="thumb"><img src="http://via.placeholder.com/50x50"></span> <span class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></span></li>   
					
						<?php
						endforeach; 
						wp_reset_postdata();
						?>
						</ul>				
				</div>
				
				<div class="d-1of3 t-1of3 m-all">
					<h5>Popular Posts</h5>
					<?php
						if (function_exists('wpp_get_mostpopular'))
						wpp_get_mostpopular('limit=3&range=all&order_by=views&post_type=post&thumbnail_width=50&thumbnail_height=50&stats_views=0&post_html="<li><span class=thumb>{thumb}</span> <span class=title><a href=\'{url}\'>{text_title}</a></span></li>"');
					?>					
				</div>	
				
				<div class="d-1of3 t-1of3 m-all">
					<h5>Life</h5>
						<ul class="featured-posts">
						<?php
						global $post;
						$args = array( 'posts_per_page' => 3, 'order'=> 'DESC', 'category_name' => 'life' );
						$postslist = get_posts( $args );
						foreach ( $postslist as $post ) :
						  setup_postdata( $post ); ?> 
							
								<li><span class="thumb"><img src="http://via.placeholder.com/50x50"></span> <span class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></span></li>   
					
						<?php
						endforeach; 
						wp_reset_postdata();
						?>
						</ul>						
				</div>				
			</div>

		</div>

	</div>

<?php get_footer(); ?>
