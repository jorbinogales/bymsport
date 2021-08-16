<?php
/**
 * Plugin Name: Home Tag List Widget
 */

add_action( 'widgets_init', 'mvp_home_taglist_load_widgets' );

function mvp_home_taglist_load_widgets() {
	register_widget( 'mvp_home_taglist_widget' );
}

class mvp_home_taglist_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mvp_home_taglist_widget', 'description' => esc_html__('A widget that displays a list of 4 posts from a tag of your choice in the homepage widget area.', 'the-league') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'mvp_home_taglist_widget' );

		/* Create the widget. */
		parent::__construct( 'mvp_home_taglist_widget', esc_html__('The League: Home Tag List Widget', 'the-league'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		global $post;
		$title = apply_filters('widget_title', $instance['title'] );
		$tags = $instance['tags'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		?>

		<?php if ( $title ) { ?>
			<h4 class="mvp-sec-head"><span class="mvp-sec-head"><?php echo $title; ?></span><span class="mvp-widget-head-link"><a href="<?php $tag_id = get_term_by('slug', $tags, 'post_tag'); echo get_tag_link($tag_id); ?>"><?php esc_html_e( 'More', 'the-league' ); ?> <?php echo esc_html( $title ); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></span></h4>
		<?php } ?>
		<div class="mvp-widget-list-wrap left relative">
			<?php $recent = new WP_Query(array( 'tag' => $tags, 'posts_per_page' => '4' )); while($recent->have_posts()) : $recent->the_post(); ?>
				<div class="mvp-widget-list-story1 left relative">
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark">
						<div class="mvp-widget-list-img left relative">
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
						</div><!--mvp-widget-list-img-->
						</a>
					<?php } ?>
					<div class="mvp-widget-list-text1 left relative">
						<div class="mvp-post-info-top left relative">
							<h3><a href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></a></h3><span class="mvp-post-info-date left relative">/ <?php printf( esc_html__( '%s ago', 'the-league' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
						</div><!--mvp-post-info-top-->
						<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<p><?php echo wp_trim_words( get_the_excerpt(), 14, '...' ); ?></p>
						<div class="mvp-blog-story-info left relative">
							<span class="mvp-blog-story-author left"><?php esc_html_e( 'By', 'the-league' ); ?> <?php the_author_posts_link(); ?></span>
						</div><!--mvp-blog-story-info-->
					</div><!--mvp-widget-list-text1-->
				</div><!--mvp-widget-list-story1-->
			<?php endwhile; wp_reset_postdata(); ?>
		</div><!--mvp-widget-list-wrap-->

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
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['tags'] = strip_tags( $new_instance['tags'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Title' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>

		<!-- Tag -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tags' ); ?>">Tag Slug Name:</label>
			<input id="<?php echo $this->get_field_id( 'tags' ); ?>" name="<?php echo $this->get_field_name( 'tags' ); ?>" value="<?php echo $instance['tags']; ?>" style="width:90%;" />
		</p>

	<?php
	}
}

?>