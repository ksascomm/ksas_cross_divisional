<?php
/*
Template Name: Alumni Testimonials
*/
?>
<?php get_header(); ?>

<div id="content">
	
	<div id="inner-content" class="row">
		
		<main id="main" class="small-12 large-9 large-push-1 columns" role="main">
			<?php if (function_exists('dimox_breadcrumbs') ) { dimox_breadcrumbs();} ?>
			<?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
			<?php get_template_part( 'parts/loop', 'page' ); ?>
			
			<?php endwhile; endif; ?>
			<?php
			$ksas_alumni_testimonial_query = new WP_Query(
			array(
						'post-type' => 'testimonial',
						'testimonialtype' => 'alumni-testimonial',
						'meta_key' => 'ecpt_testimonial_alpha',
						'orderby' => 'meta_value',
						'order' => 'ASC',
						'posts_per_page' => '100',
					)
			);
			?>
			<?php if ($ksas_alumni_testimonial_query->have_posts() ) : ?>
			<div class="row small-up-2 large-up-3">
				<?php
				while ($ksas_alumni_testimonial_query->have_posts() ) :
									$ksas_alumni_testimonial_query->the_post();
				?>
				<div class="column column-block">
					<div class="card testimonial">
						<div class="card-section testimonial-avatar">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();  }
							?>
						</div>
						<div class="card-section testimonial-bio">
							<h2><?php the_title(); ?></h2>
							<?php if ( get_post_meta($post->ID, 'ecpt_job', true) ) : ?>
							<h3><?php echo get_post_meta($post->ID, 'ecpt_job', true); ?></h3>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_class', true) ) : ?>
							<h3>Class of: <span class="light"><?php echo get_post_meta($post->ID, 'ecpt_class', true); ?></span></h3>
							<?php endif; ?>
							<p class="full-testimonial">
								<button class="button testimonial-button" data-open="post-<?php the_ID(); ?>">
								Read Testimonial
								</button>
							</p>
						</div>
						
						<div class="reveal testimonial-content" id="post-<?php the_ID(); ?>" aria-labelledby="Modal-<?php the_ID(); ?>" data-reveal>
							<h1 id="Modal-<?php the_ID(); ?>"><?php the_title(); ?></h1>
							<div aria-label="<?php the_title(); ?>'s Full Testimonial">
							<?php if ( get_post_meta($post->ID, 'ecpt_class', true) ) : ?>
								<p><strong>Class of: <?php echo get_post_meta($post->ID, 'ecpt_class', true); ?></strong></p>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_internship', true) ) : ?>
								<p><strong>Internship:</strong> <?php echo get_post_meta($post->ID, 'ecpt_internship', true); ?></p>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_job', true) ) : ?>
								<p><?php echo get_post_meta($post->ID, 'ecpt_job', true); ?></p>
							<?php endif; ?>
							<?php the_content(); ?>
							</div>
							<button class="close-button" data-close aria-label="Close reveal" type="button">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>	
				</div>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
		</main> <!-- end #main -->
			
	</div> <!-- end #inner-content -->
			
</div> <!-- end #content -->
<?php get_footer(); ?>