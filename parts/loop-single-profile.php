<li class="person <?php echo get_the_directory_filters($post);?> <?php echo get_the_roles($post); ?>">
	<div class="media-object">		
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="media-object-section hide-for-print">
				<?php the_post_thumbnail('directory'); ?>
			</div>
		<?php } ?>
		<div class="media-object-section">
			<h3>
				<a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
				<h4><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h4>
			<?php endif; ?>
		  	<?php if ( get_post_meta($post->ID, 'ecpt_degrees', true) ) : ?>
		   		<h4"><?php echo get_post_meta($post->ID, 'ecpt_degrees', true); ?></h4>
		   	<?php endif; ?>	
			<ul class="contact">
				<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
					<li><span class="fa fa-phone-square"></span> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
					<li><span class="fa fa-fax" aria-hidden="true"></span> <?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></li>
				<?php endif; ?>
				<?php $email = get_post_meta($post->ID, 'ecpt_email', true); if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?>
					<li><span class="fa fa-envelope" aria-hidden="true"></span> <a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;<?php echo email_munge($email); ?>">
					<?php echo email_munge($email); ?></a></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
					<li><span class="fa fa-envelope"></span> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_lab_website', true) ) : ?>
					<li><span class="fa fa-globe" aria-hidden="true"></span> <a href="<?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>" onclick="ga('send', 'event', 'People Directory', 'Group/Lab Website', '<?php the_title(); ?> | <?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>')" target="_blank">Group/Lab Website</a>
					</li>
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