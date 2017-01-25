<div class="hero">	
	<div class="row">
			<div class="large-8 columns">
				<img src="<?php echo get_post_meta($post->ID, 'ecpt_slideimage', true); ?>" class="radius-top" />
			</div>
			<div class="small-12 large-4 columns vertical radius-topright">
				<div id="caption">
				<?php if ( !the_title( ' ', ' ', false ) == "" ) : ?>
					<h3><?php the_title(); ?></h3>
				<?php endif;?>
					<h5><?php echo get_the_content(); ?></h5>
				   	<?php if ( get_post_meta($post->ID, 'ecpt_button', true) ) : ?>				
						<h6>
							<a href="<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>" onclick="ga('send', 'event', 'Homepage Slider', 'Click', '<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>')" id="post-<?php the_ID(); ?>">Find Out More <span class="icon-arrow-right-2"></span></a> 
						</h6>
					<?php endif;?>
				</div>
			</div>	
	</div>
</div>