<?php
/*
This is the custom post type post template.
If you edit the post type name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom post type is called
register_post_type( 'bookmarks',
then your single template should be
single-bookmarks.php

*/
?>

<?php get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="row">

		 <main id="main" class="small-12 large-9 large-push-3 columns" role="main">
		
				<?php 
					$home_url = home_url();
					global $post;
					$article_title = $post->post_title;
					?>
				<nav role="navigation">
					<ul id="menu-main-menu-2" class="breadcrumbs">
						<li><a href="<?php echo $home_url; ?>">Home</a></li>
						<li><?php echo $article_title; ?></li>
					</ul>
				</nav> 

		    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
		
		    	<?php get_template_part( 'parts/loop', 'single-testimonial' ); ?>
		    					
		    <?php endwhile; else : ?>
		
		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->
		
		<div class="small-12 large-3 large-pull-9 columns hide-for-print" role="navigation"> 
			<label for="jump">
				<h5>View Other Testimonials</h5>
			</label>
			<select name="jump" id="jump" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<option>---<?php the_title(); ?></option> 
					<?php endwhile; endif; ?>
					<?php $jump_menu_query = new WP_Query(array(
						'post-type' => 'testimonial',
						'testimonialtype' => array('internship-testimonial', 'alumni-testimonial'),
						'orderby' => 'title',
						'order' => 'ASC',
						'posts_per_page' => '50')); ?>
					<?php while ($jump_menu_query->have_posts()) : $jump_menu_query->the_post(); ?>				
						<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
					<?php endwhile; ?>
			</select>
		</div>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>