			<footer class="subfooter">
				<div id="inner-subfooter" class="wrap cf">
					<h3>Follow Me on Instagram</h3>
					<p><a href="https://www.instagram.com/thelovelygeek/">@TheLovelyGeek</a></p>
					<?php echo do_shortcode('[instagram-feed]'); ?>
				</div>	
			</footer>
			
			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">

					<p>
						<a href="https://dribbble.com/LovelyGeek" title="@LovelyGeek on dribbble"><i class="fab fa-dribbble"></i></a>
						<a href="https://www.facebook.com/lovelygeek/" title="@LovelyGeek on Facebook"><i class="fab fa-facebook-f"></i></a>
						<a href="https://www.flickr.com/photos/darth_cena/" title="@darth_cena on Flickr"><i class="fab fa-flickr"></i></a>
						<a href="https://www.instagram.com/thelovelygeek/" title="@TheLovelyGeek on Instagram"><i class="fab fa-instagram"></i></a>
						<a href="https://twitter.com/LovelyGeek" title="@LovelyGeek on Twitter"><i class="fab fa-twitter"></i></a>
						<a href="https://www.pinterest.com/lovelygeek/" title="@LovelyGeek on Pinterest"><i class="fab fa-pinterest"></i></a>
						<a href="http://feeds.feedburner.com/thelovelygeek" title="@TheLovelyGeek on Feedburner"><i class="fas fa-rss"></i></a>
					</p>
						

					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'platetheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?> 
					</nav> 

					

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. <br /> <a href="https://thelovelygeek.com/humans.txt">Crafted with &hearts; in Sacramento, California</a>.</p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- This is the end. My only friend. -->
