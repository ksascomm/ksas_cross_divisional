<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->
<div class="top-bar" id="top-bar-menu">

	<div id="mobile-nav">
  		<div class="row">
	        <div class="small-12 columns">
	  			<div class="mobile-logo">
	  				<a href="<?php echo network_site_url(); ?>">
	  					<img src="<?php echo get_template_directory_uri() ?>/assets/images/jhu-horizontal.png" alt="jhu logo">
	  				</a>
	  			</div>
	  		</div>
	  		<div class="row">
	  			<div class="small-12 columns">	
	  				<h1 class="center"><a href="<?php echo site_url(); ?>"><small><?php echo get_bloginfo ( 'description' ); ?></small><?php echo get_bloginfo( 'title' ); ?></a></h1>
	  			</div>
	  		</div>
	  	</div>
	</div>

	<div id="desktop-nav">

		<div class="small-12 columns" id="logo_nav">
			<div class="row">
			<div id="search-bar" class="small-12 large-3 large-offset-9 columns">
					<?php $theme_option = flagship_sub_get_global_options(); 
							$collection_name = $theme_option['flagship_sub_search_collection'];
					?>
					<div class="small-12 large-8 columns">
						<form method="GET" action="<?php echo site_url('/search'); ?>">
							<input type="submit" class="icon-search" value="&#xe004;" />
							<input type="text" name="q" placeholder="Search this site" />
							<input type="hidden" name="site" value="<?php echo $collection_name; ?>" />
						</form>
					</div>
					<?php wp_nav_menu( array( 
						'theme_location' => 'search_bar', 
						'menu_class' => '', 
						'fallback_cb' => 'foundation_page_menu', 
						'container' => 'div',
						'container_id' => 'search_links', 
						'container_class' => 'small-12 large-4 columns links inline',
						'depth' => 1,
						'items_wrap' => '%3$s', )); ?> 
				</div>	
			</div>	<!-- End #search-bar	 -->
			<div class="row">

				<div class="small-12 large-3 columns">
					<div class="logo">
						<a href="<?php echo network_home_url(); ?>" title="Krieger School of Arts & Sciences">
							<img src="<?php echo get_template_directory_uri() ?>/assets/images/jhu.png" alt="jhu logo">
						</a>
					</div>
				</div>
				<div class="small-12 large-9 columns">
					<h1><a href="<?php echo site_url(); ?>"><small><?php echo get_bloginfo ( 'description' ); ?></small><?php echo get_bloginfo( 'title' ); ?></a></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>	
	</div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			 <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
			<li><a data-toggle="off-canvas">Menu</a></li>
		</ul>
	</div>
</div>