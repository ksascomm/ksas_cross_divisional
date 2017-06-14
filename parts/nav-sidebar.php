<!-- Begin Sidebar -->

<?php
	global $post; // Setup the global variable $post
	//Get the top-level page slug for sidebar/widget content conditionals
	$ancestors = get_post_ancestors( $post->ID ); // Get the array of ancestors
	$ancestor_id = ($ancestors) ? $ancestors[count($ancestors)-1]: $post->ID;
	$the_ancestor = get_page( $ancestor_id );
	$ancestor_url = get_permalink($post->post_parent);
	$ancestor_title = $the_ancestor->post_title;
	
	if ( is_page() && $post->post_parent  ) {
		// Make sure we are on a page and that the page is a parent.
		$kiddies = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );	
	} else {
		$kiddies = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
	}
	if ( $kiddies ) { ?>

		<div class="sidebar">
			<div class="offset-gutter" id="sidebar_header">
				<h5 class="grey">Also in 
				<?php if (is_home()) :?>
					<a href="<?php echo site_url(); ?>/about" class="white">About</a>
				<?php else : ?>
					<a href="<?php echo $ancestor_url;?>" class="white"><?php echo $ancestor_title; ?></a>
				<?php endif;?>
				</h5>
			</div>
			<?php wp_nav_menu( array( 
				'theme_location' => 'main-nav', 
				'menu_class' => 'nav', 
				'container_class' => '',
				'sub_menu' => true,
			)); ?>
		</div>

	<?php } ?>
	
<!-- End Sidebar -->


<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

	<div class="sidebar">

		<?php dynamic_sidebar( 'sidebar1' ); ?>
		
	</div>

<?php endif; ?>