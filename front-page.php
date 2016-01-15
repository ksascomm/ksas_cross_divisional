<?php get_header(); ?>
	<div id="content">
		<?php
			$theme_option = flagship_sub_get_global_options(); 
			if ( false === ( $slider_query = get_transient( 'slider_query' ) ) ) {
				$slider_query = new WP_Query(array(
					'post_type' => 'slider',
					'posts_per_page' => '2',
					'orderby' => 'menu_order', 
					'order' => 'ASC'));
				set_transient( 'slider_query', $slider_query, 2592000 );
			}	
			if ( $slider_query->have_posts() ) : while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
					
					<?php get_template_part('parts/content', 'slider'); ?>
		   
		   <?php endwhile; endif; ?>
	
		<div id="inner-content" class="row">

		    <main id="main" class="small-12 large-8 columns" role="main">
				 
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>
			    
			    <?php endwhile; endif; ?>

			    <section class="news" role="article">
				    <?php  //News Query		
						$news_query_cond = $theme_option['flagship_sub_news_query_cond'];
						$news_quantity = $theme_option['flagship_sub_news_quantity']; 
						if ( false === ( $news_query = get_transient( 'news_mainpage_query' ) ) ) {
							if ($news_query_cond === 1) {
								$news_query = new WP_Query(array(
									'post_type' => 'post',
									'tax_query' => array(
										array(
											'taxonomy' => 'category',
											'field' => 'slug',
											'terms' => array( 'books' ),
											'operator' => 'NOT IN'
										)
									),
									'posts_per_page' => $news_quantity)); 
							} else {
								$news_query = new WP_Query(array(
									'post_type' => 'post',
									'posts_per_page' => $news_quantity)); 
							}
						set_transient( 'news_mainpage_query', $news_query, 2592000 );
						} 	
						if ( $news_query->have_posts() ) :
					?>
					
					<h4><?php echo $theme_option['flagship_sub_feed_name']; ?></h4>
						<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
							<div class="row">		
							<article class="small-12 columns">
									<a href="<?php the_permalink(); ?>">
										<h6><?php the_date(); ?></h6>
										<h5 class="black"><?php the_title();?></h5>
										<?php if ( has_post_thumbnail()) { ?> 
											<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft")); ?>
										<?php } ?>
									</a>
										<?php the_excerpt(); ?>
									
									<hr>
							</article>
							</div>
			
						<?php endwhile; ?>
							<div class="row">
								<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
									<h5 class="black">View <?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h5>
								</a>
							</div>
						<?php endif; ?>
			    </section>	 <!-- end #news -->
			    <section class="row" id="hp-buckets">
			    	<div class="small-12 hide-for-print" role="navigation"> 
						<?php get_sidebar('homepage-column'); ?>
					</div>
			    </section>							
			</main> <!-- end #main -->
		 	<div class="small-12 large-4 columns hide-for-print" role="navigation"> 
				<?php if ( is_active_sidebar( 'sidebar1' ) ) { ?>
					<?php get_sidebar(); ?>
				<?php } ?>
				<?php get_sidebar('homepage'); ?>
			</div>		
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>