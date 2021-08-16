<?php get_header(); ?>
<?php global $author; $userdata = get_userdata($author); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article id="mvp-article-wrap" <?php post_class(); ?> itemscope itemtype="http://schema.org/NewsArticle">
	<div class="mvp-sec-pad left relative">
		<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>"/>
		<div class="mvp-post-content-out relative">
			<div class="mvp-post-content-in">
				<div id="mvp-post-content" class="left relative">
					<div class="mvp-content-box">
						<div id="mvp-article-head2" class="left relative">
							<h1 class="mvp-post-title left entry-title" itemprop="headline"><?php the_title(); ?></h1>
						</div><!--mvp-article-head2-->
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
								<div id="mvp-content-main" class="left relative" itemprop="articleBody">
									<?php the_content(); ?>
									<?php wp_link_pages(); ?>
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
								</div><!--mvp-content-main-->
							</div><!--mvp-post-soc-in-->
						</div><!--mvp-post-soc-out-->
					</div><!--mvp-content-box-->
				</div><!--mvp-post-content-->
			</div><!--mvp-post-content-in-->
			<?php get_sidebar(); ?>
		</div><!--mvp-post-content-out-->
	</div><!--mvp-sec-pad-->
</article><!--mvp-article-wrap-->
<?php endwhile; endif; ?>
<?php get_footer(); ?>