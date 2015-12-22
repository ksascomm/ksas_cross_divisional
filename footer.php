					<footer class="footer" role="contentinfo">
						<div id="inner-footer" class="row">
							<div class="small-12 small-centered medium-5 columns">
								<nav role="navigation">
		    						<?php joints_footer_links(); ?>
		    					</nav>
		    				</div>

		    				<div class="row" id="copyright" role="content-info">
								<div class="small-12 columns">
					  				<p>&copy; <?php print date('Y'); ?> Johns Hopkins University</p>
					  			</div>
					  		</div>
					  		<div class="row">
						  		<div class="small-12 small-centered medium-4 columns">
					  				<a href="http://www.jhu.edu"><img src="<?php echo get_template_directory_uri() ?>/assets/images/university.jpg" /></a>
					  			</div>
					  		</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div>  <!-- end .main-content -->
			</div> <!-- end .off-canvas-wrapper-inner -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->