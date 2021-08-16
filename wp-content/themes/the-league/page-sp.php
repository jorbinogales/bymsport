<?php
	/* Template Name: SportsPress */
?>
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
						<div id="mvp-article-head" class="left relative">
							<h1 class="mvp-post-title left entry-title" itemprop="headline"><?php the_title(); ?></h1>
						</div><!--mvp-article-head-->
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
								</div><!--mvp-content-main-->
					</div><!--mvp-content-box-->
				</div><!--mvp-post-content-->
			</div><!--mvp-post-content-in-->
			<?php get_sidebar('sp'); ?>
		</div><!--mvp-post-content-out-->
	</div><!--mvp-sec-pad-->
</article><!--mvp-article-wrap-->
<?php endwhile; endif; ?>
<?php get_footer(); ?>