<li class="person <?php echo get_the_directory_filters($post);?> <?php echo get_the_roles($post); ?>">
	<div class="media-object">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="media-object-section hide-for-print">
				<?php the_post_thumbnail('directory'); ?>
			</div>
		<?php } ?>
		<div class="media-object-section">
			<h3>
			<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?>
				<a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
				<?php else : ?>
					<?php the_title(); ?>
			<?php endif; ?>
			</h3>
			<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
				<h4><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h4>
			<?php endif; ?>
		  	<?php if ( get_post_meta($post->ID, 'ecpt_degrees', true) ) : ?>
		   		<h4><?php echo get_post_meta($post->ID, 'ecpt_degrees', true); ?></h4>
		   	<?php endif; ?>				
			<ul class="contact">
				<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
					<li><span class="fa fa-phone-square"></span> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></li>
				<?php endif; ?>
			<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?>
				<li><span class="fa fa-envelope"></span> <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"> <?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a></li>
			<?php endif; ?>
			<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
				<li><span class="fa fa-map-marker"></span> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></li>
			<?php endif; ?>
			<?php if ( get_post_meta($post->ID, 'ecpt_expertise', true) ) : 
				$theme_option = flagship_sub_get_global_options();
				$research_label = $theme_option['flagship_sub_research_label'];?>					
				<li><strong><?php echo $research_label; ?>:&nbsp;</strong><?php echo get_post_meta($post->ID, 'ecpt_expertise', true); ?></li>
			<?php endif; ?>
			</ul>
		</div>	
	</div>
</li>