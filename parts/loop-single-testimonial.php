<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<header class="article-header">	
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
    </header> <!-- end article header -->
					
    <div class="entry-content" itemprop="articleBody">
		<?php if ( has_post_thumbnail()) {  the_post_thumbnail('thumbnail', array('class'	=> "floatleft circle"));  } ?>
		<?php if ( get_post_meta($post->ID, 'ecpt_class', true) ) : ?>
			<p><strong>Class of: <?php echo get_post_meta($post->ID, 'ecpt_class', true); ?></strong></p>
		<?php endif; ?>
		<?php if ( get_post_meta($post->ID, 'ecpt_internship', true) ) : ?>
			<p><strong>Internship:</strong> <?php echo get_post_meta($post->ID, 'ecpt_internship', true); ?></p>
		<?php endif; ?>
		<?php if ( get_post_meta($post->ID, 'ecpt_job', true) ) : ?>
			<p><strong>Current Job:</strong> <?php echo get_post_meta($post->ID, 'ecpt_job', true); ?></p>
		<?php endif; ?>
		<?php the_content();?>
	</div> <!-- end article section -->
													
</article> <!-- end article -->