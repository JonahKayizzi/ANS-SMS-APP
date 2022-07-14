	<div class="container">
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
					<div class="sms-footer"><div class="sms-footer-nav" style="text-align: center;">
						<?php
							$args = array(
								'theme_location' => 'footer',
								'container' => '',
								'menu_class' => 'sms-menu-class',
								'menu_id' => '',
							);
						?>
						<?php wp_nav_menu( $args ); ?><br />
						
						
					</div>
					<p>Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
					</div>
                    
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
<?php wp_footer(); ?> 
</body>

</html>