<div class="hero">	
	<div class="row">
			<div class="small-12 large-8 columns">
				<img src="<?php echo get_post_meta($post->ID, 'ecpt_slideimage', true); ?>" class="radius-top" />
			</div>
			<div class="small-12 large-4 columns black_bg vertical radius-topright">
				<div id="caption">
					<h3 class="white"><?php the_title(); ?></h3><br>
					<h5 class="white italic"><?php echo get_the_content(); ?></h5>
				   	<?php if ( get_post_meta($post->ID, 'ecpt_button', true) ) : ?>				
						<h6 class="yellow">Find Out More <span class="icon-arrow-right-2"></span></h6>
					<?php endif;?>
				</div>
			</div>	
	</div>
</div>