<?php
/*
Template Name: People Directory
*/
?>
<?php get_header();
	global $post;
	$children = get_pages( array( 'child_of' => $post->ID ) );
	$theme_option = flagship_sub_get_global_options();
	$roles = get_terms('role', array(
								'orderby' 		=> 'ID',
									'order'			=> 'ASC',
						'hide_empty'    => true,
						));
	$filters = get_terms('filter', array(
						'orderby'       => 'name',
						'order'         => 'ASC',
						'hide_empty'    => true,
						));
	$role_slugs = array();
	$filter_slugs = array();
	foreach($roles as $role) {
		$role_slugs[] = $role->slug;
	}
	$role_classes = implode(' ', $role_slugs);
	foreach($filters as $filter) {
		$filter_slugs[] = $filter->slug;
	}
	$filter_classes = implode(' ', $filter_slugs);
?>
<div id="content">
	<div id="inner-content" class="row">
	<?php if( count( $children ) >= 1 ) : ?>
		<main id="main" class="small-12 large-8 large-push-3 columns" role="main">
	<?php else : ?>
		<main id="main" class="small-12 large-9 large-push-1 columns" role="main">
	<?php endif;?>

	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="row">
			<div class="large-12 columns">
				<?php get_template_part( 'parts/loop', 'page' ); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>
		<div class="row" id="fields_container">
			<ul id="directory" data-isotope='{ "itemSelector": ".person", "layoutMode": "masonry" }'>
				<?php foreach($roles as $role) : ?>
				<?php $role_slug = $role->slug;
				$role_name = $role->name;
					$people_query = new WP_Query(array(
							'post_type' => 'people',
							'role' => $role_slug,
							'meta_key' => 'ecpt_people_alpha',
							'orderby' => 'meta_value',
							'order' => 'ASC',
								'posts_per_page' => '-1'));
				
				if ($people_query->have_posts()) : ?>
				<li class="person sub-head quicksearch-match <?php echo $role->slug; ?>"><h2 class="black capitalize"><?php echo $role_name; ?></h2></li>
				
				<?php while ($people_query->have_posts()) : $people_query->the_post(); ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) {
						get_template_part('parts/loop', 'single-profile');
					} else {
						get_template_part( 'parts/loop', 'single-noprofile' );
				} ?>
				
				<?php endwhile; endif; endforeach; wp_reset_postdata(); ?>
			</ul>
			<!-- Page Content -->
		</div>
		</main>
		<!-- end #main -->
	<?php if( count( $children ) >= 1 ) : ?>
		<div class="small-12 large-3 large-pull-9 columns" role="navigation">

			<?php get_template_part( 'parts/nav', 'sidebar' ); ?>
			
			<!-- Page Specific Sidebar -->
			<?php if ( have_posts()) : while ( have_posts() ) : the_post();
				$sidebar = get_post_meta($post->ID, 'ecpt_page_sidebar', true);
				dynamic_sidebar($sidebar);
			endwhile; endif; wp_reset_query();
			?>
			<!-- END Page Specific Sidebar -->
		</div>
	<?php endif;?>
		</div> <!-- end #inner-content -->
	</div>
	<!-- end #content -->
	<?php get_footer(); ?>