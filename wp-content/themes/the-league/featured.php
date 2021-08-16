<?php $mvp_feat_layout = get_option('mvp_feat_layout'); if( $mvp_feat_layout == "Featured 1" ) { ?>
	<div class="mvp-main-body-out relative">
		<div class="mvp-main-body-in">
			<div class="mvp-main-body-cont left relative">
				<div id="mvp-feat1-wrap" class="left relative">
					<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'posts_per_page' => '1'  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
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
								<p><?php echo wp_trim_words( get_the_excerpt(), 22, '...' ); ?></p>
							</div><!--mvp-feat1-text-->
						</div><!--mvp-feat1-main-->
						</a>
					<?php endwhile; wp_reset_postdata(); ?>
					<div id="mvp-feat1-sub-wrap" class="left relative">
						<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'post__not_in'=>$do_not_duplicate, 'posts_per_page' => '2'  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; if (isset($do_not_duplicate)) { ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
							<div class="mvp-feat1-sub left relative">
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<div class="mvp-feat1-sub-img left relative">
										<?php the_post_thumbnail('mvp-mid-thumb'); ?>
									</div><!--mvp-feat1-sub-img-->
								<?php } ?>
								<div class="mvp-feat1-sub-text">
									<h3 class="mvp-feat1-cat">
										<span class="mvp-feat1-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span>
									</h3><!--mvp-feat1-cat-->
									<h2><?php the_title(); ?></h2>
								</div><!--mvp-feat1-sub-text-->
							</div><!--mvp-feat1-sub-->
							</a>
						<?php } endwhile; wp_reset_postdata(); ?>
					</div><!--mvp-feat1-sub-wrap-->
				</div><!--mvp-feat1-wrap-->
			</div><!--mvp-main-body-cont-->
		</div><!--mvp-main-body-in-->
		<div class="mvp-feat1-side-wrap right relative">
			<div class="mvp-side-widget">
				<div class="mvp-side-tab-wrap left relative">
					<div class="mvp-side-tab-top left relative">
						<ul class="mvp-side-tab-list mvp-col-tabs">
							<li class="mvp-feat-col-tab">
								<a href="#mvp-tab-col1"><span class="mvp-side-tab-head"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php esc_html_e( 'Headlines', 'the-league' ); ?></span></a>
							</li>
							<li>
								<a href="#mvp-tab-col2"><span class="mvp-side-tab-head"><i class="fa fa-bolt" aria-hidden="true"></i>
 <?php esc_html_e( 'Trending', 'the-league' ); ?></span></a>
							</li>
							<?php query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-video' )) )); if (have_posts()) : ?>
							<li>
								<a href="#mvp-tab-col3"><span class="mvp-side-tab-head"><i class="fa fa-play-circle-o" aria-hidden="true"></i>
 <?php esc_html_e( 'Videos', 'the-league' ); ?></span></a>
							</li>
							<?php endif; wp_reset_postdata(); ?>
						</ul>
					</div><!--mvp-side-tab-top-->
					<div id="mvp-tab-col1" class="mvp-side-tab-main left relative mvp-tab-col-cont">
						<?php global $do_not_duplicate; global $post; $paged = (get_query_var('page')) ? get_query_var('page') : 1; query_posts(array( 'posts_per_page' => '6', 'post__not_in'=>$do_not_duplicate, 'paged' =>$paged )); if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="mvp-side-tab-story left relative">
								<div class="mvp-side-tab-out relative">
									<a href="<?php the_permalink(); ?>" rel="bookmark">
									<div class="mvp-side-tab-img left relative">
										<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
											<?php the_post_thumbnail('mvp-small-thumb'); ?>
										<?php } ?>
										<?php if ( has_post_format( 'video' )) { ?>
											<div class="mvp-vid-box-wrap">
												<i class="fa fa-2 fa-play" aria-hidden="true"></i>
											</div><!--mvp-vid-box-wrap-->
										<?php } else if ( has_post_format( 'gallery' )) { ?>
											<div class="mvp-vid-box-wrap">
												<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
											</div><!--mvp-vid-box-wrap-->
										<?php } ?>
									</div><!--mvp-side-tab-img-->
									</a>
									<div class="mvp-side-tab-in">
										<div class="mvp-side-tab-text left relative">
											<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
											<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										</div><!--mvp-side-tab-text-->
									</div><!--mvp-side-tab-in-->
								</div><!--mvp-side-tab-out-->
							</div><!--mvp-side-tab-story-->
						<?php endwhile; endif; ?>
					</div><!--mvp-tab-col1-->
					<div id="mvp-tab-col2" class="mvp-side-tab-main left relative mvp-tab-col-cont">
						<?php global $do_not_duplicate; $pop_days = esc_html(get_option('mvp_pop_days')); $pop_num = esc_html(get_option('mvp_pop_num')); $popular_days_ago = "$pop_days days ago"; $recent = new WP_Query(array('posts_per_page' => '6', 'post__not_in' => $do_not_duplicate, 'orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'post_views_count', 'date_query' => array( array( 'after' => $popular_days_ago )) )); while($recent->have_posts()) : $recent->the_post(); ?>
							<div class="mvp-side-tab-story left relative">
								<div class="mvp-side-tab-out relative">
									<a href="<?php the_permalink(); ?>" rel="bookmark">
									<div class="mvp-side-tab-img left relative">
										<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
											<?php the_post_thumbnail('mvp-small-thumb'); ?>
										<?php } ?>
										<?php if ( has_post_format( 'video' )) { ?>
											<div class="mvp-vid-box-wrap">
												<i class="fa fa-2 fa-play" aria-hidden="true"></i>
											</div><!--mvp-vid-box-wrap-->
										<?php } else if ( has_post_format( 'gallery' )) { ?>
											<div class="mvp-vid-box-wrap">
												<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
											</div><!--mvp-vid-box-wrap-->
										<?php } ?>
									</div><!--mvp-side-tab-img-->
									</a>
									<div class="mvp-side-tab-in">
										<div class="mvp-side-tab-text left relative">
											<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
											<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										</div><!--mvp-side-tab-text-->
									</div><!--mvp-side-tab-in-->
								</div><!--mvp-side-tab-out-->
							</div><!--mvp-side-tab-story-->
						<?php endwhile; ?>
					</div><!--mvp-tab-col2-->
					<?php query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-video' )) )); if (have_posts()) : ?>
						<div id="mvp-tab-col3" class="mvp-side-tab-main left relative mvp-tab-col-cont">
							<?php global $do_not_duplicate; global $post; $paged = (get_query_var('page')) ? get_query_var('page') : 1; query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-video' )), 'posts_per_page' => '6', 'post__not_in'=>$do_not_duplicate, 'paged' =>$paged )); if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="mvp-side-tab-story left relative">
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<div class="mvp-side-tab-out relative">
										<a href="<?php the_permalink(); ?>" rel="bookmark">
										<div class="mvp-side-tab-img left relative">
											<?php the_post_thumbnail('mvp-small-thumb'); ?>
											<?php if ( has_post_format( 'video' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-play" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } else if ( has_post_format( 'gallery' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } ?>
										</div><!--mvp-side-tab-img-->
										</a>
										<div class="mvp-side-tab-in">
											<div class="mvp-side-tab-text left relative">
												<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
												<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											</div><!--mvp-side-tab-text-->
										</div><!--mvp-side-tab-in-->
									</div><!--mvp-side-tab-out-->
								<?php } else { ?>
									<div class="mvp-side-tab-text left relative">
										<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
										<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
									</div><!--mvp-side-tab-text-->
								<?php } ?>
							</div><!--mvp-side-tab-story-->
							<?php endwhile; endif; wp_reset_query(); ?>
						</div><!--mvp-tab-col3-->
					<?php endif; wp_reset_query(); ?>
				</div><!--mvp-side-tab-wrap-->
			</div><!--mvp-side-widget-->
		</div><!--mvp-feat1-side-wrap-->
	</div><!--mvp-main-body-out-->
<?php } else if( $mvp_feat_layout == "Featured 2" ) { ?>
	<div id="mvp-feat2-wrap" class="left relative">
		<div class="mvp-feat2-right-out relative">
			<div class="mvp-feat2-right-in">
				<div class="mvp-feat2-left-wrap left relative">
					<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'posts_per_page' => '1'  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark">
						<div class="mvp-feat2-main left relative">
							<div class="mvp-feat2-main-img left relative">
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<?php the_post_thumbnail('mvp-post-thumb', array( 'class' => 'mvp-reg-img' )); ?>
									<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-mob-img' )); ?>
								<?php } ?>
							</div><!--mvp-feat2-main-img-->
							<div class="mvp-feat2-main-text">
								<h3 class="mvp-feat1-cat">
									<span class="mvp-feat1-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span>
								</h3><!--mvp-feat1-cat-->
								<?php if(get_post_meta($post->ID, "mvp_featured_headline", true)): ?>
									<h2><?php echo esc_html(get_post_meta($post->ID, "mvp_featured_headline", true)); ?></h2>
								<?php else: ?>
									<h2 class="mvp-stand-title"><?php the_title(); ?></h2>
								<?php endif; ?>
								<p><?php echo wp_trim_words( get_the_excerpt(), 17, '...' ); ?></p>
							</div><!--mvp-feat2-main-text-->
						</div><!--mvp-feat2-main-->
						</a>
					<?php endwhile; wp_reset_postdata(); ?>
					<div class="mvp-feat2-left-sub left relative">
						<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'post__not_in'=>$do_not_duplicate, 'posts_per_page' => '2'  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; if (isset($do_not_duplicate)) { ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
							<div class="mvp-feat2-sub-wrap left relative">
								<div class="mvp-feat2-sub-img left relative">
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<?php the_post_thumbnail('mvp-mid-thumb'); ?>
									<?php } ?>
								</div><!--mvp-feat2-sub-img-->
								<div class="mvp-feat2-sub-text">
									<h3 class="mvp-feat1-cat">
										<span class="mvp-feat1-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span>
									</h3><!--mvp-feat1-cat-->
									<h2><?php the_title(); ?></h2>
								</div><!--mvp-feat2-sub-text-->
							</div><!--mvp-feat2-left-sub-wrap-->
							</a>
						<?php } endwhile; wp_reset_postdata(); ?>
					</div><!--mvp-feat2-left-sub-->
				</div><!--mvp-feat2-left-wrap-->
			</div><!--mvp-feat2-right-in-->
			<div class="mvp-feat2-right-wrap relative">
				<ul class="mvp-feat2-list left relative">
					<?php global $do_not_duplicate; global $post; $paged = (get_query_var('page')) ? get_query_var('page') : 1; query_posts(array( 'posts_per_page' => '5', 'post__not_in'=>$do_not_duplicate, 'paged' =>$paged )); if (have_posts()) : while (have_posts()) : the_post(); ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark">
						<li>
							<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
							<h2><?php the_title(); ?></h2>
						</li>
						</a>
					<?php endwhile; endif; wp_reset_query(); ?>
				</ul>
			</div><!--mvp-feat2-right-wrap-->
		</div><!--mvp-feat2-right-out-->
	</div><!--mvp-feat2-wrap-->
