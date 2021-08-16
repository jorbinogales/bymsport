<?php
	/* Template Name: Home */
?>
<?php get_header(); ?>
<?php $mvp_feat_posts = get_option('mvp_feat_posts'); if ($mvp_feat_posts == "true") { ?>
	<div class="mvp-body-sec-wrap  mvp-feat1-wrap-bg left relative">
		<?php get_template_part('featured'); ?>
	</div><!--mvp-body-sec-wrap-->
<?php } ?>
<?php if(get_option('mvp_home_layout') == 'Widgets' || get_option('mvp_home_layout') == 'Widgets and Blog') { ?>
	<div id="mvp-home-widget-wrap" class="left relative">
		<?php global $paged; $paged = (get_query_var('page')) ? get_query_var('page') : 1; if ( $paged < 2 ) : ?>
			<?php if ( is_active_sidebar( 'homepage-widget' ) ) { ?>
				<?php dynamic_sidebar( 'homepage-widget' ); ?>
			<?php } ?>
		<?php endif; ?>
	</div><!--mvp-home-widget-wrap-->
<?php } ?>
<?php if(get_option('mvp_home_layout') == 'Blog' || get_option('mvp_home_layout') == 'Widgets and Blog') { ?>
	<div class="mvp-body-sec-wrap left relative">
		<div class="mvp-sec-pad left relative">
		<div class="mvp-main-body-out2 relative">
			<div class="mvp-main-body-in2">
				<div class="mvp-main-body-blog left relative">
					<h4 class="mvp-sec-head"><span class="mvp-sec-head"><?php esc_html_e( 'More News', 'the-league' ); ?></span></h4>
					<ul class="mvp-main-blog-wrap left relative infinite-content">
						<?php if (isset($do_not_duplicate)) { ?>
							<?php global $post; $mvp_posts_num = esc_html(get_option('mvp_posts_num')); $paged = (get_query_var('page')) ? get_query_var('page') : 1; query_posts(array( 'posts_per_page' => $mvp_posts_num, 'post__not_in'=>$do_not_duplicate, 'paged' =>$paged )); if (have_posts()) : while (have_posts()) : the_post(); ?>
								<li class="mvp-blog-story-wrap left relative infinite-post">
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<a href="<?php the_permalink(); ?>" rel="bookmark">
										<div class="mvp-blog-story-img left relative">
											<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-reg-img' )); ?>
											<?php the_post_thumbnail('mvp-small-thumb', array( 'class' => 'mvp-mob-img' )); ?>
											<?php if ( has_post_format( 'video' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-play" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } else if ( has_post_format( 'gallery' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } ?>
										</div><!--mvp-blog-story-img-->
										</a>
										<div class="mvp-blog-story-text left relative">
											<div class="mvp-post-info-top left relative">
												<?php if ( is_sticky() ) { ?>
													<h3><?php esc_html_e( 'Sticky Post', 'the-league' ); ?></h3><span class="mvp-post-info-date left relative">/ <?php printf( _x( '%s ago', 'the-league' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
												<?php } else { ?>
													<h3><a href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></a></h3><span class="mvp-post-info-date left relative">/ <?php printf( _x( '%s ago', 'the-league' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
												<?php } ?>
											</div><!--mvp-post-info-top-->
											<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											<p><?php echo wp_trim_words( get_the_excerpt(), 21, '...' ); ?></p>
											<div class="mvp-blog-story-info left relative">
												<span class="mvp-blog-story-author left"><?php esc_html_e( 'By', 'the-league' ); ?> <?php the_author_posts_link(); ?></span>
											</div><!--mvp-blog-story-info-->
										</div><!--mvp-blog-story-text-->
									<?php } else { ?>
										<div class="mvp-blog-story-text left relative w100">
											<div class="mvp-post-info-top left relative">
												<?php if ( is_sticky() ) { ?>
													<h3><?php esc_html_e( 'Sticky Post', 'the-league' ); ?></h3><span class="mvp-post-info-date left relative">/ <?php printf( _x( '%s ago', 'the-league' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
												<?php } else { ?>
													<h3><a href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></a></h3><span class="mvp-post-info-date left relative">/ <?php printf( _x( '%s ago', 'the-league' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
												<?php } ?>
											</div><!--mvp-post-info-top-->
											<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											<p><?php echo wp_trim_words( get_the_excerpt(), 21, '...' ); ?></p>
											<div class="mvp-blog-story-info left relative">
												<span class="mvp-blog-story-author left"><?php esc_html_e( 'By', 'the-league' ); ?> <?php the_author_posts_link(); ?></span>
											</div><!--mvp-blog-story-info-->
										</div><!--mvp-blog-story-text-->
									<?php } ?>
								</li><!--mvp-blog-story-wrap-->
							<?php endwhile; endif; ?>
						<?php } else { ?>
							<?php $mvp_posts_num = esc_html(get_option('mvp_posts_num')); $paged = (get_query_var('page')) ? get_query_var('page') : 1; query_posts(array( 'posts_per_page' => $mvp_posts_num, 'paged' =>$paged )); if (have_posts()) : while (have_posts()) : the_post(); ?>
								<li class="mvp-blog-story-wrap left relative infinite-post">
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<a href="<?php the_permalink(); ?>" rel="bookmark">
										<div class="mvp-blog-story-img left relative">
											<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-reg-img' )); ?>
											<?php the_post_thumbnail('mvp-small-thumb', array( 'class' => 'mvp-mob-img' )); ?>
											<?php if ( has_post_format( 'video' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-play" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } else if ( has_post_format( 'gallery' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } ?>
										</div><!--mvp-blog-story-img-->
										</a>
										<div class="mvp-blog-story-text left relative">
											<div class="mvp-post-info-top left relative">
												<?php if ( is_sticky() ) { ?>
													<h3><?php esc_html_e( 'Sticky Post', 'the-league' ); ?></h3><span class="mvp-post-info-date left relative">/ <?php printf( _x( '%s ago', 'the-league' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
												<?php } else { ?>
													<h3><a href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></a></h3><span class="mvp-post-info-date left relative">/ <?php printf( _x( '%s ago', 'the-league' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
												<?php } ?>
											</div><!--mvp-post-info-top-->
											<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											<p><?php echo wp_trim_words( get_the_excerpt(), 21, '...' ); ?></p>
											<div class="mvp-blog-story-info left relative">
												<span class="mvp-blog-story-author left"><?php esc_html_e( 'By', 'the-league' ); ?> <?php the_author_posts_link(); ?></span>
											</div><!--mvp-blog-story-info-->
										</div><!--mvp-blog-story-text-->
									<?php } else { ?>
										<div class="mvp-blog-story-text left relative w100">
											<?php if ( is_sticky() ) { ?>
												<h3><?php esc_html_e( 'Sticky Post', 'the-league' ); ?></h3>
											<?php } else { ?>
												<h3><a href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></a></h3><span class="mvp-post-info-date left relative">/ <?php printf( _x( '%s ago', 'the-league' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
											<?php } ?>
											<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											<p><?php echo wp_trim_words( get_the_excerpt(), 21, '...' ); ?></p>
											<div class="mvp-blog-story-info left relative">
												<span class="mvp-blog-story-author left"><?php esc_html_e( 'By', 'the-league' ); ?> <?php the_author_posts_link(); ?></span>
											</div><!--mvp-blog-story-info-->
										</div><!--mvp-blog-story-text-->
									<?php } ?>
								</li><!--mvp-blog-story-wrap-->
							<?php endwhile; endif;  ?>
						<?php } ?>
					</ul><!--mvp-main-blog-wrap-->
					<?php $mvp_infinite_scroll = get_option('mvp_infinite_scroll'); if ($mvp_infinite_scroll == "true") { if (isset($mvp_infinite_scroll)) { ?>
						<a href="#" class="mvp-inf-more-but"><?php esc_html_e( 'More Posts', 'the-league' ); ?></a>
					<?php } } ?>
					<div class="mvp-nav-links">
						<?php if (function_exists("pagination")) { pagination($wp_query->max_num_pages); } ?>
					</div><!--mvp-nav-links-->
				</div><!--mvp-main-body-cont-->
			</div><!--mvp-main-body-in2-->
			<?php get_sidebar('home'); ?>
		</div><!--mvp-main-body-out2-->
		</div><!--mvp-sec-pad-->
	</div><!--mvp-body-sec-wrap-->
<?php } ?>
<?php get_footer(); ?>