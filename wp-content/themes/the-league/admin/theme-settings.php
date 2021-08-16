<?php

add_action('init','propanel_of_options');

if (!function_exists('propanel_of_options')) {
function propanel_of_options(){

//Theme Shortname
$shortname = "mvp";

//Populate the options array
global $tt_options;
$tt_options = get_option('of_options');

if ( is_admin() ) {

//Access the WordPress Pages via an Array
$tt_pages = array();
$tt_pages_obj = get_pages('sort_column=post_parent,menu_order');
foreach ($tt_pages_obj as $tt_page) {
$tt_pages[$tt_page->ID] = $tt_page->post_name; }
$tt_pages_tmp = array_unshift($tt_pages, "Select a page:");

//Access the WordPress Categories via an Array
$tt_categories = array();
$tt_categories_obj = get_categories('hide_empty=0');
foreach ($tt_categories_obj as $tt_cat) {
$tt_categories[$tt_cat->cat_ID] = $tt_cat->cat_name;}
$categories_tmp = array_unshift($tt_categories, "Select a category:");

if ( post_type_exists( 'scoreboard' ) ) {

//Access the custom Scoreboard Categories via an Array
$tt_tax = array();
$scores = get_terms('scores_cat', array( 'hide_empty' => 0 ));
foreach ($scores as $score) {
$tt_tax[$score->slug] = $score->slug;}
$tax_tmp = array_unshift($tt_tax, "Select a category:");

}

$home_layout = array("Blog","Widgets","Widgets and Blog");

$post_layout = array("Template 1","Template 2","Template 3","Template 4","Template 5","Template 6","Template 7","Template 8");

$feat_layout = array("Featured 1","Featured 2","Featured 3","Featured 4","Featured 5");

$cat_layout = array("Featured 1","Featured 2");

$score_skin = array("Light","Dark");

}

/*-----------------------------------------------------------------------------------*/
/* Create The Custom Site Options Panel
/*-----------------------------------------------------------------------------------*/
$options = array(); // do not delete this line - sky will fall

/* General Settings */
$options[] = array( "name" => esc_html__('General','the-league'),
			"type" => "heading");

$options[] = array( "name" => esc_html__('Logo','the-league'),
			"desc" => esc_html__('Upload a logo file that will appear in your navigation. The recommended maximum dimensions for this logo are 250x50.','the-league'),
			"id" => $shortname."_logo",
			"std" => "",
			"type" => "upload");
	
$options[] = array( "name" => esc_html__('Logo in Navigation Width','the-league'),
			"desc" => "If you are utilizing the Google AMP feature, you will need to enter the width of your logo file here. Default is 167.",
			"id" => $shortname."_amp_logow",
			"std" => "167",
			"type" => "text");

$options[] = array( "name" => esc_html__('Logo in Navigation Height','the-league'),
			"desc" => "If you are utilizing the Google AMP feature, you will need to enter the height of your logo file here. Default is 50.",
			"id" => $shortname."_amp_logoh",
			"std" => "50",
			"type" => "text");

$options[] = array( "name" => __('Logo in Footer','the-league'),
			"desc" => esc_html__('Upload a logo file that will appear in your footer. There are no maximum recommended dimensions for this logo size.','the-league'),
			"id" => $shortname."_logo_foot",
			"std" => "",
			"type" => "upload");

$options[] = array( "name" => esc_html__('Custom Favicon','the-league'),
			"desc" => esc_html__('Upload a 16x16px PNG/GIF image that will represent your website\'s favicon.','the-league'),
			"id" => $shortname."_favicon",
			"std" => "",
			"type" => "upload");

$options[] = array( "name" => esc_html__('Custom CSS','the-league'),
			"desc" => "Enter your custom CSS here. You will not lose any of the CSS you enter here if you update the theme to a new version.",
			"id" => $shortname."_customcss",
			"std" => "",
			"type" => "textarea");

$options[] = array( "name" => esc_html__('Toggle Responsiveness','the-league'),
			"desc" => "Uncheck this box if you would like to remove the responsiveness of the theme.",
			"id" => $shortname."_respond",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => esc_html__('Toggle Infinite Scroll','the-league'),
			"desc" => "Uncheck this box if you would like to remove the Infinite Scroll feature.",
			"id" => $shortname."_infinite_scroll",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => esc_html__('Enable RTL','the-league'),
			"desc" => "Check this box if you would like to enable the RTL stylesheet.",
			"id" => $shortname."_rtl",
			"std" => "false",
			"type" => "checkbox");


/* Theme Color Settings */
$options[] = array( "name" => esc_html__('Colors','the-league'),
			"type" => "heading");

$options[] = array( "name" => esc_html__('Primary Theme Color','the-league'),
			"desc" => esc_html__('Primary color for the site.','the-league'),
			"id" => $shortname."_primary_theme",
			"std" => "#fe074e",
			"type" => "color");

$options[] = array( "name" => esc_html__('Top Navigation Background Color','the-league'),
			"desc" => esc_html__('The background color of the top navigation.','the-league'),
			"id" => $shortname."_top_nav_bg",
			"std" => "#ffffff",
			"type" => "color");

$options[] = array( "name" => esc_html__('Top Navigation Text Color','the-league'),
			"desc" => esc_html__('The text color of the top navigation.','the-league'),
			"id" => $shortname."_top_nav_text",
			"std" => "#333333",
			"type" => "color");

$options[] = array( "name" => esc_html__('Top Navigation Text Hover Color','the-league'),
			"desc" => esc_html__('The text color when you mouse over the top navigation.','the-league'),
			"id" => $shortname."_top_nav_hover",
			"std" => "#fe074e",
			"type" => "color");

$options[] = array( "name" => esc_html__('Primary Link Color','the-league'),
			"desc" => esc_html__('Primary link color for the site.','the-league'),
			"id" => $shortname."_link_color",
			"std" => "#0077ee",
			"type" => "color");

$options[] = array( "name" => esc_html__('Link Hover Color','the-league'),
			"desc" => esc_html__('Link hover color for the site.','the-league'),
			"id" => $shortname."_link_hover",
			"std" => "#fe074e",
			"type" => "color");

/* Font Settings */
$options[] = array( "name" => esc_html__('Fonts','the-league'),
			"type" => "heading");

$options[] = array( "name" => esc_html__('General Content Font','the-league'),
			"desc" => esc_html__('Enter the font name for the general font for the content on all pages.','the-league'),
			"id" => $shortname."_content_font",
			"std" => "Titillium Web",
			"type" => "text");

$options[] = array( "name" => esc_html__('Fly-Out Menu/Top Navigation Font','the-league'),
			"desc" => "Enter the font name for the fly-out and top navigation menus.",
			"id" => $shortname."_menu_font",
			"std" => "Titillium Web",
			"type" => "text");

$options[] = array( "name" => esc_html__('Featured Posts/Article Headline Font','the-league'),
			"desc" => "Enter the font name the font for the headlines in the Featured Posts section and the Article title on posts and pages.",
			"id" => $shortname."_featured_font",
			"std" => "Roboto Condensed",
			"type" => "text");

$options[] = array( "name" => esc_html__('Article Title Font','the-league'),
			"desc" => "Enter the font name the font for the title of posts on article pages.",
			"id" => $shortname."_title_font",
			"std" => "Roboto",
			"type" => "text");

$options[] = array( "name" => esc_html__('General Heading Font','the-league'),
			"desc" => "Enter the font name the font for the general headings that appear at the top of the different sections around the site.",
			"id" => $shortname."_heading_font",
			"std" => "Titillium Web",
			"type" => "text");


/* Homepage Settings */
$options[] = array( "name" => esc_html__('Homepage Settings','the-league'),
			"type" => "heading");

$options[] = array( "name" => esc_html__('Attention','the-league'),
			"desc" => "",
			"id" => $shortname."_attention_home_slider",
			"std" => "In order to utilize these functions, you will have to set up your homepage as a static page. Please refer to the Installing Demo Data section of the documentation for more information.",
			"type" => "info");

$options[] = array( "name" => esc_html__('Show Featured Posts?','the-league'),
			"desc" => "Uncheck this box if you would like to remove the Featured Posts section from the homepage.",
			"id" => $shortname."_feat_posts",
			"std" => "true",
			"type" => "checkbox");

if (isset($feat_layout)) {
$options[] = array( "name" => esc_html__('Featured Posts Layout','the-league'),
			"desc" => esc_html__('Select the layout of your Featured Posts section on the homepage.','the-league'),
			"id" => $shortname."_feat_layout",
			"std" => "Featured 1",
			"type" => "select",
			"options" => $feat_layout);
}

$options[] = array( "name" => esc_html__('Featured Posts Tag Slug','the-league'),
			"desc" => esc_html__('Enter the Tag Slug of the Tag you want associated with the Featured Posts section. Posts with this Tag will be displayed in the Featured Slider at the top of the homepage.','the-league'),
			"id" => $shortname."_feat_posts_tags",
			"std" => "featured",
			"type" => "text");

$options[] = array( "name" => esc_html__('Trending Posts Days','the-league'),
			"desc" => "Number of days to use for Trending Posts in the Featured Posts Layout #4. Only posts published within this length of time will be displayed in the Trending Posts tab.",
			"id" => $shortname."_pop_days",
			"std" => "9999",
			"type" => "text");

if (isset($home_layout)) {
$options[] = array( "name" => __('Homepage Body Layout','the-league'),
			"desc" => __('Select your layout for the body of the homepage that will appear in the main content area of the homepage.','the-league'),
			"id" => $shortname."_home_layout",
			"std" => "Widgets and Blog",
			"type" => "select",
			"options" => $home_layout);
}

$options[] = array( "name" => esc_html__('Number of posts per page','the-league'),
			"desc" => "Set the number of posts per page that you want displayed on the Homepage Blog and the Latest News Template.",
			"id" => $shortname."_posts_num",
			"std" => "10",
			"type" => "text");


/* Article Settings */
$options[] = array( "name" => esc_html__('Article Settings','the-league'),
			"type" => "heading");

if (isset($post_layout)) {
$options[] = array( "name" => esc_html__('Default Post Template','the-league'),
			"desc" => esc_html__('Select the default Post Template layout for your articles.','the-league'),
			"id" => $shortname."_post_layout",
			"std" => "Template 1",
			"type" => "select",
			"options" => $post_layout);
}

$options[] = array( "name" => esc_html__('Show Featured Image In Posts?','the-league'),
			"desc" => esc_html__('Uncheck this box if you would like to remove the featured image thumbnail from all posts.','the-league'),
			"id" => $shortname."_featured_img",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => esc_html__('Show Social Sharing Buttons?','the-league'),
			"desc" => "Uncheck this box if you would like to remove the social sharing buttons from all posts.",
			"id" => $shortname."_social_box",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => esc_html__('Show Post Info?','the-league'),
			"desc" => "Uncheck this box if you would like to remove the author/post info from the top of posts.",
			"id" => $shortname."_author_info",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => esc_html__('Show Author Box?','the-league'),
			"desc" => "Uncheck this box if you would like to remove the author box from the bottom of your posts.",
			"id" => $shortname."_author_box",
			"std" => "false",
			"type" => "checkbox");

$options[] = array( "name" => esc_html__('Show More Posts?','the-league'),
			"desc" => "Uncheck this box if you would like to remove the More Posts from the bottom of the posts.",
			"id" => $shortname."_more_posts",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => esc_html__('Number of More Posts','the-league'),
			"desc" => "Set the number of posts that you want displayed in the More Posts section on your posts.",
			"id" => $shortname."_more_num",
			"std" => "4",
			"type" => "text");

$options[] = array( "name" => esc_html__('Show Previous/Next Post Links?','the-league'),
			"desc" => "Uncheck this box if you would like to remove the links to the previous/next posts arrows in the margins of each article.",
			"id" => $shortname."_prev_next",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => esc_html__('Show Trending Posts Bar?','the-league'),
			"desc" => "Uncheck this box if you would like to remove the Trending Posts Bar that appears below the nav bar as your scroll down on posts.",
			"id" => $shortname."_show_trend",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => esc_html__('Trending Posts Days','the-league'),
			"desc" => "Number of days to use for the Trending Posts Bar. Only posts published within this length of time will be displayed in the Trending Posts Bar.",
			"id" => $shortname."_trend_days",
			"std" => "9999",
			"type" => "text");

$options[] = array( "name" => esc_html__('Disqus Forum Shortname','the-league'),
			"desc" => "If you want to use Disqus as your commenting system, enter your Disqus Forum Shortname in order to activate Disqus on your site. This is the unique identifier for your website in Disqus (i.e. yourforumshortname.disqus.com)",
			"id" => $shortname."_disqus_id",
			"std" => "",
			"type" => "text");
	
	
/* Google AMP Settings */
$options[] = array( "name" => esc_html__('Google AMP Settings','the-league'),
			"type" => "heading");

$options[] = array( "name" => esc_html__('Enable Google AMP on mobile devices','click-mag'),
			"desc" => "Check this box if you would like to enable the Google AMP compatibility with the theme. You will also need to install and activate the AMP plugin that comes with the theme.",
			"id" => $shortname."_amp",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => esc_html__('Facebook App ID','the-league'),
			"desc" => "In order to utilize the Google AMP Facebook share button, you must provide a valid Facebook App ID.",
			"id" => $shortname."_amp_fb",
			"std" => "",
			"type" => "text");


/* Category Settings */
$options[] = array( "name" => esc_html__('Category Pages','the-league'),
			"type" => "heading");

$options[] = array( "name" => esc_html__('Attention','the-league'),
			"desc" => "",
			"id" => $shortname."_attention_ad",
			"std" => "To set the number of posts that are displayed on category pages, go to Settings > Reading and change the 'Blog page show at most' number.",
			"type" => "info");

$options[] = array( "name" => esc_html__('Show Featured Posts','the-league'),
			"desc" => "Uncheck this box if you would like to remove the Featured Posts section from the category pages.",
			"id" => $shortname."_feat_cat",
			"std" => "true",
			"type" => "checkbox");

if (isset($cat_layout)) {
$options[] = array( "name" => esc_html__('Featured Posts Layout','the-league'),
			"desc" => esc_html__('Select the layout of your Featured Posts section on the category pages.','the-league'),
			"id" => $shortname."_cat_layout",
			"std" => "Featured 1",
			"type" => "select",
			"options" => $cat_layout);
}


if ( post_type_exists( 'scoreboard' ) ) {

/* Scoreboard Settings */
$options[] = array( "name" => __('Scoreboard Settings','the-league'),
			"type" => "heading");

$options[] = array( "name" => __('Show Scoreboard?','the-league'),
			"desc" => __('Uncheck this box if you would like to remove the scoreboard.','the-league'),
			"id" => $shortname."_show_scoreboard",
			"std" => "false",
			"type" => "checkbox");

if (isset($score_skin)) {
$options[] = array( "name" => __('Scoreboard Skin','the-league'),
			"desc" => __('Choose between a light and dark skin for the scoreboard.','the-league'),
			"id" => $shortname."_score_skin",
			"std" => "Dark",
			"type" => "select",
			"options" => $score_skin);
}

$options[] = array( "name" => __('Name of Category 1','the-league'),
			"desc" => "Set the name of the 1st category that will be displayed as the link above the scoreboard.",
			"id" => $shortname."_score_name1",
			"std" => "",
			"type" => "text");

if (isset($tt_tax)) {
$options[] = array( "name" => __('Select Category 1','the-league'),
			"desc" => __('Select the 1st category for your scoreboard.','the-league'),
			"id" => $shortname."_score_cat1",
			"std" => "1",
			"type" => "select",
			"options" => $tt_tax);
}

$options[] = array( "name" => __('Name of Category 2','the-league'),
			"desc" => "Set the name of the 2nd category that will be displayed as the link above the scoreboard.",
			"id" => $shortname."_score_name2",
			"std" => "",
			"type" => "text");

if (isset($tt_tax)) {
$options[] = array( "name" => __('Select Category 2','the-league'),
			"desc" => __('Select the 2nd category for your scoreboard.','the-league'),
			"id" => $shortname."_score_cat2",
			"std" => "1",
			"type" => "select",
			"options" => $tt_tax);
}

$options[] = array( "name" => __('Name of Category 3','the-league'),
			"desc" => "Set the name of the 3rd category that will be displayed as the link above the scoreboard.",
			"id" => $shortname."_score_name3",
			"std" => "",
			"type" => "text");

if (isset($tt_tax)) {
$options[] = array( "name" => __('Select Category 3','the-league'),
			"desc" => __('Select the 3rd category for your scoreboard.','the-league'),
			"id" => $shortname."_score_cat3",
			"std" => "1",
			"type" => "select",
			"options" => $tt_tax);
}

$options[] = array( "name" => __('Name of Category 4','the-league'),
			"desc" => "Set the name of the 4th category that will be displayed as the link above the scoreboard.",
			"id" => $shortname."_score_name4",
			"std" => "",
			"type" => "text");

if (isset($tt_tax)) {
$options[] = array( "name" => __('Select Category 4','the-league'),
			"desc" => __('Select the 4th category for your scoreboard.','the-league'),
			"id" => $shortname."_score_cat4",
			"std" => "1",
			"type" => "select",
			"options" => $tt_tax);
}

$options[] = array( "name" => __('Name of Category 5','the-league'),
			"desc" => "Set the name of the 5th category that will be displayed as the link above the scoreboard.",
			"id" => $shortname."_score_name5",
			"std" => "",
			"type" => "text");

if (isset($tt_tax)) {
$options[] = array( "name" => __('Select Category 5','the-league'),
			"desc" => __('Select the 5th category for your scoreboard.','the-league'),
			"id" => $shortname."_score_cat5",
			"std" => "1",
			"type" => "select",
			"options" => $tt_tax);
}

$options[] = array( "name" => __('Name of Category 6','the-league'),
			"desc" => "Set the name of the 6th category that will be displayed as the link above the scoreboard.",
			"id" => $shortname."_score_name6",
			"std" => "",
			"type" => "text");

if (isset($tt_tax)) {
$options[] = array( "name" => __('Select Category 6','the-league'),
			"desc" => __('Select the 6th category for your scoreboard.','the-league'),
			"id" => $shortname."_score_cat6",
			"std" => "1",
			"type" => "select",
			"options" => $tt_tax);
}

$options[] = array( "name" => __('Name of Category 7','the-league'),
			"desc" => "Set the name of the 7th category that will be displayed as the link above the scoreboard.",
			"id" => $shortname."_score_name7",
			"std" => "",
			"type" => "text");

if (isset($tt_tax)) {
$options[] = array( "name" => __('Select Category 7','the-league'),
			"desc" => __('Select the 7th category for your scoreboard.','the-league'),
			"id" => $shortname."_score_cat7",
			"std" => "1",
			"type" => "select",
			"options" => $tt_tax);
}

$options[] = array( "name" => __('Name of Category 8','the-league'),
			"desc" => "Set the name of the 8th category that will be displayed as the link above the scoreboard.",
			"id" => $shortname."_score_name8",
			"std" => "",
			"type" => "text");

if (isset($tt_tax)) {
$options[] = array( "name" => __('Select Category 8','the-league'),
			"desc" => __('Select the 8th category for your scoreboard.','the-league'),
			"id" => $shortname."_score_cat8",
			"std" => "1",
			"type" => "select",
			"options" => $tt_tax);
}

$options[] = array( "name" => __('Name of Category 9','the-league'),
			"desc" => "Set the name of the 9th category that will be displayed as the link above the scoreboard.",
			"id" => $shortname."_score_name9",
			"std" => "",
			"type" => "text");

if (isset($tt_tax)) {
$options[] = array( "name" => __('Select Category 9','the-league'),
			"desc" => __('Select the 9th category for your scoreboard.','the-league'),
			"id" => $shortname."_score_cat9",
			"std" => "1",
			"type" => "select",
			"options" => $tt_tax);
}

$options[] = array( "name" => __('Name of Category 10','the-league'),
			"desc" => "Set the name of the 10th category that will be displayed as the link above the scoreboard.",
			"id" => $shortname."_score_name10",
			"std" => "",
			"type" => "text");

if (isset($tt_tax)) {
$options[] = array( "name" => __('Select Category 10','the-league'),
			"desc" => __('Select the 10th category for your scoreboard.','the-league'),
			"id" => $shortname."_score_cat10",
			"std" => "1",
			"type" => "select",
			"options" => $tt_tax);
}

}


/* Social Media Settings */
$options[] = array( "name" => esc_html__('Social Media','the-league'),
			"type" => "heading");

$options[] = array( "name" => esc_html__('Facebook','the-league'),
			"desc" => "Enter your Facebook Page URL here.",
			"id" => $shortname."_facebook",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => esc_html__('Twitter','the-league'),
			"desc" => "Enter your Twitter URL here.",
			"id" => $shortname."_twitter",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => esc_html__('Pinterest','the-league'),
			"desc" => "Enter your Pinterest URL here.",
			"id" => $shortname."_pinterest",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => esc_html__('Instagram','the-league'),
			"desc" => "Enter your Instagram URL here.",
			"id" => $shortname."_instagram",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => esc_html__('Google Plus','the-league'),
			"desc" => "Enter your Google Plus URL here.",
			"id" => $shortname."_google",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => esc_html__('Youtube','the-league'),
			"desc" => "Enter your Youtube URL here.",
			"id" => $shortname."_youtube",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => esc_html__('Linkedin','the-league'),
			"desc" => "Enter your Linkedin URL here.",
			"id" => $shortname."_linkedin",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => esc_html__('Tumblr','the-league'),
			"desc" => "Enter your Tumblr URL here.",
			"id" => $shortname."_tumblr",
			"std" => "",
			"type" => "text");


/* Ad Management Settings */
$options[] = array( "name" => esc_html__('Ad Management','the-league'),
			"type" => "heading");

$options[] = array( "name" => esc_html__('Attention','the-league'),
			"desc" => "",
			"id" => $shortname."_attention_ad",
			"std" => "The 300x250 ads are controlled via a Widget.",
			"type" => "info");

$options[] = array( "name" => esc_html__('Header Leaderboard Ad Code','the-league'),
			"desc" => "Enter your ad code (Eg. Google Adsense) for the 970x90 ad area. You can also place a 728x90 ad in this spot.",
			"id" => $shortname."_header_leader",
			"std" => "",
			"type" => "textarea");

$options[] = array( "name" => esc_html__('Featured Posts Ad Code','the-league'),
			"desc" => "If you are using Featured Posts #4, you can insert a 300x250 ad that will appear at the top of the right column. Enter your ad code (Eg. Google Adsense) for that area.",
			"id" => $shortname."_feat_ad",
			"std" => "",
			"type" => "textarea");

$options[] = array( "name" => esc_html__('Footer Leaderboard Ad Code','the-league'),
			"desc" => "Enter your ad code (Eg. Google Adsense) for the 970x90 ad area just above the footer. You can also place a 728x90 ad in this spot.",
			"id" => $shortname."_footer_leader",
			"std" => "",
			"type" => "textarea");

$options[] = array( "name" => esc_html__('Wallpaper Ad Image URL','the-league'),
			"desc" => "Enter the URL for your wallpaper ad image. Wallpaper ad code should be a minimum of 1280px wide. Please see the theme documentation for more on wallpaper ad specifications.",
			"id" => $shortname."_wall_ad",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => esc_html__('Wallpaper Ad Click-Through URL','the-league'),
			"desc" => "Enter the URL for your wallpaper ad click-through.",
			"id" => $shortname."_wall_url",
			"std" => "",
			"type" => "text");


/* Footer Settings */
$options[] = array( "name" => esc_html__('Footer Info','the-league'),
			"type" => "heading");

$options[] = array( "name" => esc_html__('Copyright Text','the-league'),
			"desc" => "Here you can enter any text you want (eg. copyright text)",
			"id" => $shortname."_copyright",
			"std" => "Copyright &copy; 2017 The League Theme. Theme by MVP Themes, powered by WordPress.",
			"type" => "textarea");


update_option('of_template',$options);
update_option('of_shortname',$shortname);

}
}
?>