<?php
/*
Template Name: People Directory
*/
?>
<?php get_header();
	global $post;
	$children = get_pages( array(
		'child_of' => $post->ID,
	) );
	$theme_option = flagship_sub_get_global_options();
	$research_label = $theme_option['flagship_sub_research_label'];
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
	foreach ($roles as $role ) {
		$role_slugs[] = $role->slug;
	}
	$role_classes = implode(' ', $role_slugs);
	foreach ($filters as $filter ) {
		$filter_slugs[] = $filter->slug;
	}
	$filter_classes = implode(' ', $filter_slugs);
?>
<div id="content">
	<div id="inner-content" class="row">
	<?php if ( count( $children ) >= 1 ) : ?>
		<main id="main" class="small-12 large-8 large-push-3 columns" role="main">
	<?php else : ?>
		<main id="main" class="small-12 large-9 large-push-1 columns" role="main">
	<?php endif;?>

	<?php if (function_exists('dimox_breadcrumbs') ) { dimox_breadcrumbs();} ?>
	
		<?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="large-12 columns">
				<?php get_template_part( 'parts/loop', 'page' ); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>
	<div class="directory-search callout lightgrey" role="region" aria-label="Filters">
		<?php if ($theme_option['flagship_sub_role_search'] == true) : ?>
			<?php $count_roles =  count($roles);
				if ( $count_roles > 0 ) : ?>
			<p>Filter by Title:</p>
			<ul class="filter-list menu role-group" data-filter-group="role">
				<?php foreach ( $roles as $role ) : ?>
				<li class="role-filter">
					<a class="button capitalize" href="javascript:void(0)" data-filter=".<?php echo $role->slug; ?>" class="selected"><?php echo $role->name; ?></a>
				</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; endif; ?>
		<div class="row search-sort">
			<div class="large-8 column">
				<label for="id_search">
					<p>Search by Name, Title<?php echo ', and ' . $research_label; ?></p>
				</label>
				<div class="input-group">
					<span class="input-group-label">
						<span class="fa fa-search"></span>
					</span>
					<input class="quicksearch input-group-field" type="text" name="search" id="id_search" aria-label="Search by name, title, and research interests"  />
				</div>
			</div>
		</div>
		<?php if ($theme_option['flagship_sub_research_search'] == true) : ?>
		<p>Filter all by <?php echo $research_label; ?>:</p>
		<?php $filters = get_terms('filter', array(
			'orderby'       => 'name',
			'order'         => 'ASC',
			'hide_empty'    => true,
			));
			
			$count_filters =  count($filters);
		if ( $count_filters > 0 ) : ?>
		<ul class="filter-list menu expertise-group" data-filter-group="expertise">
			<?php foreach ( $filters as $filter ) : ?>
			<li class="role-filter">
				<a class="button capitalize" href="javascript:void(0)" data-filter=".<?php echo $filter->slug; ?>"><?php echo $filter->name; ?></a>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; endif; ?>
	</div>		
		<div id="isotope-list" class="people-directory loading" role="region" aria-label="Results">
				<ul class="directory">
				<?php foreach ($roles as $role ) : ?>
				<?php $role_slug = $role->slug;
				$role_name = $role->name;
					$people_query = new WP_Query(array(
							'post_type' => 'people',
							'role' => $role_slug,
							'meta_key' => 'ecpt_people_alpha',
							'orderby' => 'meta_value',
							'order' => 'ASC',
							'posts_per_page' => '150',));

				if ($people_query->have_posts() ) : ?>
				<li class="person sub-head quicksearch-match <?php echo $role->slug; ?>"><h2 class="black capitalize"><?php echo $role_name; ?></h2></li>
				
				<?php while ($people_query->have_posts() ) : $people_query->the_post(); ?>
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
	<?php if ( count( $children ) >= 1 ) : ?>
		<aside class="small-12 large-3 large-pull-9 columns">

			<?php get_template_part( 'parts/nav', 'sidebar' ); ?>
			
			<!-- Page Specific Sidebar -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				$sidebar = get_post_meta($post->ID, 'ecpt_page_sidebar', true);
				dynamic_sidebar($sidebar);
			endwhile; endif; wp_reset_postdata();
			?>
			<!-- END Page Specific Sidebar -->
		</aside>
	<?php endif;?>
		</div> <!-- end #inner-content -->
	</div>
	<!-- end #content -->
	<?php get_footer(); ?>