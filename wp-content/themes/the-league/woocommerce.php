<?php get_header(); ?>
<article id="mvp-article-wrap">
	<div class="mvp-sec-pad left relative">
		<div class="mvp-post-content-out relative">
			<div class="mvp-post-content-in">
				<div id="mvp-post-content" class="left relative">
					<div class="mvp-content-box">
						<?php if(is_single()) { if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php woocommerce_breadcrumb(); ?>
						<?php endwhile; endif; } else { ?>
							<?php woocommerce_breadcrumb(); ?>
						<?php } ?>
						<div id="woo-content">
							<?php woocommerce_content(); ?>
							<?php wp_link_pages(); ?>
						</div><!--woo-content-->
					</div><!--mvp-content-box-->
				</div><!--mvp-post-content-->
			</div><!--mvp-post-content-in-->
			<?php get_sidebar('woo'); ?>
		</div><!--mvp-post-content-out-->
	</div><!--mvp-sec-pad-->
</article><!--mvp-article-wrap-->
<?php get_footer(); ?>