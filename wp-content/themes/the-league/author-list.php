<?php
	/* Template Name: Authors List */
?>
<?php get_header(); ?>
<?php global $author; $userdata = get_userdata($author); ?>
<div class="mvp-body-sec-wrap left relative">
	<div class="mvp-sec-pad left relative">
		<div class="mvp-main-body-out2 relative">
			<div class="mvp-main-body-in2">
				<div class="mvp-main-body-blog left relative">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1 class="mvp-post-title"><?php the_title(); ?></h1>
					<?php endwhile; endif; ?>
					<div class="mvp-authors-wrap left relative">
						<?php $mvp_users = get_users('orderby=post_count&order=DESC'); foreach($mvp_users as $user) { $post_count = count_user_posts( $user->ID ); if($post_count < 1) continue; ?>
							<section class="mvp-authors-list-wrap left relative">
								<div class="mvp-authors-list-img left relative">
									<?php echo get_avatar( $user->user_email, '150' ); ?>
								</div><!--mvp-authors-list-img-->
								<span class="mvp-authors-name"><a href="<?php echo get_author_posts_url( $user->ID ); ?>"><?php echo esc_html( $user->display_name ); ?></a></span>
								<?php wp_get_current_user(); $author_query = array('posts_per_page' => '1','author' => $user->ID); $author_posts = new WP_Query($author_query); while($author_posts->have_posts()) : $author_posts->the_post(); ?>
									<h2 class="mvp-authors-latest"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
								<?php endwhile; wp_reset_postdata(); ?>
							</section><!--mvp-authors-page-list-wrap-->
						<?php } ?>
					</div><!--mvp-authors-wrap-->
				</div><!--mvp-main-body-blog-->
			</div><!--mvp-main-body-in2-->
			<?php get_sidebar(); ?>
		</div><!--mvp-main-body-out2-->
	</div><!--mvp-sec-pad-->
</div><!--mvp-body-sec-wrap-->
<?php get_footer(); ?>