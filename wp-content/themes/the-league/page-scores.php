<?php
	/* Template Name: Scores */
?>
<?php get_header(); ?>
<div class="mvp-body-sec-wrap left relative">
	<div class="mvp-sec-pad left relative">
		<div class="mvp-main-body-out2 relative">
			<div class="mvp-main-body-in2">
				<div class="mvp-main-body-blog left relative">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1 class="mvp-post-title left"><?php the_title(); ?></h1>
					<?php endwhile; endif; ?>
					<section class="mvp-scores-wrap left relative tabber-container">
						<header class="mvp-scores-head left realtive">
							<div class="mvp-scores-tabs left relative">
								<ul class="mvp-side-tab-list mvp-col-tabs">
									<?php if ( get_option('mvp_score_name1') ) { ?>
										<li class="mvp-feat-col-tab">
											<a href="#mvp-scores-tab1"><span class="mvp-side-tab-head"><?php echo esc_html(get_option('mvp_score_name1')); ?></span></a>
										</li>
									<?php } ?>
									<?php if ( get_option('mvp_score_name2') ) { ?>
										<li>
											<a href="#mvp-scores-tab2"><span class="mvp-side-tab-head"><?php echo esc_html(get_option('mvp_score_name2')); ?></span></a>
										</li>
									<?php } ?>
									<?php if ( get_option('mvp_score_name3') ) { ?>
										<li>
											<a href="#mvp-scores-tab3"><span class="mvp-side-tab-head"><?php echo esc_html(get_option('mvp_score_name3')); ?></span></a>
										</li>
									<?php } ?>
								</ul>
							</div><!--mvp-scores-tabs-->
							<div class="mvp-scores-menu left relative">
								<select class="mvp-score-tabs">
									<?php if ( get_option('mvp_score_name1') ) { ?><option value="#mvp-scores-tab1"><?php echo esc_html(get_option('mvp_score_name1')); ?></option><?php } ?>
									<?php if ( get_option('mvp_score_name2') ) { ?><option value="#mvp-scores-tab2"><?php echo esc_html(get_option('mvp_score_name2')); ?></option><?php } ?>
									<?php if ( get_option('mvp_score_name3') ) { ?><option value="#mvp-scores-tab3"><?php echo esc_html(get_option('mvp_score_name3')); ?></option><?php } ?>
									<?php if ( get_option('mvp_score_name4') ) { ?><option value="#mvp-scores-tab4"><?php echo esc_html(get_option('mvp_score_name4')); ?></option><?php } ?>
									<?php if ( get_option('mvp_score_name5') ) { ?><option value="#mvp-scores-tab5"><?php echo esc_html(get_option('mvp_score_name5')); ?></option><?php } ?>
									<?php if ( get_option('mvp_score_name6') ) { ?><option value="#mvp-scores-tab6"><?php echo esc_html(get_option('mvp_score_name6')); ?></option><?php } ?>
									<?php if ( get_option('mvp_score_name7') ) { ?><option value="#mvp-scores-tab7"><?php echo esc_html(get_option('mvp_score_name7')); ?></option><?php } ?>
									<?php if ( get_option('mvp_score_name8') ) { ?><option value="#mvp-scores-tab8"><?php echo esc_html(get_option('mvp_score_name8')); ?></option><?php } ?>
									<?php if ( get_option('mvp_score_name9') ) { ?><option value="#mvp-scores-tab9"><?php echo esc_html(get_option('mvp_score_name9')); ?></option><?php } ?>
									<?php if ( get_option('mvp_score_name10') ) { ?><option value="#mvp-scores-tab10"><?php echo esc_html(get_option('mvp_score_name10')); ?></a></option><?php } ?>
								</select>
							</div><!--mvp-scores-menu-->
						</header><!--mvp-scores-head-->
						<div class="mvp-scores-body left relative">
							<?php if ( get_option('mvp_score_name1') ) { ?>
								<div id="mvp-scores-tab1" class="tabber-content">
									<div class="mvp-scores-item">
										<ul class="mvp-scores-list left relative">
											<?php global $post; $score_cat1 = get_option('mvp_score_cat1'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat1 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<div class="mvp-scores-status left relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-scores-status-->
													<div class="mvp-scores-list-main left relative">
														<div class="mvp-scores-teams left relative">
															<div class="mvp-scores-teams-left left relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
															</div><!--mvp-scores-teams-left-->
															<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
																<div class="mvp-scores-teams-right right relative">
																	<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																	<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
																</div><!--mvp-scores-teams-right-->
															<?php } ?>
														</div><!--mvp-scores-teams-->
														<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?>
															<div class="mvp-scores-title left relative">
																<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
															</div><!--mvp-scores-title-->
														<?php } ?>
													</div><!--mvp-scores-list-main-->
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-scores-item-->
								</div><!--mvp-scores-tab1-->
							<?php } ?>
							<?php if ( get_option('mvp_score_name2') ) { ?>
								<div id="mvp-scores-tab2" class="tabber-content">
									<div class="mvp-scores-item">
										<ul class="mvp-scores-list left relative">
											<?php global $post; $score_cat2 = get_option('mvp_score_cat2'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat2 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<div class="mvp-scores-status left relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-scores-status-->
													<div class="mvp-scores-list-main left relative">
														<div class="mvp-scores-teams left relative">
															<div class="mvp-scores-teams-left left relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
															</div><!--mvp-scores-teams-left-->
															<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
																<div class="mvp-scores-teams-right right relative">
																	<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																	<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
																</div><!--mvp-scores-teams-right-->
															<?php } ?>
														</div><!--mvp-scores-teams-->
														<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?>
															<div class="mvp-scores-title left relative">
																<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
															</div><!--mvp-scores-title-->
														<?php } ?>
													</div><!--mvp-scores-list-main-->
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-scores-item-->
								</div><!--mvp-scores-tab2-->
							<?php } ?>
							<?php if ( get_option('mvp_score_name3') ) { ?>
								<div id="mvp-scores-tab3" class="tabber-content">
									<div class="mvp-scores-item">
										<ul class="mvp-scores-list left relative">
											<?php global $post; $score_cat3 = get_option('mvp_score_cat3'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat3 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<div class="mvp-scores-status left relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-scores-status-->
													<div class="mvp-scores-list-main left relative">
														<div class="mvp-scores-teams left relative">
															<div class="mvp-scores-teams-left left relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
															</div><!--mvp-scores-teams-left-->
															<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
																<div class="mvp-scores-teams-right right relative">
																	<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																	<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
																</div><!--mvp-scores-teams-right-->
															<?php } ?>
														</div><!--mvp-scores-teams-->
														<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?>
															<div class="mvp-scores-title left relative">
																<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
															</div><!--mvp-scores-title-->
														<?php } ?>
													</div><!--mvp-scores-list-main-->
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-scores-item-->
								</div><!--mvp-scores-tab3-->
							<?php } ?>
						</div><!--mvp-scores-body-->
					</section><!--mvp-scores-wrap-->
				</div><!--mvp-main-body-blog-->
			</div><!--mvp-main-body-in2-->
			<?php get_sidebar(); ?>
		</div><!--mvp-main-body-out2-->
	</div><!--mvp-sec-pad-->
</div><!--mvp-body-sec-wrap-->
<?php get_footer(); ?>