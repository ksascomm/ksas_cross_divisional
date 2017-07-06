<?php get_header(); ?>
			
	<div id="content">

		<div id="inner-content" class="row">
	
			<main id="main" class="large-9 large-push-1 small-12 columns" role="main">

				<article id="content-not-found">
				
					<header class="article-header">
						<h1><?php _e('Page Not Found', 'jointswp'); ?></h1>
					</header> <!-- end article header -->
			
					<section class="entry-content">
						<p><?php _e('The page you were looking for was not found, but maybe try looking again!', 'jointswp'); ?>. Or, email us at <a href="mailto:ksasweb@jhu.edu">ksasweb@jhu.edu</a></p>
					</section> <!-- end article section -->

					<section class="search">
					    <p><?php get_search_form(); ?></p>
					</section> <!-- end search section -->
			
				</article> <!-- end article -->
			
			</main> <!-- end #main -->
			
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>