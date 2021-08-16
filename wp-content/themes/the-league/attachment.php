<?php get_header(); ?>
<article id="mvp-article-wrap" <?php post_class(); ?> itemscope itemtype="http://schema.org/NewsArticle">
	<div class="mvp-sec-pad left relative">
		<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>"/>
		<div class="mvp-post-content-out relative">
			<div class="mvp-post-content-in">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div id="mvp-post-content" class="left relative">
						<div class="mvp-content-box">
							<div id="mvp-article-head2" class="left relative">
								<h1 class="mvp-post-title left entry-title" itemprop="headline"><?php the_title(); ?></h1>
							</div><!--mvp-article-head2-->
						<div class="mvp-post-soc-out relative">
							<div id="mvp-post-soc-wrap" class="left relative">
								<ul class="mvp-post-soc-list left relative">
									<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>', 'facebookShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Share on Facebook', 'the-league' ); ?>">
									<li class="mvp-post-soc-fb">
										<i class="fa fa-2 fa-facebook" aria-hidden="true"></i>
									</li>
									</a>
									<a href="#" onclick="window.open('http://twitter.com/share?text=<?php the_title(); ?> -&amp;url=<?php the_permalink() ?>', 'twitterShare', 'width=626,height=436'); return false;" title="<?php esc_html_e( 'Tweet This Post', 'the-league' ); ?>">
									<li class="mvp-post-soc-twit">
										<i class="fa fa-2 fa-twitter" aria-hidden="true"></i>
									</li>
									</a>
									<a href="#" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mvp-post-thumb' ); echo esc_url($thumb['0']); ?>&amp;description=<?php the_title(); ?>', 'pinterestShare', 'width=750,height=350'); return false;" title="<?php esc_html_e( 'Pin This Post', 'the-league' ); ?>">
									<li class="mvp-post-soc-pin">
										<i class="fa fa-2 fa-pinterest-p" aria-hidden="true"></i>
									</li>
									</a>
									<a href="mailto:?subject=<?php the_title(); ?>&amp;BODY=<?php esc_html_e( 'I found this article interesting and thought of sharing it with you. Check it out:', 'the-league' ); ?> <?php the_permalink(); ?>">
									<li class="mvp-post-soc-email">
										<i class="fa fa-2 fa-envelope" aria-hidden="true"></i>
									</li>
									</a>
									<li class="mvp-post-soc-com">
										<i class="fa fa-2 fa-commenting" aria-hidden="true"></i>
									</li>
								</ul>
							</div><!--mvp-post-soc-wrap-->
							<div class="mvp-post-soc-in">
								<div id="mvp-content-main" class="left relative" itemprop="articleBody">
 									<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "post"); ?>
										<a href="<?php echo esc_url(wp_get_attachment_url($post->id)); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo esc_url( $att_image[0] );?>" class="attachment-post" alt="<?php the_title(); ?>" /></a>
									<?php else : ?>
										<a href="<?php echo esc_url(wp_get_attachment_url($post->ID)); ?>" title="<?php echo esc_html( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo esc_html(basename($post->guid)); ?></a>
									<?php endif; ?>
								</div><!--mvp-content-main-->
							</div><!--mvp-post-soc-in-->
						</div><!--mvp-post-soc-out-->
						</div><!--mvp-content-box-->
					</div><!--mvp-post-content-->
				<?php endwhile; endif; ?>
			</div><!--mvp-post-content-in-->
			<?php get_sidebar(); ?>
		</div><!--mvp-post-content-out-->
	</div><!--mvp-sec-pad-->
</article><!--mvp-article-wrap-->
<?php get_footer(); ?>