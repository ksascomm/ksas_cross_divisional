<?php get_header(); ?>
	
	<div id="content">
	
		<div id="inner-content" class="row">

		    <main id="main" class="small-12 large-8 large-push-3 columns" role="main">
				
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>  

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>
			    
			    <?php endwhile; endif; ?>							
			    					
			</main> <!-- end #main -->
			<div class="small-12 large-3 large-pull-9 columns hide-for-print" role="navigation"> 
				<?php get_template_part( 'parts/nav', 'sidebar' ); ?>
			</div>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>