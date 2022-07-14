<?php

get_header();

?>

<!-- Page Content -->
    <div class="container">

        <div class="row">
			<div class="col-lg-12">
				<img src="<?php echo get_template_directory_uri(); ?>/images/home-page-header.png" width="100%" />
			</div>
			<div class="col-lg-4">
				<h3 class="sms-home-heading"><i class="glyphicon glyphicon-home"></i> Home</h3>
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
					<div class="item active">
					  <img src="<?php echo get_template_directory_uri(); ?>/images/sample/1.jpg"   />
					</div>

					<div class="item">
					  <img src="<?php echo get_template_directory_uri(); ?>/images/sample/2.jpg"  />
					</div>
				  </div>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
			<div class="col-lg-5">
				<h3 class="sms-home-heading"><i class="glyphicon glyphicon-list-alt"></i> Articles</h3>
				
				<?php
					$recentArticles = new WP_Query('posts_per_page=5');
					
					if($recentArticles->have_posts()):
						while($recentArticles->have_posts()) : $recentArticles->the_post();
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
							
							<?php /* the_content(); */ ?>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>">Read more&raquo;</a>
						</div>
					</div>
				<?php
						endwhile;
					else:
						//fallback
					endif;
				?>
			</div>
			<!--
			<div class="col-lg-4">
				<h3 class="sms-home-heading"><i class="glyphicon glyphicon-leaf"></i> Lessons Learnt</h3>
				<?php
					$params = array( 'limit' => 4, 'orderby' => 'date DESC' ); 
					$sms_lessons_learnt = pods('sms_pod_lessons', $params);
					if($sms_lessons_learnt->total() > 0){
						while($sms_lessons_learnt->fetch()){
				?>
				<div class="media">
                    <div class="media-body">
                        <h4 class="media-heading">
							<a href="<?php echo $sms_lessons_learnt->field('permalink'); ?>"><?php echo $sms_lessons_learnt->field('sms_field_source_detail'); ?></a><br />
                            <small class="sms-meta"><b><i>Posted On:</i></b> <?php echo date("F j, Y g:i a", strtotime($sms_lessons_learnt->field('date'))); ?>. <b><i>By:</i></b> <a href="#"><?php echo get_the_author_meta('display_name', $sms_lessons_learnt->field('post_author')); ?></a>. </small>
                        </h4>
                        <?php echo $sms_lessons_learnt->field('sms_field_lesson_learnt'); ?>
                    </div>
                </div>
				<?php
						}
					}else{
				?>
					<p>No lessons learnt found.</p>
				<?php
					}
				?>
				
			</div>
			-->
			<div class="col-lg-3">
				
				<h3 class="sms-home-heading"><i class="glyphicon glyphicon-folder-open"></i> Publications</h3>
				<?php
					$params = array( 'limit' => 5, 'orderby' => 'date DESC' ); 
					$sms_publications = pods('sms_pod_publications', $params);
					if($sms_publications->total() > 0){
						while($sms_publications->fetch()){
				?>
				
				<div class="media">
                    <a class="pull-left" href="<?php echo $sms_publications->field('sms_field_publication')['guid']; ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/download-pdf.png" width="64px" height="64px" />
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="<?php echo $sms_publications->field('sms_field_publication')['guid']; ?>" target="_blank"><?php echo $sms_publications->field('sms_field_publication_title'); ?></a><br />
                            <small class="sms-meta"><b><i>Posted On:</i></b> <?php echo date("F j, Y g:i a", strtotime($sms_publications->field('post_date'))); ?>. <b><i>By:</i></b> <a href="#"><?php echo get_the_author_meta('display_name', $sms_publications->field('post_author')); ?></a>.</small>
                        </h4>
                    </div>
                </div>
				<?php
						}
					}else{
				?>
					<p>No publications found.</p>
				<?php
					}
				?>
				
				<?php if(is_active_sidebar('newsletter')){ ?>
					<?php dynamic_sidebar( 'newsletter' ); ?>
				<?php } ?>
			</div>
        </div>
        <!-- /.row -->
	</div>

<?php
get_footer();

?>


