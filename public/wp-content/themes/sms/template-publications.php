<?php
/*
Template Name: Publications Template
*/
get_header();

?>
<div class="container">

	<div class="row">

		<div class="col-lg-9">

<?php

if(have_posts()):
	while(have_posts()) : the_post();
?>
	<h3 class="sms-home-heading"><i class="glyphicon glyphicon-folder-open"></i> Publications</h3>
				
				<?php /* the_post_thumbnail('banner-image'); */ ?>
				<?php $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(),'banner-image'); ?>
				
				<?php if(get_post_thumbnail_id()){ ?>
				<img src="<?php echo $img_url[0];?>" style="width: 100%;"/>
				<?php } ?>
				<div style="padding: 10px 0px;">
					<?php the_content(); ?>
				</div>
<?php	
	endwhile;
	
else: 
?>
	<h3 class="sms-home-heading"><i class="glyphicon glyphicon-info-sign"></i> Message</h3>
				<h2>No content found</h2>
				<p>The section you have selected has no content.</p>
<?php
endif;
?>
		
		</div>
		
		<?php get_template_part('column-right'); ?>
	</div>
</div>


<?php
get_footer();

?>


