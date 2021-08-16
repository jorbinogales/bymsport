				</div><!--mvp-main-body-->
			</div><!--mvp-main-box-cont-->
		</div><!--mvp-main-body-wrap-->
	</main><!--mvp-main-wrap-->
	<?php if(get_option('mvp_footer_leader')) { ?>
		<div id="mvp-foot-ad-wrap" class="left relative">
			<div class="mvp-main-box-cont">
				<?php $foot_ad = get_option('mvp_footer_leader'); if ($foot_ad) { echo do_shortcode(html_entity_decode($foot_ad)); } ?>
			</div><!--mvp-main-box-cont-->
		</div><!--mvp-foot-ad-wrap-->
	<?php } ?>
	<footer id="mvp-foot-wrap" class="left relative">
		<div id="mvp-foot-top" class="left relative">
			<div class="mvp-main-box-cont">
				<div id="mvp-foot-logo" class="left relative">
					<?php if(get_option('mvp_logo')) { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_option('mvp_logo_foot')); ?>" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
					<?php } else { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-foot.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
					<?php } ?>
				</div><!--mvp-foot-logo-->
				<div id="mvp-foot-soc" class="left relative">
					<ul class="mvp-foot-soc-list left relative">
						<?php if(get_option('mvp_facebook')) { ?>
								<li><a href="<?php echo esc_url(get_option('mvp_facebook')); ?>" target="_blank" class="fa fa-facebook-official fa-2"></a></li>
						<?php } ?>
						<?php if(get_option('mvp_twitter')) { ?>
							<li><a href="<?php echo esc_url(get_option('mvp_twitter')); ?>" target="_blank" class="fa fa-twitter fa-2"></a></li>
						<?php } ?>
						<?php if(get_option('mvp_pinterest')) { ?>
							<li><a href="<?php echo esc_url(get_option('mvp_pinterest')); ?>" target="_blank" class="fa fa-pinterest-p fa-2"></a></li>
						<?php } ?>
						<?php if(get_option('mvp_instagram')) { ?>
							<li><a href="<?php echo esc_url(get_option('mvp_instagram')); ?>" target="_blank" class="fa fa-instagram fa-2"></a></li>
						<?php } ?>
						<?php if(get_option('mvp_google')) { ?>
							<li><a href="<?php echo esc_url(get_option('mvp_google')); ?>" target="_blank" class="fa fa-google-plus fa-2"></a></li>
						<?php } ?>
						<?php if(get_option('mvp_youtube')) { ?>
							<li><a href="<?php echo esc_url(get_option('mvp_youtube')); ?>" target="_blank" class="fa fa-youtube-play fa-2"></a></li>
						<?php } ?>
						<?php if(get_option('mvp_linkedin')) { ?>
							<li><a href="<?php echo esc_url(get_option('mvp_linkedin')); ?>" target="_blank" class="fa fa-linkedin fa-2"></a></li>
						<?php } ?>
						<?php if(get_option('mvp_tumblr')) { ?>
							<li><a href="<?php echo esc_url(get_option('mvp_tumblr')); ?>" target="_blank" class="fa fa-tumblr fa-2"></a></li>
						<?php } ?>
					</ul>
				</div><!--mvp-foot-soc-->
			</div><!--mvp-main-box-cont-->
		</div><!--mvp-foot-top-->
		<div id="mvp-foot-bot" class="left relative">
			<div id="mvp-foot-menu-wrap" class="left relative">
				<div class="mvp-main-box-cont">
					<div id="mvp-foot-menu" class="left relative">
						<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'fallback_cb' => 'false')); ?>
					</div><!--mvp-foot-menu-->
				</div><!--mvp-main-box-cont-->
			</div><!--mvp-foot-menu-wrap-->
			<div id="mvp-foot-copy-wrap" class="left relative">
				<div class="mvp-main-box-cont">
					<div id="mvp-foot-copy" class="left relative">
						<p><?php echo wp_kses_post(get_option('mvp_copyright')); ?></p>
					</div><!--mvp-foot-copy-->
				</div><!--mvp-main-box-cont-->
			</div><!--mvp-foot-copy-wrap-->
		</div><!--mvp-foot-bot-->
	</footer>
	<?php if( is_single() ) { ?>
	<?php $socialbox = get_option('mvp_social_box'); if ($socialbox == "true") { ?>
		<div id="mvp-mob-soc-wrap" class="left relative">
			<span class="mvp-mob-soc-share-but fa fa-share fa-2 mvp-mob-soc-click" aria-hidden="true"></span>
			<ul class="mvp-mob-soc-list left relative">
				<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>', 'facebookShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Share on Facebook', 'the-league' ); ?>">
				<li class="mvp-mob-soc-fb">
					<i class="fa fa-2 fa-facebook" aria-hidden="true"></i>
				</li>
				</a>
				<a href="#" onclick="window.open('http://twitter.com/share?text=<?php the_title(); ?> -&amp;url=<?php the_permalink() ?>', 'twitterShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Tweet This Post', 'the-league' ); ?>">
				<li class="mvp-mob-soc-twit">
					<i class="fa fa-2 fa-twitter" aria-hidden="true"></i>
				</li>
				</a>
				<a href="#" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mvp-post-thumb' ); echo esc_url($thumb['0']); ?>&amp;description=<?php the_title(); ?>', 'pinterestShare', 'width=750,height=350'); return false;" title="<?php esc_html_e( 'Pin This Post', 'the-league' ); ?>">
				<li class="mvp-mob-soc-pin">
					<i class="fa fa-2 fa-pinterest-p" aria-hidden="true"></i>
				</li>
				</a>
				<a href="mailto:?subject=<?php the_title(); ?>&amp;BODY=<?php esc_html_e( 'I found this article interesting and thought of sharing it with you. Check it out:', 'the-league' ); ?> <?php the_permalink(); ?>">
				<li class="mvp-mob-soc-email">
					<i class="fa fa-2 fa-envelope" aria-hidden="true"></i>
				</li>
				</a>
			</ul>
		</div><!--mvp-post-soc-wrap-->
	<?php } ?>
	<?php } ?>
