<div id="mvp-score-wrap" class="left relative">
	<div class="mvp-main-box-cont">
		<div id="mvp-score-cont" class="left relative">
			<div class="mvp-score-out relative">
				<div class="tabber-container">
					<div id="mvp-score-menu-wrap" class="left relative">
						<div class="mvp-score-nav-menu">
							<select class="mvp-score-tabs">
								<?php if ( get_option('mvp_score_name1') ) { ?><option value="#mvp-score-tab1"><?php echo esc_html(get_option('mvp_score_name1')); ?></option><?php } ?>
								<?php if ( get_option('mvp_score_name2') ) { ?><option value="#mvp-score-tab2"><?php echo esc_html(get_option('mvp_score_name2')); ?></option><?php } ?>
								<?php if ( get_option('mvp_score_name3') ) { ?><option value="#mvp-score-tab3"><?php echo esc_html(get_option('mvp_score_name3')); ?></option><?php } ?>
								<?php if ( get_option('mvp_score_name4') ) { ?><option value="#mvp-score-tab4"><?php echo esc_html(get_option('mvp_score_name4')); ?></option><?php } ?>
								<?php if ( get_option('mvp_score_name5') ) { ?><option value="#mvp-score-tab5"><?php echo esc_html(get_option('mvp_score_name5')); ?></option><?php } ?>
								<?php if ( get_option('mvp_score_name6') ) { ?><option value="#mvp-score-tab6"><?php echo esc_html(get_option('mvp_score_name6')); ?></option><?php } ?>
								<?php if ( get_option('mvp_score_name7') ) { ?><option value="#mvp-score-tab7"><?php echo esc_html(get_option('mvp_score_name7')); ?></option><?php } ?>
								<?php if ( get_option('mvp_score_name8') ) { ?><option value="#mvp-score-tab8"><?php echo esc_html(get_option('mvp_score_name8')); ?></option><?php } ?>
								<?php if ( get_option('mvp_score_name9') ) { ?><option value="#mvp-score-tab9"><?php echo esc_html(get_option('mvp_score_name9')); ?></option><?php } ?>
								<?php if ( get_option('mvp_score_name10') ) { ?><option value="#mvp-score-tab10"><?php echo esc_html(get_option('mvp_score_name10')); ?></a></option><?php } ?>
							</select>
						</div><!--score-nav-menu-->
					</div><!--mvp-score-menu-wrap-->
					<div class="mvp-score-in">
						<div id="mvp-score-main" class="left relative">
							<?php if ( get_option('mvp_score_name1') ) { ?>
								<div id="mvp-score-tab1" class="carousel es-carousel es-carousel-wrapper tabber-content">
									<div class="mvp-score-item">
										<ul class="mvp-score-list slides left relative">
											<?php global $post; $score_cat1 = get_option('mvp_score_cat1'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat1 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php } ?>
													<div class="mvp-score-teams left relative">
														<div class="mvp-score-teams-left left relative">
															<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
															<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
														</div><!--mvp-score-teams-left-->
														<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
															<div class="mvp-score-teams-right relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
															</div><!--mvp-score-teams-right-->
														<?php } ?>
													</div><!--mvp-score-teams-->
													<div class="mvp-score-status relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-score-status-->
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?></a><?php } ?>
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-score-item-->
								</div><!--mvp-score-tab1-->
							<?php } ?>
							<?php if ( get_option('mvp_score_name2') ) { ?>
								<div id="mvp-score-tab2" class="carousel es-carousel es-carousel-wrapper tabber-content">
									<div class="mvp-score-item">
										<ul class="mvp-score-list slides left relative">
											<?php global $post; $score_cat2 = get_option('mvp_score_cat2'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat2 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php } ?>
													<div class="mvp-score-teams left relative">
														<div class="mvp-score-teams-left left relative">
															<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
															<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
														</div><!--mvp-score-teams-left-->
														<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
															<div class="mvp-score-teams-right relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
															</div><!--mvp-score-teams-right-->
														<?php } ?>
													</div><!--mvp-score-teams-->
													<div class="mvp-score-status relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-score-status-->
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?></a><?php } ?>
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-score-item-->
								</div><!--mvp-score-tab2-->
							<?php } ?>
							<?php if ( get_option('mvp_score_name3') ) { ?>
								<div id="mvp-score-tab3" class="carousel es-carousel es-carousel-wrapper tabber-content">
									<div class="mvp-score-item">
										<ul class="mvp-score-list slides left relative">
											<?php global $post; $score_cat3 = get_option('mvp_score_cat3'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat3 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php } ?>
													<div class="mvp-score-teams left relative">
														<div class="mvp-score-teams-left left relative">
															<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
															<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
														</div><!--mvp-score-teams-left-->
														<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
															<div class="mvp-score-teams-right relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
															</div><!--mvp-score-teams-right-->
														<?php } ?>
													</div><!--mvp-score-teams-->
													<div class="mvp-score-status relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-score-status-->
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?></a><?php } ?>
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-score-item-->
								</div><!--mvp-score-tab3-->
							<?php } ?>
							<?php if ( get_option('mvp_score_name4') ) { ?>
								<div id="mvp-score-tab4" class="carousel es-carousel es-carousel-wrapper tabber-content">
									<div class="mvp-score-item">
										<ul class="mvp-score-list slides left relative">
											<?php global $post; $score_cat4 = get_option('mvp_score_cat4'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat4 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php } ?>
													<div class="mvp-score-teams left relative">
														<div class="mvp-score-teams-left left relative">
															<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
															<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
														</div><!--mvp-score-teams-left-->
														<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
															<div class="mvp-score-teams-right relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
															</div><!--mvp-score-teams-right-->
														<?php } ?>
													</div><!--mvp-score-teams-->
													<div class="mvp-score-status relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-score-status-->
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?></a><?php } ?>
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-score-item-->
								</div><!--mvp-score-tab4-->
							<?php } ?>
							<?php if ( get_option('mvp_score_name5') ) { ?>
								<div id="mvp-score-tab5" class="carousel es-carousel es-carousel-wrapper tabber-content">
									<div class="mvp-score-item">
										<ul class="mvp-score-list slides left relative">
											<?php global $post; $score_cat5 = get_option('mvp_score_cat5'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat5 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php } ?>
													<div class="mvp-score-teams left relative">
														<div class="mvp-score-teams-left left relative">
															<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
															<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
														</div><!--mvp-score-teams-left-->
														<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
															<div class="mvp-score-teams-right relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
															</div><!--mvp-score-teams-right-->
														<?php } ?>
													</div><!--mvp-score-teams-->
													<div class="mvp-score-status relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-score-status-->
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?></a><?php } ?>
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-score-item-->
								</div><!--mvp-score-tab5-->
							<?php } ?>
							<?php if ( get_option('mvp_score_name6') ) { ?>
								<div id="mvp-score-tab6" class="carousel es-carousel es-carousel-wrapper tabber-content">
									<div class="mvp-score-item">
										<ul class="mvp-score-list slides left relative">
											<?php global $post; $score_cat6 = get_option('mvp_score_cat6'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat6 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php } ?>
													<div class="mvp-score-teams left relative">
														<div class="mvp-score-teams-left left relative">
															<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
															<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
														</div><!--mvp-score-teams-left-->
														<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
															<div class="mvp-score-teams-right relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
															</div><!--mvp-score-teams-right-->
														<?php } ?>
													</div><!--mvp-score-teams-->
													<div class="mvp-score-status relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-score-status-->
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?></a><?php } ?>
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-score-item-->
								</div><!--mvp-score-tab6-->
							<?php } ?>
							<?php if ( get_option('mvp_score_name7') ) { ?>
								<div id="mvp-score-tab7" class="carousel es-carousel es-carousel-wrapper tabber-content">
									<div class="mvp-score-item">
										<ul class="mvp-score-list slides left relative">
											<?php global $post; $score_cat7 = get_option('mvp_score_cat7'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat7 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php } ?>
													<div class="mvp-score-teams left relative">
														<div class="mvp-score-teams-left left relative">
															<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
															<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
														</div><!--mvp-score-teams-left-->
														<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
															<div class="mvp-score-teams-right relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
															</div><!--mvp-score-teams-right-->
														<?php } ?>
													</div><!--mvp-score-teams-->
													<div class="mvp-score-status relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-score-status-->
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?></a><?php } ?>
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-score-item-->
								</div><!--mvp-score-tab7-->
							<?php } ?>
							<?php if ( get_option('mvp_score_name8') ) { ?>
								<div id="mvp-score-tab8" class="carousel es-carousel es-carousel-wrapper tabber-content">
									<div class="mvp-score-item">
										<ul class="mvp-score-list slides left relative">
											<?php global $post; $score_cat8 = get_option('mvp_score_cat8'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat8 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php } ?>
													<div class="mvp-score-teams left relative">
														<div class="mvp-score-teams-left left relative">
															<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
															<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
														</div><!--mvp-score-teams-left-->
														<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
															<div class="mvp-score-teams-right relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
															</div><!--mvp-score-teams-right-->
														<?php } ?>
													</div><!--mvp-score-teams-->
													<div class="mvp-score-status relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-score-status-->
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?></a><?php } ?>
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-score-item-->
								</div><!--mvp-score-tab8-->
							<?php } ?>
							<?php if ( get_option('mvp_score_name9') ) { ?>
								<div id="mvp-score-tab9" class="carousel es-carousel es-carousel-wrapper tabber-content">
									<div class="mvp-score-item">
										<ul class="mvp-score-list slides left relative">
											<?php global $post; $score_cat9 = get_option('mvp_score_cat9'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat9 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php } ?>
													<div class="mvp-score-teams left relative">
														<div class="mvp-score-teams-left left relative">
															<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
															<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
														</div><!--mvp-score-teams-left-->
														<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
															<div class="mvp-score-teams-right relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
															</div><!--mvp-score-teams-right-->
														<?php } ?>
													</div><!--mvp-score-teams-->
													<div class="mvp-score-status relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-score-status-->
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?></a><?php } ?>
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-score-item-->
								</div><!--mvp-score-tab9-->
							<?php } ?>
							<?php if ( get_option('mvp_score_name10') ) { ?>
								<div id="mvp-score-tab10" class="carousel es-carousel es-carousel-wrapper tabber-content">
									<div class="mvp-score-item">
										<ul class="mvp-score-list slides left relative">
											<?php global $post; $score_cat10 = get_option('mvp_score_cat10'); $recent = new WP_Query(array( 'post_type' => 'scoreboard', 'posts_per_page' => '999', 'tax_query' => array(array( 'taxonomy' => 'scores_cat', 'field' => 'slug', 'terms' => $score_cat10 ))  )); while($recent->have_posts()) : $recent->the_post();?>
												<li>
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php } ?>
													<div class="mvp-score-teams left relative">
														<div class="mvp-score-teams-left left relative">
															<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team", true)); ?><br>
															<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team", true)); ?></p>
														</div><!--mvp-score-teams-left-->
														<?php $mvp_show_score = get_post_meta($post->ID, "mvp_show_score", true); if ($mvp_show_score) { ?>
															<div class="mvp-score-teams-right relative">
																<p><?php echo esc_html(get_post_meta($post->ID, "mvp_away_team_score", true)); ?><br>
																<?php echo esc_html(get_post_meta($post->ID, "mvp_home_team_score", true)); ?></p>
															</div><!--mvp-score-teams-right-->
														<?php } ?>
													</div><!--mvp-score-teams-->
													<div class="mvp-score-status relative">
														<p><?php echo esc_html(get_post_meta($post->ID, "mvp_status", true)); ?></p>
													</div><!--mvp-score-status-->
													<?php $mvp_link_post = get_post_meta($post->ID, "mvp_link_post", true); if ($mvp_link_post) { ?></a><?php } ?>
												</li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!--mvp-score-item-->
								</div><!--mvp-score-tab10-->
							<?php } ?>
						</div><!--mvp-score-main-->
					</div><!--mvp-score-in-->
				</div><!--tabber-container-->
			</div><!--mvp-score-out-->
		</div><!--mvp-score-cont-->
	</div><!--mvp-main-box-cont-->
</div><!--mvp-score-wrap-->