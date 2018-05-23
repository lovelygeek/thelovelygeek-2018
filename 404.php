<?php get_header(); ?>
	
	<div id="content">

		<div id="inner-content" class="wrap cf">

			<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<article id="post-not-found" class="hentry cf">
					
					<div class="inner-page">

					<header class="article-header">

						<?php get_template_part( 'templates/header', 'title'); ?>

					</header>

					<section class="entry-content">

						<div class="404-txt">

							<!-- <h3>¯\_(ツ)_/¯</h3> -->
							<p>The page you requested cannot be found. Here are some options:</p>
							<ul>
								<li>You can search using the search bar below</li>
								<li>Visit the <a href="<?php echo home_url(); ?>">homepage</a></li>
								<li>And if you're feeling extra nice, please <a href="https://twitter.com/LovelyGeek">tell me about this error</a>, so I can fix it. 😬</li>
							</ul>

						</div>

					</section>

					<section class="search">

							<div class="search-form-outer"><?php get_search_form(); ?></div>

					</section>

					<footer class="article-footer">

					</footer>
					
					</div>

				</article>

			</main>

		</div>

	</div>

<?php get_footer(); ?>