</div><!--mvp-site-->
			<?php if( is_single() ); { ?>
				<?php $mvp_show_trend = get_option('mvp_show_trend'); if ($mvp_show_trend == "true") { ?>
					<div id="mvp-post-trend-wrap">
						<div class="mvp-main-box-cont relative">
							<ul class="mvp-post-trend-list left relative">
								<?php $mvp_trend_days = get_option('mvp_trend_days'); $popular_days_ago = "$mvp_trend_days days ago"; $recent = new WP_Query(array( 'posts_per_page' => '4', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'post_views_count', 'date_query' => array( array( 'after' => $popular_days_ago )) )); while($recent->have_posts()) : $recent->the_post(); ?>
									<li>
										<div class="mvp-post-trend-out relative">
											<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
												<div class="mvp-post-trend-img left relative">
													<a href="<?php the_permalink(); ?>" rel="bookmark">
														<div class="mvp-trend-widget-img left relative">
															<?php the_post_thumbnail('mvp-small-thumb'); ?>
														</div><!--mvp-trend-widget-img-->
													</a>
												</div><!--mvp-post-trend-img-->
											<?php } ?>
											<div class="mvp-post-trend-in">
												<div class="mvp-post-trend-text left relative">
													<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
													<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
												</div><!--mvp-post-trend-text-->
											</div><!--mvp-post-trend-in-->
										</div><!--mvp-post-trend-out-->
									</li>
								<?php endwhile; wp_reset_postdata(); ?>
							</ul>
							<span class="mvp-post-trend-but fa fa-angle-down mvp-post-trend-but-click" aria-hidden="true"></span>
						</div><!--mvp-main-box-cont-->
					</div><!--mvp-post-trend-wrap-->
				<?php } ?>
			<?php } ?>
<div class="mvp-fly-top back-to-top">
	<i class="fa fa-angle-up fa-3"></i>
</div><!--mvp-fly-top-->
<div class="mvp-fly-fade mvp-fly-but-click">
</div><!--mvp-fly-fade-->
<?php wp_footer(); ?>
</body>
</html>