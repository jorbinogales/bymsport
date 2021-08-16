<?php get_header(); ?>
<?php $mvp_cat_layout = get_option('mvp_cat_layout'); if( $mvp_cat_layout == "Featured 2" ) { ?>
	<div class="mvp-body-sec-wrap left relative">
	<div id="mvp-feat3-wrap" class="left relative">
		<div class="mvp-feat3-left left relative">
			<?php global $do_not_duplicate; global $post; $cat_posts = new WP_Query(array( 'cat' => get_query_var('cat'), 'posts_per_page' => '1'  )); while($cat_posts->have_posts()) : $cat_posts->the_post(); $do_not_duplicate[] = $post->ID; if (isset($do_not_duplicate)) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark">
				<div class="mvp-feat3-main left relative">
					<div class="mvp-feat3-main-img left relative">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
							<?php the_post_thumbnail('mvp-post-thumb', array( 'class' => 'mvp-reg-img' )); ?>
							<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-mob-img' )); ?>
						<?php } ?>
					</div><!--mvp-feat3-main-img-->
					<div class="mvp-feat3-main-text">
						<h3 class="mvp-feat1-cat">
							<span class="mvp-feat1-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span>
						</h3><!--mvp-feat1-cat-->
						<?php if(get_post_meta($post->ID, "mvp_featured_headline", true)): ?>
							<h2><?php echo esc_html(get_post_meta($post->ID, "mvp_featured_headline", true)); ?></h2>
						<?php else: ?>
							<h2 class="mvp-stand-title"><?php the_title(); ?></h2>
						<?php endif; ?>
						<p><?php echo wp_trim_words( get_the_excerpt(), 21, '...' ); ?></p>
					</div><!--mvp-feat3-main-text-->
				</div><!--mvp-feat3-main-->
				</a>
			<?php } endwhile; wp_reset_postdata(); ?>
		</div><!--mvp-feat3-left-->
		<div class="mvp-feat3-right left relative">
			<?php global $do_not_duplicate; global $post; $cat_posts = new WP_Query(array( 'cat' => get_query_var('cat'),'post__not_in'=>$do_not_duplicate, 'posts_per_page' => '2'  )); while($cat_posts->have_posts()) : $cat_posts->the_post(); $do_not_duplicate[] = $post->ID; if (isset($do_not_duplicate)) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark">
				<div class="mvp-feat3-sub left relative">
					<div class="mvp-feat3-sub-img left relative">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
							<?php the_post_thumbnail('mvp-mid-thumb'); ?>
						<?php } ?>
					</div><!--mvp-feat3-sub-img-->
					<div class="mvp-feat3-sub-text left relative">
						<h3 class="mvp-feat1-cat">
							<span class="mvp-feat1-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span>
						</h3><!--mvp-feat1-cat-->
						<h2><?php the_title(); ?></h2>
					</div><!--mvp-feat3-sub-text-->
				</div><!--mvp-feat3-sub-->
				</a>
			<?php } endwhile; wp_reset_postdata(); ?>
		</div><!--mvp-feat3-right-->
	</div><!--mvp-feat3-wrap-->
	</div><!--mvp-body-sec-wrap-->
<?php } ?>
<div class="mvp-body-sec-wrap left relative">
	<div class="mvp-sec-pad left relative">
		<div class="mvp-main-body-out2 relative">
			<div class="mvp-main-body-in2">
				<div class="mvp-main-body-blog left relative">
					<?php $mvp_feat_cat = get_option('mvp_feat_cat'); if ($mvp_feat_cat == "true") { if ( $paged < 2 ) { ?>
						<?php $mvp_cat_layout = get_option('mvp_cat_layout'); if( $mvp_cat_layout == "Featured 1" ) { ?>
							<?php global $do_not_duplicate; global $post; $cat_posts = new WP_Query(array( 'cat' => get_query_var('cat'), 'posts_per_page' => '1'  )); while($cat_posts->have_posts()) : $cat_posts->the_post(); $do_not_duplicate[] = $post->ID; if (isset($do_not_duplicate)) { ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
								<div id="mvp-feat1-main" class="left relative">
									<div class="mvp-feat1-img left relative">
										<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
											<?php the_post_thumbnail('mvp-post-thumb', array( 'class' => 'mvp-reg-img' )); ?>
											<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-mob-img' )); ?>
										<?php } ?>
									</div><!--mvp-feat1-img-->
									<div class="mvp-feat1-text">
										<h3 class="mvp-feat1-cat">
											<span class="mvp-feat1-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span>
										</h3><!--mvp-feat1-cat-->
										<?php if(get_post_meta($post->ID, "mvp_featured_headline", true)): ?>
											<h2><?php echo esc_html(get_post_meta($post->ID, "mvp_featured_headline", true)); ?></h2>
										<?php else: ?>
											<h2 class="mvp-stand-title"><?php the_title(); ?></h2>
										<?php endif; ?>
										<p><?php echo wp_trim_words( get_the_excerpt(), 26, '...' ); ?></p>
									</div><!--mvp-feat1-text-->
								</div><!--mvp-feat1-main-->
								</a>
							<?php } endwhile; wp_reset_postdata(); ?>
						<?php } ?>
					<?php } } ?>
					<ul class="mvp-main-blog-wrap left relative infinite-content">
						<?php if (isset($do_not_duplicate)) { ?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); if (in_array($post->ID, $do_not_duplicate)) continue; ?>
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
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
			<?php get_sidebar(); ?>
		</div><!--mvp-main-body-out2-->
	</div><!--mvp-sec-pad-->
</div><!--mvp-body-sec-wrap-->
<?php get_footer(); ?>