<?php } else if( $mvp_feat_layout == "Featured 3" ) { ?>
	<div id="mvp-feat3-wrap" class="left relative">
		<div class="mvp-feat3-left left relative">
			<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'posts_per_page' => '1'  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
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
			<?php endwhile; wp_reset_postdata(); ?>
		</div><!--mvp-feat3-left-->
		<div class="mvp-feat3-right left relative">
			<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'post__not_in'=>$do_not_duplicate, 'posts_per_page' => '2'  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; if (isset($do_not_duplicate)) { ?>
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
<?php } else if( $mvp_feat_layout == "Featured 4" ) { ?>
	<div id="mvp-feat4-wrap" class="left relative">
		<div class="mvp-sec-pad left relative">
			<div class="mvp-main-body-out4 relative">
				<div class="mvp-main-body-in4">
					<div class="mvp-feat4-left-wrap left relative">
						<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'posts_per_page' => '1'  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
							<div class="mvp-feat4-main-wrap left relative">
								<div class="mvp-feat4-main-img left relative">
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<?php the_post_thumbnail('mvp-post-thumb', array( 'class' => 'mvp-reg-img' )); ?>
										<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-mob-img' )); ?>
									<?php } ?>
								</div><!--mvp-feat4-main-img-->
								<div class="mvp-feat4-main-text left relative">
									<h3 class="mvp-feat1-cat">
										<span class="mvp-feat1-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span>
									</h3><!--mvp-feat1-cat-->
									<?php if(get_post_meta($post->ID, "mvp_featured_headline", true)): ?>
										<h2><?php echo esc_html(get_post_meta($post->ID, "mvp_featured_headline", true)); ?></h2>
									<?php else: ?>
										<h2 class="mvp-stand-title"><?php the_title(); ?></h2>
									<?php endif; ?>
									<p><?php echo wp_trim_words( get_the_excerpt(), 22, '...' ); ?></p>
								</div><!--mvp-feat4-main-text-->
							</div><!--mvp-feat4-main-wrap-->
							</a>
						<?php endwhile; wp_reset_postdata(); ?>
						<div class="mvp-feat4-sub-wrap left relative">
							<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'post__not_in'=>$do_not_duplicate, 'posts_per_page' => '2'  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; if (isset($do_not_duplicate)) { ?>
								<div class="mvp-feat4-sub left relative">
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<a href="<?php the_permalink(); ?>" rel="bookmark">
										<div class="mvp-feat4-sub-img left relative">
											<?php the_post_thumbnail('mvp-mid-thumb'); ?>
										</div><!--mvp-feat4-sub-img-->
										</a>
									<?php } ?>
									<div class="mvp-feat4-sub-text left relative">
										<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
										<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										<p><?php echo wp_trim_words( get_the_excerpt(), 22, '...' ); ?></p>
										<div class="mvp-blog-story-info left relative">
											<span class="mvp-blog-story-author left"><?php esc_html_e( 'By', 'the-league' ); ?> <?php the_author_posts_link(); ?></span>
										</div><!--mvp-blog-story-info-->
									</div><!--mvp-feat4-sub-text-->
								</div><!--mvp-feat4-sub-->
							<?php } endwhile; wp_reset_postdata(); ?>
						</div><!--mvp-feat4-sub-wrap-->
					</div><!--mvp-feat4-left-wrap-->
				</div><!--mvp-main-body-in4-->
				<div class="mvp-feat4-side-wrap right relative">
					<?php if(get_option('mvp_feat_ad')) { ?>
						<div class="mvp-side-widget">
							<div class="mvp-widget-ad left relative">
								<?php $mvp_feat_ad300 = get_option('mvp_feat_ad'); if ($mvp_feat_ad300) { echo do_shortcode(html_entity_decode($mvp_feat_ad300)); } ?>
							</div><!--mvp-widget-ad-->
						</div><!--mvp-side-widget-->
					<?php } ?>
					<div class="mvp-side-widget">
						<div class="mvp-side-tab-wrap left relative">
							<div class="mvp-side-tab-top left relative">
								<ul class="mvp-side-tab-list mvp-col-tabs">
									<li class="mvp-feat-col-tab">
										<a href="#mvp-tab-col1"><span class="mvp-side-tab-head"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php esc_html_e( 'Headlines', 'the-league' ); ?></span></a>
									</li>
									<li>
										<a href="#mvp-tab-col2"><span class="mvp-side-tab-head"><i class="fa fa-bolt" aria-hidden="true"></i>
 <?php esc_html_e( 'Trending', 'the-league' ); ?></span></a>
									</li>
									<?php query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-video' )) )); if (have_posts()) : ?>
									<li>
										<a href="#mvp-tab-col3"><span class="mvp-side-tab-head"><i class="fa fa-play-circle-o" aria-hidden="true"></i>
 <?php esc_html_e( 'Videos', 'the-league' ); ?></span></a>
									</li>
									<?php endif; wp_reset_query(); ?>
								</ul>
							</div><!--mvp-side-tab-top-->
					<div id="mvp-tab-col1" class="mvp-side-tab-main left relative mvp-tab-col-cont">
						<?php global $do_not_duplicate; global $post; $mvp_feat_ad = get_option('mvp_feat_ad'); if ($mvp_feat_ad) { $mvp_feat_ad_num = '5'; } else { $mvp_feat_ad_num = '8'; } $paged = (get_query_var('page')) ? get_query_var('page') : 1; query_posts(array( 'posts_per_page' => $mvp_feat_ad_num, 'post__not_in'=>$do_not_duplicate, 'paged' =>$paged )); if (have_posts()) : while (have_posts()) : the_post(); $do_not_duplicate[] = $post->ID; ?>
							<div class="mvp-side-tab-story left relative">
								<div class="mvp-side-tab-out relative">
									<a href="<?php the_permalink(); ?>" rel="bookmark">
									<div class="mvp-side-tab-img left relative">
										<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
											<?php the_post_thumbnail('mvp-small-thumb'); ?>
										<?php } ?>
										<?php if ( has_post_format( 'video' )) { ?>
											<div class="mvp-vid-box-wrap">
												<i class="fa fa-2 fa-play" aria-hidden="true"></i>
											</div><!--mvp-vid-box-wrap-->
										<?php } else if ( has_post_format( 'gallery' )) { ?>
											<div class="mvp-vid-box-wrap">
												<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
											</div><!--mvp-vid-box-wrap-->
										<?php } ?>
									</div><!--mvp-side-tab-img-->
									</a>
									<div class="mvp-side-tab-in">
										<div class="mvp-side-tab-text left relative">
											<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
											<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										</div><!--mvp-side-tab-text-->
									</div><!--mvp-side-tab-in-->
								</div><!--mvp-side-tab-out-->
							</div><!--mvp-side-tab-story-->
						<?php endwhile; endif; ?>
					</div><!--mvp-tab-col1-->
					<div id="mvp-tab-col2" class="mvp-side-tab-main left relative mvp-tab-col-cont">
						<?php $pop_days = esc_html(get_option('mvp_pop_days')); $pop_num = esc_html(get_option('mvp_pop_num')); $popular_days_ago = "$pop_days days ago"; $mvp_feat_ad = get_option('mvp_feat_ad'); if ($mvp_feat_ad) { $mvp_feat_ad_num = '5'; } else { $mvp_feat_ad_num = '8'; } $recent = new WP_Query(array('posts_per_page' => $mvp_feat_ad_num, 'post__not_in' => $do_not_duplicate, 'orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'post_views_count', 'date_query' => array( array( 'after' => $popular_days_ago )) )); while($recent->have_posts()) : $recent->the_post(); ?>
							<div class="mvp-side-tab-story left relative">
								<div class="mvp-side-tab-out relative">
									<a href="<?php the_permalink(); ?>" rel="bookmark">
									<div class="mvp-side-tab-img left relative">
										<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
											<?php the_post_thumbnail('mvp-small-thumb'); ?>
										<?php } ?>
										<?php if ( has_post_format( 'video' )) { ?>
											<div class="mvp-vid-box-wrap">
												<i class="fa fa-2 fa-play" aria-hidden="true"></i>
											</div><!--mvp-vid-box-wrap-->
										<?php } else if ( has_post_format( 'gallery' )) { ?>
											<div class="mvp-vid-box-wrap">
												<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
											</div><!--mvp-vid-box-wrap-->
										<?php } ?>
									</div><!--mvp-side-tab-img-->
									</a>
									<div class="mvp-side-tab-in">
										<div class="mvp-side-tab-text left relative">
											<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
											<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										</div><!--mvp-side-tab-text-->
									</div><!--mvp-side-tab-in-->
								</div><!--mvp-side-tab-out-->
							</div><!--mvp-side-tab-story-->
						<?php endwhile; ?>
					</div><!--mvp-tab-col2-->
					<?php query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-video' )) )); if (have_posts()) : ?>
						<div id="mvp-tab-col3" class="mvp-side-tab-main left relative mvp-tab-col-cont">
							<?php global $post; $paged = (get_query_var('page')) ? get_query_var('page') : 1; $mvp_feat_ad = get_option('mvp_feat_ad'); if ($mvp_feat_ad) { $mvp_feat_ad_num = '5'; } else { $mvp_feat_ad_num = '8'; } query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-video' )), 'posts_per_page' => $mvp_feat_ad_num, 'post__not_in'=>$do_not_duplicate, 'paged' =>$paged )); if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="mvp-side-tab-story left relative">
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<div class="mvp-side-tab-out relative">
										<a href="<?php the_permalink(); ?>" rel="bookmark">
										<div class="mvp-side-tab-img left relative">
											<?php the_post_thumbnail('mvp-small-thumb'); ?>
											<?php if ( has_post_format( 'video' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-play" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } else if ( has_post_format( 'gallery' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } ?>
										</div><!--mvp-side-tab-img-->
										</a>
										<div class="mvp-side-tab-in">
											<div class="mvp-side-tab-text left relative">
												<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
												<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											</div><!--mvp-side-tab-text-->
										</div><!--mvp-side-tab-in-->
									</div><!--mvp-side-tab-out-->
								<?php } else { ?>
									<div class="mvp-side-tab-text left relative">
										<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
										<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
									</div><!--mvp-side-tab-text-->
								<?php } ?>
							</div><!--mvp-side-tab-story-->
							<?php endwhile; endif; wp_reset_query(); ?>
						</div><!--mvp-tab-col3-->
					<?php endif; wp_reset_query(); ?>
				</div><!--mvp-side-tab-wrap-->
			</div><!--mvp-side-widget-->
				</div><!--mvp-feat4-side-wrap-->
			</div><!--mvp-main-body-out4-->
		</div><!--mvp-sec-pad-->
	</div><!--mvp-feat4-wrap-->
<?php } else if( $mvp_feat_layout == "Featured 5" ) { ?>
	<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'posts_per_page' => '1'  )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
		<div id="mvp-feat5-wrap" class="left relative">
			<div class="mvp-feat5-out left relative">
				<div class="mvp-feat5-in">
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark">
						<div class="mvp-feat5-img left relative">
							<?php the_post_thumbnail('mvp-post-thumb', array( 'class' => 'mvp-reg-img' )); ?>
							<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-mob-img' )); ?>
						</div><!--mvp-feat5-img-->
						</a>
					<?php } ?>
				</div><!--mvp-feat5-in-->
				<div class="mvp-feat5-text left relative">
					<h3 class="mvp-feat1-cat">
						<span class="mvp-feat1-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span>
					</h3><!--mvp-feat1-cat-->
					<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p><?php echo wp_trim_words( get_the_excerpt(), 22, '...' ); ?></p>
					<div class="mvp-blog-story-info left relative">
						<span class="mvp-blog-story-author left"><?php esc_html_e( 'By', 'the-league' ); ?> <?php the_author_posts_link(); ?></span>
					</div><!--mvp-blog-story-info-->
				</div><!--mvp-feat5-text-->
			</div><!--mvp-feat5-out-->
		</div><!--mvp-feat5-wrap-->
	<?php endwhile; wp_reset_postdata(); ?>
<?php } ?>