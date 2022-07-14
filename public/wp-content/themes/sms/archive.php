<?php

get_header();

?>
<div class="container">

	<div class="row">

		<div class="col-lg-9">

<?php

if(have_posts()):
?>
	<h3 class="sms-home-heading"><i class="glyphicon glyphicon-paperclip"></i>
	<?php
		if(is_category()){
			echo "Category <i>".single_cat_title()."</i> ";
		}elseif(is_tag()){
			echo "Tag <i>".single_tag_title()."</i> ";
		}elseif(is_author()){
			the_post();
			echo "Author <i>".get_the_author()."</i> ";
			rewind_posts();
		}elseif(is_day()){
			echo "Day <i>".get_the_date()."</i> ";
		}elseif(is_month()){
			echo "Month <i>".get_the_date('F Y')."</i> ";
		}elseif(is_year()){
			echo "Year <i>".get_the_date('Y')."</i> ";
		}else{
			echo "Unknown";
		}
	?>	
	Archive</h3>
<?php
	while(have_posts()) : the_post();
?>
	
	<div class="media">
		<a class="pull-left" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('small-thumbnail'); ?>
		</a>
		<div class="media-body">
			<h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
				<small class="sms-meta"><b><i>Posted On:</i></b> <?php the_time('F j, Y g:i a'); ?>. <b><i>By:</i></b> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>. <b><i>Posted In:</i></b> 

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
				
				</small>
			</h4>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>">Read more&raquo;</a>
		</div>
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


