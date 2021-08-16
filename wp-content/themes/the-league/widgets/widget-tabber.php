<?php
/**
 * Plugin Name: Sidebar Tabber Widget
 */

add_action( 'widgets_init', 'mvp_tabber_load_widgets' );

function mvp_tabber_load_widgets() {
	register_widget( 'mvp_tabber_widget' );
}

class mvp_tabber_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mvp_tabber_widget', 'description' => esc_html__('A widget that displays your latest posts, popular posts, and video posts in a tabber widget.', 'the-league') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'mvp_tabber_widget' );

		/* Create the widget. */
		parent::__construct( 'mvp_tabber_widget', esc_html__('The League: Sidebar Tabber Widget', 'the-league'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		global $post;
		$popular_days = $instance['popular_days'];
		$number = $instance['number'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		?>

				<div class="mvp-side-tab-wrap left relative">
					<div class="mvp-side-tab-top left relative">
						<ul class="mvp-side-tab-list mvp-col-tabs">
							<li class="mvp-feat-col-tab">
								<a href="#mvp-tab-col1"><span class="mvp-side-tab-head"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php esc_html_e( 'Headlines', 'the-league' ); ?></span></a>
							</li>
							<li>
								<a href="#mvp-tab-col2"><span class="mvp-side-tab-head"><i class="fa fa-bolt" aria-hidden="true"></i>
 <?php esc_html_e( 'Trending', 'the-league' ); ?></span></a>
							</li>
							<?php query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-video' )) )); if (have_posts()) : ?>
							<li>
								<a href="#mvp-tab-col3"><span class="mvp-side-tab-head"><i class="fa fa-play-circle-o" aria-hidden="true"></i>
 <?php esc_html_e( 'Videos', 'the-league' ); ?></span></a>
							</li>
							<?php endif; wp_reset_query(); ?>
						</ul>
					</div><!--mvp-side-tab-top-->
					<div id="mvp-tab-col1" class="mvp-side-tab-main left relative mvp-tab-col-cont">
						<?php $recent = new WP_Query(array('posts_per_page' => $number )); while($recent->have_posts()) : $recent->the_post(); ?>
							<div class="mvp-side-tab-story left relative">
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<div class="mvp-side-tab-out relative">
										<a href="<?php the_permalink(); ?>" rel="bookmark">
										<div class="mvp-side-tab-img left relative">
											<?php the_post_thumbnail('mvp-small-thumb'); ?>
											<?php if ( has_post_format( 'video' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-play" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } else if ( has_post_format( 'gallery' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } ?>
										</div><!--mvp-side-tab-img-->
										</a>
										<div class="mvp-side-tab-in">
											<div class="mvp-side-tab-text left relative">
												<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
												<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											</div><!--mvp-side-tab-text-->
										</div><!--mvp-side-tab-in-->
									</div><!--mvp-side-tab-out-->
								<?php } else { ?>
									<div class="mvp-side-tab-text left relative">
										<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
										<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
									</div><!--mvp-side-tab-text-->
								<?php } ?>
							</div><!--mvp-side-tab-story-->
						<?php endwhile; wp_reset_postdata(); ?>
					</div><!--mvp-tab-col1-->
					<div id="mvp-tab-col2" class="mvp-side-tab-main left relative mvp-tab-col-cont">
						<?php $pop_days = esc_html(get_option('mvp_pop_days')); $popular_days_ago = "$popular_days days ago"; $recent = new WP_Query(array('posts_per_page' => $number, 'orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'post_views_count', 'date_query' => array( array( 'after' => $popular_days_ago )) )); while($recent->have_posts()) : $recent->the_post(); ?>
							<div class="mvp-side-tab-story left relative">
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<div class="mvp-side-tab-out relative">
										<a href="<?php the_permalink(); ?>" rel="bookmark">
										<div class="mvp-side-tab-img left relative">
											<?php the_post_thumbnail('mvp-small-thumb'); ?>
											<?php if ( has_post_format( 'video' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-play" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } else if ( has_post_format( 'gallery' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } ?>
										</div><!--mvp-side-tab-img-->
										</a>
										<div class="mvp-side-tab-in">
											<div class="mvp-side-tab-text left relative">
												<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
												<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											</div><!--mvp-side-tab-text-->
										</div><!--mvp-side-tab-in-->
									</div><!--mvp-side-tab-out-->
								<?php } else { ?>
									<div class="mvp-side-tab-text left relative">
										<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
										<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
									</div><!--mvp-side-tab-text-->
								<?php } ?>
							</div><!--mvp-side-tab-story-->
						<?php endwhile; wp_reset_postdata(); ?>
					</div><!--mvp-tab-col2-->
					<?php query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-video' )) )); if (have_posts()) : ?>
					<div id="mvp-tab-col3" class="mvp-side-tab-main left relative mvp-tab-col-cont">
						<?php global $post; $paged = (get_query_var('page')) ? get_query_var('page') : 1; query_posts(array( 'tax_query' => array( array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' => 'post-format-video' )), 'posts_per_page' => $number, 'paged' =>$paged )); if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="mvp-side-tab-story left relative">
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<div class="mvp-side-tab-out relative">
										<a href="<?php the_permalink(); ?>" rel="bookmark">
										<div class="mvp-side-tab-img left relative">
											<?php the_post_thumbnail('mvp-small-thumb'); ?>
											<?php if ( has_post_format( 'video' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-play" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } else if ( has_post_format( 'gallery' )) { ?>
												<div class="mvp-vid-box-wrap">
													<i class="fa fa-2 fa-camera" aria-hidden="true"></i>
												</div><!--mvp-vid-box-wrap-->
											<?php } ?>
										</div><!--mvp-side-tab-img-->
										</a>
										<div class="mvp-side-tab-in">
											<div class="mvp-side-tab-text left relative">
												<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
												<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											</div><!--mvp-side-tab-text-->
										</div><!--mvp-side-tab-in-->
									</div><!--mvp-side-tab-out-->
								<?php } else { ?>
									<div class="mvp-side-tab-text left relative">
										<h3><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></h3>
										<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
									</div><!--mvp-side-tab-text-->
								<?php } ?>
							</div><!--mvp-side-tab-story-->
						<?php endwhile; endif; wp_reset_query(); ?>
					</div><!--mvp-tab-col3-->
					<?php endif; wp_reset_query(); ?>
				</div><!--mvp-side-tab-wrap-->

		<?php

		/* After widget (defined by themes). */
		echo $after_widget;

	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['popular_days'] = strip_tags( $new_instance['popular_days'] );
		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'number' => 5, 'popular_days' => 30 );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Number of days -->
		<p>
			<label for="<?php echo $this->get_field_id( 'popular_days' ); ?>">Number of days to use for Popular Posts:</label>
			<input id="<?php echo $this->get_field_id( 'popular_days' ); ?>" name="<?php echo $this->get_field_name( 'popular_days' ); ?>" value="<?php echo $instance['popular_days']; ?>" size="3" />
		</p>

		<!-- Number of posts -->
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of posts to display:</label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
		</p>

	<?php
	}
}

?>