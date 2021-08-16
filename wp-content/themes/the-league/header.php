<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" >
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { if(get_option('mvp_favicon')) { ?><link rel="shortcut icon" href="<?php echo esc_url(get_option('mvp_favicon')); ?>" /><?php } } ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mvp-post-thumb' ); ?>
<meta property="og:image" content="<?php echo esc_url( $thumb['0'] ); ?>" />
<meta name="twitter:image" content="<?php echo esc_url( $thumb['0'] ); ?>" />
<?php } ?>
<?php if ( is_single() ) { ?>
<meta property="og:type" content="article" />
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="<?php the_permalink() ?>">
<meta name="twitter:title" content="<?php the_title_attribute(); ?>">
<meta name="twitter:description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
<?php endwhile; endif; ?>
<?php } else { ?>
<meta property="og:description" content="<?php bloginfo('description'); ?>" />
<?php } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(''); ?>>
	<?php get_template_part('fly-menu'); ?>
		<?php if(get_option('mvp_wall_ad')) { ?>
			<div id="mvp-wallpaper">
				<?php if(get_option('mvp_wall_url')) { ?>
					<a href="<?php echo esc_url(get_option('mvp_wall_url')); ?>" class="mvp-wall-link" target="_blank"></a>
				<?php } ?>
			</div><!--mvp-wallpaper-->
		<?php } ?>
		<div id="mvp-site" class="left relative">
		<div id="mvp-search-wrap">
			<div id="mvp-search-box">
				<?php get_search_form(); ?>
			</div><!--mvp-search-box-->
			<div class="mvp-search-but-wrap mvp-search-click">
				<span></span>
				<span></span>
			</div><!--mvp-search-but-wrap-->
		</div><!--mvp-search-wrap-->
		<header id="mvp-top-head-wrap">
			<?php if ( post_type_exists( 'scoreboard' ) ) { ?>
				<?php $mvp_show_scoreboard = get_option('mvp_show_scoreboard'); if ($mvp_show_scoreboard == "true" && ! is_404()) { ?>
					<?php get_template_part('scoreboard'); ?>
				<?php } ?>
			<?php } ?>
			<nav id="mvp-main-nav-wrap">
				<div id="mvp-top-nav-wrap" class="left relative">
					<div class="mvp-main-box-cont">
						<div id="mvp-top-nav-cont" class="left relative">
							<div class="mvp-top-nav-right-out relative">
								<div class="mvp-top-nav-right-in">
									<div id="mvp-top-nav-left" class="left relative">
										<div class="mvp-top-nav-left-out relative">
											<div class="mvp-top-nav-menu-but left relative">
												<div class="mvp-fly-but-wrap mvp-fly-but-click left relative">
													<span></span>
													<span></span>
													<span></span>
													<span></span>
												</div><!--mvp-fly-but-wrap-->
											</div><!--mvp-top-nav-menu-but-->
											<div class="mvp-top-nav-left-in">
												<div id="mvp-top-nav-logo" class="left relative" itemscope itemtype="http://schema.org/Organization">
													<?php if(get_option('mvp_logo')) { ?>
														<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img itemprop="logo" src="<?php echo esc_url(get_option('mvp_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
													<?php } else { ?>
														<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img itemprop="logo" src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
													<?php } ?>
													<?php if ( is_home() || is_front_page() ) { ?>
														<h1 class="mvp-logo-title"><?php bloginfo( 'name' ); ?></h1>
													<?php } else { ?>
														<h2 class="mvp-logo-title"><?php bloginfo( 'name' ); ?></h2>
													<?php } ?>
												</div><!--mvp-top-nav-logo-->
												<?php if ( is_category() ) { ?>
													<div class="mvp-cat-head left relative">
														<h1><?php single_cat_title(); ?></h1>
													</div><!--mvp-cat-head-->
												<?php } ?>
											</div><!--mvp-top-nav-left-in-->
										</div><!--mvp-top-nav-left-out-->
									</div><!--mvp-top-nav-left-->
								</div><!--mvp-top-nav-right-in-->
								<div id="mvp-top-nav-right" class="right relative">
									<?php if(get_option('mvp_facebook') || get_option('mvp_twitter') || get_option('mvp_instagram') || get_option('mvp_youtube')) { ?>
									<div id="mvp-top-nav-soc" class="left relative">
										<?php if(get_option('mvp_youtube')) { ?>
											<a href="<?php echo esc_html(get_option('mvp_youtube')); ?>" target="_blank"><span class="mvp-nav-soc-but fa fa-youtube fa-2"></span></a>
										<?php } ?>
										<?php if(get_option('mvp_instagram')) { ?>
											<a href="<?php echo esc_html(get_option('mvp_instagram')); ?>" target="_blank"><span class="mvp-nav-soc-but fa fa-instagram fa-2"></span></a>
										<?php } ?>
										<?php if(get_option('mvp_twitter')) { ?>
											<a href="<?php echo esc_html(get_option('mvp_twitter')); ?>" target="_blank"><span class="mvp-nav-soc-but fa fa-twitter fa-2"></span></a>
										<?php } ?>
										<?php if(get_option('mvp_facebook')) { ?>
											<a href="<?php echo esc_html(get_option('mvp_facebook')); ?>" target="_blank"><span class="mvp-nav-soc-but fa fa-facebook-official fa-2"></span></a>
										<?php } ?>
										<span class="mvp-nav-soc-head"><?php esc_html_e( 'Connect with us', 'the-league' ); ?></span>
									</div><!--mvp-top-nav-soc-->
									<?php } ?>
									<span class="mvp-nav-search-but fa fa-search fa-2 mvp-search-click"></span>
								</div><!--mvp-top-nav-right-->
							</div><!--mvp-top-nav-right-out-->
						</div><!--mvp-top-nav-cont-->
					</div><!--mvp-main-box-cont-->
				</div><!--mvp-top-nav-wrap-->
				<div id="mvp-bot-nav-wrap" class="left relative">
					<div class="mvp-main-box-cont">
						<div id="mvp-bot-nav-cont" class="left">
							<div class="mvp-bot-nav-out">
								<div class="mvp-fly-but-wrap mvp-fly-but-click left relative">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</div><!--mvp-fly-but-wrap-->
								<div class="mvp-bot-nav-in">
									<div id="mvp-nav-menu" class="left">
										<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
									</div><!--mvp-nav-menu-->
								</div><!--mvp-bot-nav-in-->
							</div><!--mvp-bot-nav-out-->
						</div><!--mvp-bot-nav-cont-->
					</div><!--mvp-main-box-cont-->
				</div><!--mvp-bot-nav-wrap-->
			</nav><!--mvp-main-nav-wrap-->
		</header>
		<main id="mvp-main-wrap" class="left relative">
			<?php if(get_option('mvp_header_leader')) { ?>
				<div id="mvp-leader-wrap" class="left relative">
					<div class="mvp-main-box-cont">
						<div id="mvp-leader-cont">
							<?php $ad970 = get_option('mvp_header_leader'); if ($ad970) { echo do_shortcode(html_entity_decode($ad970)); } ?>
						</div><!--mvp-leader-cont-->
					</div><!--mvp-main-box-cont-->
				</div><!--mvp-leader-wrap-->
			<?php } ?>
			<div id="mvp-main-body-wrap" class="left relative">
				<div class="mvp-main-box-cont">
					<div id="mvp-main-body" class="left relative">
						<img src="https://i.ibb.co/KGdVZsg/41-Recurso-48.png">
						