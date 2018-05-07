<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="wrap cf">
			
			<div id="filters" class="cf">
			
				<div class="d-1of3 t-1of3 m-all">
					<h5>Search</h5>
					<?php get_search_form(); ?>
				</div>	
				
				<div class="d-1of3 t-1of3 m-all">
					<h5>Categories</h5>
					<?php wp_dropdown_categories( 'show_option_none=select category' ); ?>
					<script type="text/javascript">
						<!--
						var dropdown = document.getElementById("cat");
						function onCatChange() {
							if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
								location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
							}
						}
						dropdown.onchange = onCatChange;
						-->
					</script>				
				</div>	
				
				<div class="d-1of3 t-1of3 m-all">
						<h5>Archives</h5>
						<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
						<option value=""><?php echo esc_attr( __( 'select month' ) ); ?></option> 
						<?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
						</select>
				</div>	
			</div>		

			<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<?php // Edit the loop in /templates/index-loop. Or roll your own. ?>
				<?php get_template_part( 'templates/index','loop'); ?>

			</main>

			<? /* php get_sidebar(); */ ?>

		</div>

	</div>


<?php get_footer(); ?>
