<?php get_header(); ?>
<?php global $author; $userdata = get_userdata($author); ?>
<article id="mvp-article-wrap" <?php post_class(); ?> itemscope itemtype="http://schema.org/NewsArticle">
	<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( ! $mvp_post_temp && $mvp_post_layout == 'Template 5' ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 6' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 5' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 6' ) || $mvp_post_temp == "temp5" || $mvp_post_temp == "temp6" ) { ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php $mvp_featured_img = get_option('mvp_featured_img'); $mvp_show_hide = get_post_meta($post->ID, "mvp_featured_image", true); if ($mvp_featured_img == "true") { if ($mvp_show_hide !== "hide") { ?>
			<?php if(get_post_meta($post->ID, "mvp_video_embed", true)) { ?>
				<div id="mvp-video-embed" class="left relative">
					<?php echo html_entity_decode(get_post_meta($post->ID, "mvp_video_embed", true)); ?>
				</div><!--mvp-video-embed-->
			<?php } else { ?>
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<div id="mvp-post-feat-img-wide" class="left relative" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
						<?php the_post_thumbnail(''); ?>
						<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
						<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
						<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
						<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
						<div class="mvp-post-feat-wide-text">
							<h3 class="mvp-feat1-cat">
								<span class="mvp-feat1-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span>
							</h3><!--mvp-feat1-cat-->
							<h1 class="mvp-post-title relative"><?php the_title(); ?></h1>
							<?php if ( has_excerpt() ) { ?>
								<span class="mvp-post-excerpt relative"><?php the_excerpt(); ?></span>
							<?php } ?>
						</div><!--mvp-post-feat-wide-text-->
						<?php global $post; if(get_post_meta($post->ID, "mvp_photo_credit", true)): ?>
							<span class="mvp-feat-caption-wide"><?php echo wp_kses_post(get_post_meta($post->ID, "mvp_photo_credit", true)); ?></span>
						<?php endif; ?>
					</div><!--mvp-post-feat-img-wide-->
				<?php } ?>
			<?php } ?>
		<?php } else { ?>
			<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
				<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
				<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
				<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
			</div><!--mvp-post-img-hide-->
		<?php } ?>
		<?php } else { ?>
			<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
				<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
				<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
				<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
			</div><!--mvp-post-img-hide-->
		<?php } ?>
	<?php endwhile; endif; ?>
	<div class="mvp-post-feat-wide-title">
		<h1 class="mvp-post-title relative entry-title" itemprop="headline"><?php the_title(); ?></h1>
	</div><!--mvp-post-feat-wide-title-->
	<?php } ?>
	<div class="mvp-sec-pad left relative">
		<?php if ( is_singular( 'scoreboard' )) { ?>
			<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( ! $mvp_post_temp && $mvp_post_layout == 'Template 5' ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 6' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 5' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 6' ) || $mvp_post_temp == "temp5" || $mvp_post_temp == "temp6" ) { ?>
				<div id="mvp-article-head" class="left relative">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1 class="mvp-post-title left entry-title" itemprop="headline"><?php the_title(); ?></h1>
					<?php endwhile; endif; ?>
				</div><!--mvp-article-head-->
<?php } ?>
		<?php } ?>
		<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>"/>
		<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( ! $mvp_post_temp && $mvp_post_layout == 'Template 1' ) || ( ! $mvp_post_temp && ! $mvp_post_layout ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 2' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 1' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 2' ) || $mvp_post_temp == "temp1" || $mvp_post_temp == "temp2" ) { ?>
		<div id="mvp-article-head" class="left relative">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if ( ! is_singular( 'scoreboard' )) { ?>
					<h3 class="mvp-post-cat left"><a class="mvp-post-cat-link" href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><span class="mvp-post-cat left"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></a></h3>
				<?php } ?>
				<h1 class="mvp-post-title left entry-title" itemprop="headline"><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) { ?>
					<span class="mvp-post-excerpt left"><?php the_excerpt(); ?></span>
				<?php } ?>
				<?php $author_info = get_option('mvp_author_info'); if ($author_info == "true") { ?>
				<div class="mvp-author-info-wrap left relative">
					<ul class="mvp-author-info-list left relative">
						<li class="mvp-author-info-thumb">
							<?php echo get_avatar( get_the_author_meta('email'), '46' ); ?>
						</li>
						<li class="mvp-author-info-name" itemprop="author" itemscope itemtype="https://schema.org/Person">
							<p><?php esc_html_e( 'by', 'the-league' ); ?></p> <span class="author-name vcard fn author" itemprop="name"><?php the_author_posts_link(); ?></span>
						</li>
						<?php $authtwitter = get_the_author_meta( 'twitter' ); if ( ! empty ( $authtwitter ) ) { ?>
							<li class="mvp-author-info-twit">
									<a href="<?php echo esc_url(the_author_meta('twitter')); ?>" class="mvp-twit-but" target="_blank"><span class="mvp-author-info-twit-but"><i class="fa fa-twitter fa-2"></i></span></a>
							</li>
						<?php } ?>
						<li class="mvp-author-info-date">
							<span class="mvp-post-date updated"><time class="post-date updated" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></span>
							<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>"/>
						</li>
					</ul>
				</div><!--mvp-author-info-wrap-->
				<?php } ?>
			<?php endwhile; endif; ?>
		</div><!--mvp-article-head-->
		<?php } ?>
		<div class="mvp-post-content-out relative">
			<div class="mvp-post-content-in">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div id="mvp-post-content" class="left relative">
						<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( ! $mvp_post_temp && $mvp_post_layout == 'Template 7' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 7' ) || $mvp_post_temp == "temp7" ) { ?>
							<?php $mvp_featured_img = get_option('mvp_featured_img'); $mvp_show_hide = get_post_meta($post->ID, "mvp_featured_image", true); if ($mvp_featured_img == "true") { if ($mvp_show_hide !== "hide") { ?>
								<?php if(get_post_meta($post->ID, "mvp_video_embed", true)) { ?>
									<div id="mvp-video-embed" class="left relative">
										<?php echo html_entity_decode(get_post_meta($post->ID, "mvp_video_embed", true)); ?>
									</div><!--mvp-video-embed-->
								<?php } else { ?>
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<div id="mvp-post-feat-img" class="left relative mvp-post-feat-img-wide2" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
											<?php the_post_thumbnail(''); ?>
											<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
											<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
											<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
											<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
										</div><!--mvp-post-feat-img-->
										<?php global $post; if(get_post_meta($post->ID, "mvp_photo_credit", true)): ?>
											<span class="mvp-feat-caption"><?php echo wp_kses_post(get_post_meta($post->ID, "mvp_photo_credit", true)); ?></span>
										<?php endif; ?>
									<?php } ?>
								<?php } ?>
							<?php } else { ?>
								<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
									<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
									<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
									<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
									<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
								</div><!--mvp-post-img-hide-->
							<?php } ?>
							<?php } else { ?>
								<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
									<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
									<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
									<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
									<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
								</div><!--mvp-post-img-hide-->
							<?php } ?>
						<?php } ?>
						<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( ! $mvp_post_temp && $mvp_post_layout == 'Template 8' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 8' ) || $mvp_post_temp == "temp8" ) { ?>
							<?php $mvp_featured_img = get_option('mvp_featured_img'); $mvp_show_hide = get_post_meta($post->ID, "mvp_featured_image", true); if ($mvp_featured_img == "true") { if ($mvp_show_hide !== "hide") { ?>
								<?php if(get_post_meta($post->ID, "mvp_video_embed", true)) { ?>
									<div id="mvp-video-embed" class="left relative">
										<?php echo html_entity_decode(get_post_meta($post->ID, "mvp_video_embed", true)); ?>
									</div><!--mvp-video-embed-->
								<?php } else { ?>
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<div id="mvp-post-feat-img" class="left relative mvp-post-feat-img-wide3" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
											<?php the_post_thumbnail(''); ?>
											<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
											<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
											<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
											<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
										</div><!--mvp-post-feat-img-->
										<?php global $post; if(get_post_meta($post->ID, "mvp_photo_credit", true)): ?>
											<span class="mvp-feat-caption"><?php echo wp_kses_post(get_post_meta($post->ID, "mvp_photo_credit", true)); ?></span>
										<?php endif; ?>
									<?php } ?>
								<?php } ?>
							<?php } else { ?>
								<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
									<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
									<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
									<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
									<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
								</div><!--mvp-post-img-hide-->
							<?php } ?>
							<?php } else { ?>
								<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
									<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
									<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
									<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
									<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
								</div><!--mvp-post-img-hide-->
							<?php } ?>
						<?php } ?>
						<div class="mvp-content-box">
							<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( ! $mvp_post_temp && $mvp_post_layout == 'Template 3' ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 4' ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 7' ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 8' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 3' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 4' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 7' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 8' ) || $mvp_post_temp == "temp3" || $mvp_post_temp == "temp4" || $mvp_post_temp == "temp7" || $mvp_post_temp == "temp8" ) { ?>
								<div id="mvp-article-head2" class="left relative">
									<?php if ( ! is_singular( 'scoreboard' )) { ?>
										<h3 class="mvp-post-cat left"><a class="mvp-post-cat-link" href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><span class="mvp-post-cat left"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></a></h3>
									<?php } ?>
									<h1 class="mvp-post-title left entry-title" itemprop="headline"><?php the_title(); ?></h1>
									<?php if ( has_excerpt() ) { ?>
										<span class="mvp-post-excerpt left"><?php the_excerpt(); ?></span>
									<?php } ?>
									<?php $author_info = get_option('mvp_author_info'); if ($author_info == "true") { ?>
										<div class="mvp-author-info-wrap left relative">
											<ul class="mvp-author-info-list left relative">
												<li class="mvp-author-info-thumb">
													<?php echo get_avatar( get_the_author_meta('email'), '46' ); ?>
												</li>
												<li class="mvp-author-info-name" itemprop="author" itemscope itemtype="https://schema.org/Person">
													<p><?php esc_html_e( 'by', 'the-league' ); ?></p> <span class="author-name vcard fn author" itemprop="name"><?php the_author_posts_link(); ?></span>
												</li>
												<?php $authtwitter = get_the_author_meta( 'twitter' ); if ( ! empty ( $authtwitter ) ) { ?>
													<li class="mvp-author-info-twit">
														<a href="<?php echo esc_url(the_author_meta('twitter')); ?>" class="mvp-twit-but" target="_blank"><span class="mvp-author-info-twit-but"><i class="fa fa-twitter fa-2"></i></span></a>
													</li>
												<?php } ?>
												<li class="mvp-author-info-date">
													<span class="mvp-post-date updated"><time class="post-date updated" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></span>
													<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>"/>
												</li>
											</ul>
										</div><!--mvp-author-info-wrap-->
									<?php } ?>
								</div><!--mvp-article-head2-->
							<?php } ?>
							<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( ! $mvp_post_temp && $mvp_post_layout == 'Template 3' ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 4' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 3' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 4' ) || $mvp_post_temp == "temp3" || $mvp_post_temp == "temp4" ) { ?>
							<?php $mvp_featured_img = get_option('mvp_featured_img'); $mvp_show_hide = get_post_meta($post->ID, "mvp_featured_image", true); if ($mvp_featured_img == "true") { if ($mvp_show_hide !== "hide") { ?>
								<?php if(get_post_meta($post->ID, "mvp_video_embed", true)) { ?>
									<div id="mvp-video-embed" class="left relative">
										<?php echo html_entity_decode(get_post_meta($post->ID, "mvp_video_embed", true)); ?>
									</div><!--mvp-video-embed-->
								<?php } else { ?>
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<div id="mvp-post-feat-img" class="left relative" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
											<?php the_post_thumbnail(''); ?>
											<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
											<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
											<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
											<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
										</div><!--mvp-post-feat-img-->
										<?php global $post; if(get_post_meta($post->ID, "mvp_photo_credit", true)): ?>
											<span class="mvp-feat-caption"><?php echo wp_kses_post(get_post_meta($post->ID, "mvp_photo_credit", true)); ?></span>
										<?php endif; ?>
									<?php } ?>
								<?php } ?>
							<?php } else { ?>
								<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
									<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
									<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
									<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
									<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
								</div><!--mvp-post-img-hide-->
							<?php } ?>
							<?php } else { ?>
								<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
									<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
									<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
									<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
									<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
								</div><!--mvp-post-img-hide-->
							<?php } ?>
						<?php } ?>
						<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( ! $mvp_post_temp && $mvp_post_layout == 'Template 5' ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 6' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 5' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 6' ) || $mvp_post_temp == "temp5" || $mvp_post_temp == "temp6" ) { ?>
							<?php if(get_post_meta($post->ID, "mvp_video_embed", true)) { ?>
							<div id="mvp-article-head2" class="left relative">
								<?php if ( ! is_singular( 'scoreboard' )) { ?>
									<h3 class="mvp-post-cat left"><a class="mvp-post-cat-link" href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><span class="mvp-post-cat left"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></a></h3>
								<?php } ?>
								<h1 class="mvp-post-title left entry-title" itemprop="headline"><?php the_title(); ?></h1>
								<?php if ( has_excerpt() ) { ?>
									<span class="mvp-post-excerpt left"><?php the_excerpt(); ?></span>
								<?php } ?>
							</div><!--mvp-article-head2-->
							<?php } ?>
						<?php } ?>
						<div class="mvp-post-soc-out relative">
							<?php $socialbox = get_option('mvp_social_box'); if ($socialbox == "true") { ?>
							<div id="mvp-post-soc-wrap" class="left relative">
								<ul class="mvp-post-soc-list left relative">
									<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title_attribute(); ?>', 'facebookShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Share on Facebook', 'the-league' ); ?>">
									<li class="mvp-post-soc-fb">
										<i class="fa fa-2 fa-facebook" aria-hidden="true"></i>
									</li>
									</a>
									<a href="#" onclick="window.open('http://twitter.com/share?text=<?php the_title_attribute(); ?> -&amp;url=<?php the_permalink() ?>', 'twitterShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Tweet This Post', 'the-league' ); ?>">
									<li class="mvp-post-soc-twit">
										<i class="fa fa-2 fa-twitter" aria-hidden="true"></i>
									</li>
									</a>
									<a href="#" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mvp-post-thumb' ); echo esc_url($thumb['0']); ?>&amp;description=<?php the_title_attribute(); ?>', 'pinterestShare', 'width=750,height=350'); return false;" title="<?php esc_html_e( 'Pin This Post', 'the-league' ); ?>">
									<li class="mvp-post-soc-pin">
										<i class="fa fa-2 fa-pinterest-p" aria-hidden="true"></i>
									</li>
									</a>
									<a href="mailto:?subject=<?php the_title_attribute(); ?>&amp;BODY=<?php esc_html_e( 'I found this article interesting and thought of sharing it with you. Check it out:', 'the-league' ); ?> <?php the_permalink(); ?>">
									<li class="mvp-post-soc-email">
										<i class="fa fa-2 fa-envelope" aria-hidden="true"></i>
									</li>
									</a>
									<?php if ( comments_open() ) { ?>
										<?php $disqus_id = get_option('mvp_disqus_id'); if ($disqus_id) { if (isset($disqus_id)) {  ?>
											<a href="#disqus_thread">
											<li class="mvp-post-soc-com mvp-com-click">
												<i class="fa fa-2 fa-commenting" aria-hidden="true"></i>
											</li>
											</a>
										<?php } } else { ?>
											<a href="<?php comments_link(); ?>">
											<li class="mvp-post-soc-com mvp-com-click">
												<i class="fa fa-2 fa-commenting" aria-hidden="true"></i>
											</li>
											</a>
										<?php } ?>
									<?php } ?>
								</ul>
							</div><!--mvp-post-soc-wrap-->
							<?php } ?>
							<div class="mvp-post-soc-in">
								<?php $author_info = get_option('mvp_author_info'); if ($author_info == "true") { ?>
								<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( ! $mvp_post_temp && $mvp_post_layout == 'Template 5' ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 6' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 5' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 6' ) || $mvp_post_temp == "temp5" || $mvp_post_temp == "temp6" ) { ?>
							<div id="mvp-article-head2" class="left relative">
								<div class="mvp-author-info-wrap left relative">
									<ul class="mvp-author-info-list left relative">
										<li class="mvp-author-info-thumb">
											<?php echo get_avatar( get_the_author_meta('email'), '46' ); ?>
										</li>
										<li class="mvp-author-info-name" itemprop="author" itemscope itemtype="https://schema.org/Person">
											<p><?php esc_html_e( 'by', 'the-league' ); ?></p> <span class="author-name vcard fn author" itemprop="name"><?php the_author_posts_link(); ?></span>
										</li>
										<?php $authtwitter = get_the_author_meta( 'twitter' ); if ( ! empty ( $authtwitter ) ) { ?>
											<li class="mvp-author-info-twit">
												<a href="<?php echo esc_url(the_author_meta('twitter')); ?>" class="mvp-twit-but" target="_blank"><span class="mvp-author-info-twit-but"><i class="fa fa-twitter fa-2"></i></span></a>
											</li>
										<?php } ?>
										<li class="mvp-author-info-date">
											<span class="mvp-post-date updated"><time class="post-date updated" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time></span>
											<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>"/>
										</li>
									</ul>
								</div><!--mvp-author-info-wrap-->
							</div><!--mvp-article-head2-->
								<?php } ?>
								<?php } ?>
								<div id="mvp-content-main" class="left relative" itemprop="articleBody">
									<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( ! $mvp_post_temp && $mvp_post_layout == 'Template 1' ) || ( ! $mvp_post_temp && ! $mvp_post_layout ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 2' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 1' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 2' ) || $mvp_post_temp == "temp1" || $mvp_post_temp == "temp2" ) { ?>
										<?php $mvp_featured_img = get_option('mvp_featured_img'); $mvp_show_hide = get_post_meta($post->ID, "mvp_featured_image", true); if ($mvp_featured_img == "true") { if ($mvp_show_hide !== "hide") { ?>
											<?php if(get_post_meta($post->ID, "mvp_video_embed", true)) { ?>
												<div id="mvp-video-embed" class="left relative">
													<?php echo html_entity_decode(get_post_meta($post->ID, "mvp_video_embed", true)); ?>
												</div><!--mvp-video-embed-->
											<?php } else { ?>
												<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
													<div id="mvp-post-feat-img" class="left relative" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
														<?php the_post_thumbnail(''); ?>
														<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
														<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
														<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
														<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
													</div><!--mvp-post-feat-img-->
													<?php global $post; if(get_post_meta($post->ID, "mvp_photo_credit", true)): ?>
														<span class="mvp-feat-caption"><?php echo wp_kses_post(get_post_meta($post->ID, "mvp_photo_credit", true)); ?></span>
													<?php endif; ?>
												<?php } ?>
											<?php } ?>
										<?php } else { ?>
											<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
												<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
												<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
												<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
												<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
											</div><!--mvp-post-img-hide-->
										<?php } ?>
										<?php } else { ?>
											<div class="mvp-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
												<?php $thumb_id = get_post_thumbnail_id(); $mvp_thumb_array = wp_get_attachment_image_src($thumb_id, 'mvp-post-thumb', true); $mvp_thumb_url = $mvp_thumb_array[0]; $mvp_thumb_width = $mvp_thumb_array[1]; $mvp_thumb_height = $mvp_thumb_array[2]; ?>
												<meta itemprop="url" content="<?php echo esc_url($mvp_thumb_url) ?>">
												<meta itemprop="width" content="<?php echo esc_html($mvp_thumb_width) ?>">
												<meta itemprop="height" content="<?php echo esc_html($mvp_thumb_height) ?>">
											</div><!--mvp-post-img-hide-->
										<?php } ?>
									<?php } ?>
									<?php the_content(); ?>
									<?php wp_link_pages(); ?>
									<?php $mvp_show_gallery = get_post_meta($post->ID, "mvp_post_gallery", true); if ($mvp_show_gallery == "show") { ?>
										<section class="mvp-post-gallery-wrap left relative">
											<div class="mvp-post-gallery-top left relative flexslider">
												<ul class="mvp-post-gallery-top-list slides">
													<?php $images = get_attached_media('image', $post->ID); foreach($images as $image) { ?>
														<li>
    															<?php echo wp_get_attachment_image($image->ID, 'mvp-post-thumb'); ?>
														</li>
													<?php } ?>
												</ul>
											</div><!--mvp-post-gallery-top-->
											<div class="mvp-post-gallery-bot left relative flexslider">
												<ul class="mvp-post-gallery-bot-list slides">
													<?php $images = get_attached_media('image', $post->ID); foreach($images as $image) { ?>
														<li>
    															<?php echo wp_get_attachment_image($image->ID, 'mvp-small-thumb'); ?>
														</li>
													<?php } ?>
												</ul>
											</div><!--mvp-post-gallery-bot-->
										</section><!--mvp-post-gallery-wrap-->
									<?php } ?>
									<?php if ( ! is_singular( 'scoreboard' )) { ?>
										<div class="mvp-post-tags">
											<span class="mvp-post-tags-header"><?php esc_html_e( 'Related Topics', 'the-league' ); ?></span><span itemprop="keywords"><?php the_tags('','','') ?></span>
										</div><!--mvp-post-tags-->
									<?php } ?>
									<div class="posts-nav-link">
										<?php posts_nav_link(); ?>
									</div><!--posts-nav-link-->
									<?php $author = get_option('mvp_author_box'); if ($author == "true") { ?>
										<div id="mvp-author-box-wrap" class="left relative">
											<div class="mvp-author-box-out right relative">
												<div id="mvp-author-box-img" class="left relative">
													<?php echo get_avatar( get_the_author_meta('email'), '60' ); ?>
												</div><!--mvp-author-box-img-->
												<div class="mvp-author-box-in">
													<div id="mvp-author-box-head" class="left relative">
														<span class="mvp-author-box-name left relative"><?php the_author_posts_link(); ?></span>
														<div id="mvp-author-box-soc-wrap" class="left relative">
															<?php $mvp_email = get_option('mvp_author_email'); if ($mvp_email == "true") { ?>
																<a href="mailto:<?php the_author_meta('email'); ?>"><span class="mvp-author-box-soc fa fa-envelope-square fa-2"></span></a>
															<?php } ?>
															<?php $authordesc = get_the_author_meta( 'facebook' ); if ( ! empty ( $authordesc ) ) { ?>
																<a href="<?php the_author_meta('facebook'); ?>" alt="Facebook" target="_blank"><span class="mvp-author-box-soc fa fa-facebook-square fa-2"></span></a>
															<?php } ?>
															<?php $authordesc = get_the_author_meta( 'twitter' ); if ( ! empty ( $authordesc ) ) { ?>
																<a href="<?php the_author_meta('twitter'); ?>" alt="Twitter" target="_blank"><span class="mvp-author-box-soc fa fa-twitter-square fa-2"></span></a>
															<?php } ?>
															<?php $authordesc = get_the_author_meta( 'pinterest' ); if ( ! empty ( $authordesc ) ) { ?>
																<a href="<?php the_author_meta('pinterest'); ?>" alt="Pinterest" target="_blank"><span class="mvp-author-box-soc fa fa-pinterest-square fa-2"></span></a>
															<?php } ?>
															<?php $authordesc = get_the_author_meta( 'googleplus' ); if ( ! empty ( $authordesc ) ) { ?>
																<a href="<?php the_author_meta('googleplus'); ?>" alt="Google Plus" target="_blank"><span class="mvp-author-box-soc fa fa-google-plus-square fa-2"></span></a>
															<?php } ?>
															<?php $authordesc = get_the_author_meta( 'instagram' ); if ( ! empty ( $authordesc ) ) { ?>
																<a href="<?php the_author_meta('instagram'); ?>" alt="Instagram" target="_blank"><span class="mvp-author-box-soc fa fa-instagram fa-2"></span></a>
															<?php } ?>
															<?php $authordesc = get_the_author_meta( 'linkedin' ); if ( ! empty ( $authordesc ) ) { ?>
																<a href="<?php the_author_meta('linkedin'); ?>" alt="LinkedIn" target="_blank"><span class="mvp-author-box-soc fa fa-linkedin-square fa-2"></span></a>
															<?php } ?>
														</div><!--mvp-author-box-soc-wrap-->
													</div><!--mvp-author-box-head-->
												</div><!--mvp-author-box-in-->
											</div><!--mvp-author-box-out-->
											<div id="mvp-author-box-text" class="left relative">
												<p><?php the_author_meta('description'); ?></p>
											</div><!--mvp-author-box-text-->
										</div><!--mvp-author-box-wrap-->
									<?php } ?>
									<div class="mvp-org-wrap" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
										<div class="mvp-org-logo" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
											<?php if(get_option('mvp_logo')) { ?>
												<img src="<?php echo esc_url(get_option('mvp_logo')); ?>"/>
												<meta itemprop="url" content="<?php echo esc_url(get_option('mvp_logo')); ?>">
											<?php } else { ?>
												<img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav.png" alt="<?php bloginfo( 'name' ); ?>" />
												<meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav.png">
											<?php } ?>
										</div><!--mvp-org-logo-->
										<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
									</div><!--mvp-org-wrap-->
								</div><!--mvp-content-main-->
								<?php if ( comments_open() ) { ?>
									<?php $disqus_id = get_option('mvp_disqus_id'); if ($disqus_id) { if (isset($disqus_id)) {  ?>
										<div id="mvp-comments-button" class="left relative mvp-com-click">
											<span class="mvp-comment-but-text"><?php comments_number(__( 'Comments', 'the-league'), esc_html__('Comments', 'the-league'), esc_html__('Comments', 'the-league')); ?></span>
										</div><!--mvp-comments-button-->
										<?php $disqus_id2 = esc_html($disqus_id); mvp_disqus_embed($disqus_id2); ?>
									<?php } } else { ?>
										<?php $mvp_click_id = get_the_ID(); ?>
										<div id="mvp-comments-button" class="left relative mvp-com-click">
											<span class="mvp-comment-but-text"><?php comments_number(__( 'Click to comment', 'the-league'), esc_html__('1 Comment', 'the-league'), esc_html__('% Comments', 'the-league'));?></span>
										</div><!--mvp-comments-button-->
										<?php comments_template(); ?>
									<?php } ?>
								<?php } ?>
							</div><!--mvp-post-soc-in-->
						</div><!--mvp-post-soc-out-->
						</div><!--mvp-content-box-->
					</div><!--mvp-post-content-->
				<?php setCrunchifyPostViews(get_the_ID()); ?>
				<?php endwhile; endif; ?>
			</div><!--mvp-post-content-in-->
			<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if( ( ! $mvp_post_temp && $mvp_post_layout == 'Template 1' ) || ( ! $mvp_post_temp && ! $mvp_post_layout ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 3' ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 5' ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 7' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 1' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 3' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 5' ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 7' ) || $mvp_post_temp == "temp1" || $mvp_post_temp == "temp3" || $mvp_post_temp == "temp5" || $mvp_post_temp == "temp7" ) { ?>
				<?php get_sidebar(); ?>
			<?php } ?>
		</div><!--mvp-post-content-out-->
		<?php if ( ! is_singular( 'scoreboard' )) { ?>
		<?php $mvp_more = get_option('mvp_more_posts'); if ($mvp_more == "true") { ?>
			<section id="mvp-more-post-wrap" class="left relative">
				<h4 class="mvp-sec-head"><span class="mvp-sec-head"><?php esc_html_e( 'More in', 'the-league' ); ?> <?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></h4>
				<ul class="mvp-more-post-list left relative">
					<?php global $post; $mvp_more_num = esc_html(get_option('mvp_more_num')); $category = get_the_category(); $current_cat = $category[0]->cat_ID; $recent = new WP_Query(array( 'cat' => $current_cat, 'posts_per_page' => $mvp_more_num, 'post__not_in' => array( $post->ID ) )); while($recent->have_posts()) : $recent->the_post(); ?>
						<li>
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
								<div class="mvp-more-post-img left relative">
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
								</div><!--mvp-more-post-img-->
								</a>
							<?php } ?>
							<div class="mvp-more-post-text left relative">
								<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
								<p><?php echo wp_trim_words( get_the_excerpt(), 14, '...' ); ?></p>
							</div><!--mvp-more-post-text-->
						</li>
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
			</section><!--mvp-more-post-wrap-->
		<?php } ?>
		<?php } ?>
		<?php if ( ! is_singular( 'scoreboard' )) { ?>
		<?php $prev_next = get_option('mvp_prev_next'); if ($prev_next == "true") { ?>
			<div id="mvp-prev-next-wrap">
				<?php $prev_post = get_previous_post(TRUE, ''); if (!empty( $prev_post )) { ?>
					<div id="mvp-prev-post-wrap">
						<div id="mvp-prev-post-arrow" class="relative">
							<span class="fa fa-angle-left fa-4" aria-hidden="true"></span>
						</div><!--mvp-prev-post-arrow-->
						<div class="mvp-prev-next-text">
							<?php previous_post_link('%link', '%title', TRUE); ?>
						</div><!--mvp-prev-post-text-->
					</div><!--mvp-prev-post-wrap-->
				<?php } ?>
				<?php $next_post = get_next_post(TRUE, ''); if (!empty( $next_post )) { ?>
					<div id="mvp-next-post-wrap">
						<div id="mvp-next-post-arrow" class="relative">
							<span class="fa fa-angle-right fa-4 " aria-hidden="true"></span>
						</div><!--mvp-prev-post-arrow-->
						<div class="mvp-prev-next-text">
							<?php next_post_link('%link', '%title', TRUE); ?>
						</div><!--mvp-prev-next-text-->
					</div><!--mvp-next-post-wrap-->
				<?php } ?>
			</div><!--mvp-prev-next-wrap-->
		<?php } ?>
		<?php } ?>
	</div><!--mvp-sec-pad-->
</article><!--mvp-article-wrap-->
<?php get_footer(); ?>