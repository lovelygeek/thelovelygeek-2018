<?php if( have_rows('shop_grid') ): ?>

	<div id="shop-grid" class="m-all t-all d-all cf">
		
		<?php while( have_rows('shop_grid') ): the_row();  
			$image = get_sub_field('product_image');
			$caption = $image['caption'];
			$link = get_sub_field('product_link');
		?>		

		<div class="grid-item d-1of4 t-1of4 m-all">
			<a href="<?php echo $link; ?>" title="<?php echo $image['title'] ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></a>
			<br /><?php echo $image['caption'] ?>
		</div>

		<?php endwhile; ?>
	
		</div>
	
<?php endif; ?>