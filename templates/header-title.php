<?php // WordPress custom title script

if ( function_exists('is_tag') && is_tag() || is_category() || is_tax() ) { ?>

	<h2 class="archive-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<?php } elseif ( is_archive() ) { ?>

	<h2 class="archive-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<?php } elseif ( is_search() ) { ?>

	<h2 class="search-title entry-title">

		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									
	</h2>

<?php } elseif ( !(is_404() ) && ( is_single() ) || ( is_page() )) { ?>

	<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>


<?php } elseif ( is_404() ) { ?>

	<h1><?php _e( '404', 'platetheme' ); ?></h1>

<?php } elseif ( is_home() ) { ?>

	<h1 class="h2 entry-title">

		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>

	</h1>

<?php } else { ?>

	<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

<?php }

?>