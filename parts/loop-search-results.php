<article <?php post_class(''); ?> itemscope itemtype="http://schema.org/BlogPosting" aria-labelledby="post-<?php the_ID(); ?>">
	<header class="article-header" aria-label="<?php the_title();?>">	
		<h1 class="entry-title single-title" itemprop="headline">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h1>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
	</header> <!-- end article header -->
					
	<div class="entry-content" itemprop="articleBody">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
		<?php $content = get_the_content();
  		$trimmed_content = wp_trim_words( $content, 60, '[...]' ); ?>
  		<p><?php echo $trimmed_content; ?></p>
	</div> <!-- end article section -->
								    						
</article> <!-- end article -->
<hr>