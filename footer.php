					<footer class="footer hide-for-print" role="contentinfo">
						<div id="inner-footer" class="row">
							<div class="small-12 medium-5 columns">
								<a href="https://www.jhu.edu/">
									<img class="jhushield" src="<?php echo get_template_directory_uri() ?>/assets/images/jhu-horizontal.png" alt="Johns Hopkins University">
								</a>
							</div>
							<div class="small-12 medium-4 columns">
								<ul id="menu-footer-links" class="menu simple hide-for-small-only" role="menu">
									<li role="menuitem"><a href="https://jobs.jhu.edu/">Employment</a></li>	
									<li role="menuitem"><a href="https://www.jhu.edu/alert/">Emergency Alerts</a></li>
								</ul>
							</div>
							<div class="small-12 medium-3 columns social-media hide-for-small-only">
								<a href="http://facebook.com/JHUArtsSciences" title="Facebook"><span class="fa fa-facebook-official fa-2x"></span><span class="screen-reader-text">Facebook</span></a>
								<a href="https://www.instagram.com/JHUArtsSciences/" title="Instagram"><span class=" fa fa-instagram fa-2x"></span><span class="screen-reader-text">Instagram</span></a>
								<a href="https://twitter.com/JHUArtsSciences" title="Twitter"><span class="fa fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a>
								<a href="https://www.youtube.com/user/jhuksas" title="YouTube"><span class="fa fa-youtube-square fa-2x"></span><span class="screen-reader-text">YouTube</span></a>
							</div>					
		    				<div class="row" id="copyright" role="content-info">
								<div class="small-12 columns">
									<?php $theme_option = flagship_sub_get_global_options()?>
  									<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, <?php echo $theme_option['flagship_sub_copyright'];?></p>
					  			</div>
					  		</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div>  <!-- end .main-content -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php get_template_part('parts/script-initiators'); ?>
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->