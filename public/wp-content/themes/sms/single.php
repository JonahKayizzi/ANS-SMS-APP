<?php

get_header();

?>
<div class="container">

	<div class="row">

		<div class="col-lg-9">

<?php

if(have_posts()):
	while(have_posts()) : the_post();
?>
	<?php if(is_singular('sms_pod_lessons')){ ?>
		<h3 class="sms-home-heading"><i class="glyphicon glyphicon-leaf"></i> Lesson Learnt</h3>
	<?php }elseif(is_singular('page')){ ?>
		<h3 class="sms-home-heading"><i class="glyphicon glyphicon-list-alt"></i> Page</h3>
	<?php }else{ ?>
		<h3 class="sms-home-heading"><i class="glyphicon glyphicon-list-alt"></i> Article</h3>
	<?php } ?>
				<h2><?php the_title(); ?></h2>
				
				<small class="sms-meta"><b><i>Posted On:</i></b> <?php the_time('F j, Y g:i a'); ?>. <b><i>By:</i></b> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>. 
				
				<?php if(!(is_singular('sms_pod_lessons'))){ ?>
				<b><i>Posted In:</i></b> 

				<?php
					$categories = get_the_category();
					$separator = ", ";
					$output = '';
					
					if($categories){
						foreach($categories as $category){
							$output .= '<a href="'. get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
						}
						echo trim($output, $separator);
					}
				?>
				<?php } ?>
				</small>
				
				<?php /* the_post_thumbnail('banner-image'); */ ?>
				<?php $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(),'banner-image'); ?>
				<img src="<?php echo $img_url[0];?>" style="width: 100%;"/>
				
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


