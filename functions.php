<?php
/*------------------------------------
* Theme: Plate by studio.bio 
* File: Main functions file
* Author: Joshua Michaels
* URI: https://studio.bio/themes/plate
*------------------------------------
*
* We've moved all of the theme functions to this single
* file to keep things tidy. 
*
* Extra development and debugging functions can be found
* in plate.php. Uncomment the below require_once below.
*
*/

/* LOAD TEMPLATE DEVELOPMENT FUNCTIONS
(not required but helper stuff for debugging and development)
*/
// require_once( 'library/plate.php' );

/* CUSTOMIZE THE WORDPRESS ADMIN 
(also not required so comment it out if you don't need it)
*/
require_once( 'library/admin.php' );

/*
*-------------------------------------------------
* PLATE LUNCH
*
* Let's get everything on the plate and eat!
* 
*-------------------------------------------------
*/

// mmmmmmmmmmmmm dig in!
add_action( 'after_setup_theme', 'plate_lunch' );

function plate_lunch() {

    // editor stylee
    add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

    // let's get language support going, if you need it
    load_theme_textdomain( 'platetheme', get_template_directory() . '/library/translation' );

    // cleanup the <head>
    add_action( 'init', 'plate_head_cleanup' );

    // remove WP version from RSS
    add_filter( 'the_generator', 'plate_rss_version' );

    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'plate_remove_wp_widget_recent_comments_style', 1 );

    // clean up comment styles in the head
    add_action( 'wp_head', 'plate_remove_recent_comments_style', 1 );

    // clean up gallery output in wp
    add_filter( 'gallery_style', 'plate_gallery_style' );

    // enqueue the styles and scripts
    add_action( 'wp_enqueue_scripts', 'plate_scripts_and_styles', 999 );

    // support the theme stuffs
    plate_theme_support();

    // adding sidebars to Wordpress
    add_action( 'widgets_init', 'plate_register_sidebars' );

    // cleaning up <p> tags around images
    add_filter( 'the_content', 'plate_filter_ptags_on_images' );

    // clean up the default WP excerpt
    add_filter( 'excerpt_more', 'plate_excerpt_more' );

} /* end plate lunch */


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'plate-image-600', 600, 600, true );
add_image_size( 'plate-image-300', 300, 300, true );
add_image_size( 'plate-image-300', 150, 150, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'plate-image-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'plate-image-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'plate_custom_image_sizes' );

function plate_custom_image_sizes( $sizes ) {

    return array_merge( $sizes, array(

        'plate-image-600' => __('600px by 600px', 'platetheme'),
        'plate-image-300' => __('300px by 300px', 'platetheme'),
        'plate-image-150' => __('150px by 150px', 'platetheme'),

        ) 
    );
}

add_image_size( 'single-post-feat-img', 592, 9999 ); //592 pixels wide (and unlimited height)
add_image_size( 'blog-listing-feat-img', 455, 596, true ); //455 pixels wide, 596 pixels wide, crop mode
 
/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function plate_register_sidebars() {

	register_sidebar( array(

            'id' => 'sidebar1',
            'name' => __( 'Sidebar 1', 'platetheme' ),
            'description' => __( 'The first (primary) sidebar.', 'platetheme' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widgettitle">',
            'after_title' => '</h4>',

        )
    );

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar( array(

		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'platetheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'platetheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',

	   )
    );

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/*********************
COMMENTS
Blah blah blah.
*********************/

// Adding a custom gravatar. Customize this to add your own. Or delete it. It's totally up to you.
add_filter( 'avatar_defaults', 'new_default_avatar' );

function new_default_avatar ( $avatar_defaults ) {

    //Set the URL where the image file for your avatar is located
    $new_avatar_url = get_stylesheet_directory_uri() . '/library/images/custom-gravatar.jpg';

    // var_dump($new_avatar_url);

    //Set the text that will appear to the right of your avatar in Settings>>Discussion
    $avatar_defaults[$new_avatar_url] = 'Custom Avatar';

    return $avatar_defaults;
}

// Comment Layout
function plate_comments( $comment, $args, $depth ) {

   $GLOBALS['comment'] = $comment; ?>

    <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>

        <article class="cf">

            <header class="comment-author vcard">

                <?php
                /*
                  this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
                  echo get_avatar($comment,$size='32',$default='<path_to_url>' );
                */
                ?>

                <?php // custom gravatar call ?>

                <?php
                  // create variable
                  $bgauthemail = get_comment_author_email();
                ?>

                <img data-gravatar="//www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_theme_file_uri(); ?>/library/images/nothing.gif" />

                <?php // end custom gravatar call ?>

                <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'platetheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'platetheme' ),'  ','') ) ?>

                <time datetime="<?php echo comment_time('Y-m-j'); ?>">

                    <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'platetheme' )); ?> </a>

                </time>

            </header>

            <?php if ($comment->comment_approved == '0') : ?>

                <div class="alert alert-info">

                    <p><?php _e( 'Your comment is awaiting moderation.', 'platetheme' ) ?></p>

                </div>

            <?php endif; ?>

            <section class="comment_content cf">

                <?php comment_text() ?>

            </section>

            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

        </article>

    <?php // </li> is added by WordPress automatically ?>

<?php
} // don't remove this bracket!


/*
Use this to add Google or other web fonts.
*/

// add_action( 'wp_enqueue_scripts', 'plate_fonts' );

// function plate_fonts() {

//     wp_enqueue_style( 'plate-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,600,400italic,' );

// }


/****************************************
* SCHEMA *
http://www.longren.io/add-schema-org-markup-to-any-wordpress-theme/
****************************************/

function html_schema() {

    $schema = 'http://schema.org/';
 
    // Is single post
    if( is_single()) {
        $type = "Article";
    }

    // Is blog home, archive or category
    else if( is_home() || is_archive() || is_category() ) {
        $type = "Blog";
    }

    // Is static front page
    else if( is_front_page()) {
        $type = "Website";
    }

    // Is a general page
     else {
        $type = 'WebPage';
    }
 
    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}



/*********************************
WP_HEAD CLEANUP
The default wordpress head is a mess. 
Let's clean it up by removing all 
the junk we don't need.
**********************************/

function plate_head_cleanup() {

    // category feeds
    remove_action( 'wp_head', 'feed_links_extra', 3 );

    // post and comment feeds
    remove_action( 'wp_head', 'feed_links', 2 );

    // EditURI link
    remove_action( 'wp_head', 'rsd_link' );

    // windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );

    // previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

    // start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

    // links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

    // WP version
    remove_action( 'wp_head', 'wp_generator' );

    // remove WP version from css
    add_filter( 'style_loader_src', 'plate_remove_wp_ver_css_js', 9999 );

    // remove WP version from scripts
    add_filter( 'script_loader_src', 'plate_remove_wp_ver_css_js', 9999 );

} /* end plate head cleanup */


// remove WP version from RSS
function plate_rss_version() {

    return ''; // it's as if it is not even there

}

// remove WP version from scripts
function plate_remove_wp_ver_css_js( $src ) {

    if ( strpos( $src, 'ver=' ) )

        $src = remove_query_arg( 'ver', $src );

    return $src;
}

// remove injected CSS for recent comments widget
function plate_remove_wp_widget_recent_comments_style() {

    if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {

        remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
    }
}

// remove injected CSS from recent comments widget
function plate_remove_recent_comments_style() {

    global $wp_widget_factory;

    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {

        remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
    }
}

// remove injected CSS from gallery
function plate_gallery_style($css) {

    return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );

}


/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, comment reply and custom scripts
function plate_scripts_and_styles() {

    global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    if ( !is_admin() ) {

        // modernizr (3.6.0 2018-04-17)
        wp_enqueue_script( 'modernizr', get_theme_file_uri() . '/library/js/libs/modernizr-custom-min.js', array(), '3.6.0', false );

        // register main stylesheet
        wp_enqueue_style( 'plate-stylesheet', get_theme_file_uri() . '/library/css/style.css', array(), '', 'all' );

        // ie-only style sheet
        wp_enqueue_style( 'plate-ie-only', get_theme_file_uri() . '/library/css/ie.css', array(), '' );

        // comment reply script for threaded comments
        if ( is_singular() AND comments_open() AND ( get_option('thread_comments') == 1 )) { wp_enqueue_script( 'comment-reply' ); }

        // adding scripts file in the footer
        wp_enqueue_script( 'plate-js', get_theme_file_uri() . '/library/js/scripts.js', array( 'jquery' ), '', true );

        $wp_styles->add_data( 'plate-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

        // plate extra scripts. Uncomment to use. Or better yet, copy what you need to the main scripts folder or on the page(s) you need it
        // wp_enqueue_script( 'plate-extra-js', get_theme_file_uri() . '/library/js/extras/extra-scripts.js', array( 'jquery' ), '', true );

    }
}

/****************************************
* REMOVE WP EXTRAS & DEQUEUEING STUFFS *
****************************************/

/* 
* Remove emojis: because WordPress is serious business.
* But, if you want emojis, don't let me stop you from having a good time. 
* To enable emojis, comment these functions out or just delete them.
*/

add_action( 'init', 'disable_wp_emojicons' );

function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );

}

function disable_emojicons_tinymce( $plugins ) {

    if ( is_array( $plugins ) ) {

        return array_diff( $plugins, array( 'wpemoji' ) );

    } else {

        return array();

    }
}


/* 
* Dequeue jQuery Migrate
* I'm commenting this out by default. Why? Because Gravity Forms *requires* it
* for some form functions to work...***eye roll***. 
*/
// add_action( 'wp_default_scripts', 'plate_dequeue_jquery_migrate' );

// function plate_dequeue_jquery_migrate( $scripts ) {

//     if (! empty( $scripts->registered['jquery'] ) ) {

//         $jquery_dependencies = $scripts->registered['jquery']->deps;

//         $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );

//     }

// }

// Remove wp-embed.min.js from the front end. Commented out by default as you may need it.
// See here: https://wordpress.stackexchange.com/questions/211701/what-does-wp-embed-min-js-do-in-wordpress-4-4
// add_action( 'init', function() {
  
//       // Remove the REST API endpoint.
//       remove_action('rest_api_init', 'wp_oembed_register_route');
  
//       // Turn off oEmbed auto discovery.
//       // Don't filter oEmbed results.
//       remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
  
//       // Remove oEmbed discovery links.
//       remove_action('wp_head', 'wp_oembed_add_discovery_links');
  
//       // Remove oEmbed-specific JavaScript from the front-end and back-end.
//       remove_action('wp_head', 'wp_oembed_add_host_js');
//   }, PHP_INT_MAX - 1 );


// Remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
// This only works for the main content box, not using ACF or other page builders.
// Added small bit of javascript in scripts.js that will work everywhere. 
add_filter('the_content', 'plate_filter_ptags_on_images');

function plate_filter_ptags_on_images( $content ) {

    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);

}


// This removes the annoying […] to a Read More link
function plate_excerpt_more( $more ) {

    global $post;

     // edit here if you like
    //return '...  <p><a class="excerpt-read-more" href="'. get_permalink( $post->ID ) . '" title="'. __( 'Read ', 'platetheme' ) . esc_attr( get_the_title( $post->ID ) ).'">'. __( 'Continue Reading &#8250;', 'platetheme' ) .'</a></p>';

}

/**
 * ADDED BY THE LOVELY GEEK	
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


// ADDED BY THE LOVELY GEEK	- adds read more to manual and automatic excerpts
function custom_excerpt($text) {  // custom 'read more' link
   if (strpos($text, '[...]')) {
      $excerpt = strip_tags(str_replace('[...]', '&nbsp;<p><a href="'.get_permalink().'">Continue Reading &#8250;</a></p>', $text), "<a>");
   } else {
      $excerpt = '' . strip_tags($text) . '&nbsp;<p><a href="'.get_permalink().'">Continue Reading &#8250;</a></p>';
   }
   return $excerpt;
}
add_filter('the_excerpt', 'custom_excerpt');


/*********************
THEME SUPPORT
*********************/

// support all of the theme things
function plate_theme_support() {

    // wp thumbnails (see sizes above)
    add_theme_support( 'post-thumbnails' );

    // default thumb size
    set_post_thumbnail_size(125, 125, true);

    // wp custom background (thx to @bransonwerner for update)
    add_theme_support( 'custom-background', array(

        'default-image' => '',    // background image default
        'default-color' => '',    // background color default (dont add the #)
        'wp-head-callback' => '_custom_background_cb',
        'admin-head-callback' => '',
        'admin-preview-callback' => '',

        )
    );

    // Custom Header Image
    add_theme_support( 'custom-header', array(

        'default-image'          => get_template_directory_uri() . '/library/images/header-image.png',
        'default-text-color'     => 'ffffff',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => 'plate_style_header',

        ) 
    );

    // Custom Logo
    add_theme_support( 'custom-logo', array(

        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),

        ) 
    );

    // rss thingy
    add_theme_support( 'automatic-feed-links' );

    // To add another menu, uncomment the second line and change it to whatever you want. You can have even more menus.
    register_nav_menus( array(

          'main-nav' => __( 'The Main Menu', 'platetheme' ),   // main nav in header
          // 'footer-links' => __( 'Footer Links', 'platetheme' ) // secondary nav in footer. Uncomment to use or edit.

        )
    );

    // Title tag. Note: this still isn't working with Yoast SEO
    add_theme_support( 'title-tag' );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Enable support for HTML5 markup.
    add_theme_support( 'html5', array(

        'comment-list', 
        'comment-form', 
        'search-form', 
        'gallery', 
        'caption'

        ) 
    );

    /* 
    * POST FORMATS
    * Ahhhh yes, the wild and wonderful world of Post Formats. 
    * I've never really gotten into them but I could see some
    * situations where they would come in handy. Here's a few
    * examples: https://www.competethemes.com/blog/wordpress-post-format-examples/
    * 
    * This theme doesn't use post formats per se but we need this 
    * to pass the theme check.
    * 
    * We may add better support for post formats in the future.
    * 
    * If you want to use them in your project, do so by all means. 
    * We won't judge you. Ok, maybe a little bit.
    *
    */

    add_theme_support( 'post-formats', array(

        'aside',             // title less blurb
        'gallery',           // gallery of images
        'link',              // quick link to other site
        'image',             // an image
        'quote',             // a quick quote
        'status',            // a Facebook like status update
        'video',             // video
        'audio',             // audio
        'chat'               // chat transcript

        )
    );

    // Gutenberg support: https://www.billerickson.net/getting-your-theme-ready-for-gutenberg/
    // https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
    // .alignwide styles added to _768up
    add_theme_support( 'align-wide' );

    add_theme_support( 'editor-color-palette',
        // Change to your colors
        '#0056ac',
        '#99bbde',
        '#004181',
        '#001c3a',
        'f23e2f',
        'dedede',
        'aaaaaa',
        '222222'
    );

    // To limit the Gutenberg editor to your theme colors, uncomment this
    // add_theme_support( 'disable-custom-colors' );

} /* end plate theme support */


/* 
* WooCommerce Support
*
* This function only removes the warning in the WP admin when 
* WooCommerce is installed. To fully support WooCommerce you 
* will need to add some stuff to your product loops.
* 
* See here: https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
*
*/

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

    add_action( 'after_setup_theme', 'woocommerce_support' );

    function woocommerce_support() {

        add_theme_support( 'woocommerce' );

    }

}


/****************************************
* CUSTOMIZER *
****************************************/

// Needs updating as of WP 4.9.X

add_action( 'customize_register', 'plate_register_theme_customizer' );

function plate_register_theme_customizer( $wp_customize ) {

    // Uncomment this to see what's going on if you make a lot of changes
    // echo '<pre>';
    // var_dump( $wp_customize );  
    // echo '</pre>';

    // Customize title and tagline sections and labels
    $wp_customize->get_section( 'title_tagline' )->title = __( 'Site Name and Description', 'platetheme' );  
    $wp_customize->get_control( 'blogname' )->label = __( 'Site Name', 'platetheme' );  
    $wp_customize->get_control( 'blogdescription' )->label = __( 'Site Description', 'platetheme' );  
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    // Customize the Front Page Settings
    $wp_customize->get_section( 'static_front_page' )->title = __( 'Homepage Preferences', 'platetheme' );
    $wp_customize->get_section( 'static_front_page' )->priority = 20;
    $wp_customize->get_control( 'show_on_front' )->label = __( 'Choose Homepage Preference:', 'platetheme' );  
    $wp_customize->get_control( 'page_on_front' )->label = __( 'Select Homepage:', 'platetheme' );  
    $wp_customize->get_control( 'page_for_posts' )->label = __( 'Select Blog Homepage:', 'platetheme' );  

    // Customize Background Settings
    $wp_customize->get_section( 'background_image' )->title = __( 'Background Styles', 'platetheme' );  
    $wp_customize->get_control( 'background_color' )->section = 'background_image'; 

    // Customize Header Image Settings  
    $wp_customize->add_section( 'header_text_styles' , array(

        'title'      => __( 'Header Text Styles', 'platetheme' ), 
        'priority'   => 30

        ) 
    );

    $wp_customize->get_control( 'display_header_text' )->section = 'header_text_styles';  
    $wp_customize->get_control( 'header_textcolor' )->section = 'header_text_styles'; 
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage'; 

}


// Custom scripts + styles for theme customizer
add_action( 'customize_preview_init', 'plate_customizer_scripts' );

function plate_customizer_scripts() {

    wp_enqueue_script( 'plate_theme_customizer', get_template_directory_uri() . '/library/js/theme-customizer.js', array( 'jquery', 'customize-preview' ), '', true);

    // register customizer stylesheet
    wp_register_style( 'plate-customizer', get_theme_file_uri() . '/library/css/customizer.css', array(), '', 'all' );
    wp_enqueue_style( 'plate-customizer' );

}


// Callback function for updating header styles
function plate_style_header() {

    $text_color = get_header_textcolor();
  
    ?>
  
    <style type="text/css">

        header.header .site-title a {
          color: #<?php echo esc_attr( $text_color ); ?>;
        }
      
        <?php if( display_header_text() != true ): ?>
        .site-title, .site-description {
          display: none;
        } 
        <?php endif; ?>

        #banner .header-image {
          max-width: 100%;
          height: auto;
        }

        .customize-control-description {
          font-style: normal;
        }

    </style>

  <?php 

}

/*********************
RELATED POSTS FUNCTION
*********************/

/**
 * Plate Related Posts.
 * 
 * Adapted from this gist:
 * https://gist.github.com/claudiosanches/3167825
 * 
 * Replaced old related posts function from Bones.
 * Added: 2018-05-03
 *
 * Usage:
 * To show related by categories:
 * Add in single.php <?php plate_related_posts(); ?>.
 * To show related by tags:
 * Add in single.php <?php plate_related_posts('tag'); ?>.
 *
 * @global array $post
 *   WP global post.
 * @param string $display
 *   Set category or tag.
 * @param int $qty
 *   Number of posts to be displayed.
 * @param bool $images
 *   Enable or disable displaying images.
 * @param string $title
 *   Set the widget title.
 */

function plate_related_posts($display = 'category', $qty = 5, $images = true, $title = 'Keep Reading:') {
    global $post;
    $show = false;
    $post_qty = (int) $qty;
    switch ($display) :
        case 'tag':
            $tags = wp_get_post_tags($post->ID);
            if ($tags) {
                $show = true;
                $tag_ids = array();
                foreach ($tags as $individual_tag) {
                    $tag_ids[] = $individual_tag->term_id;
                }
                $args = array(
                    'tag__in' => $tag_ids,
                    'post__not_in' => array($post->ID),
                    'posts_per_page' => $post_qty,
                    'ignore_sticky_posts' => 1
                );
            }
            break;
        default :
            $categories = get_the_category($post->ID);
            if ($categories) {
                $show = true;
                $category_ids = array();
                foreach ($categories as $individual_category) {
                    $category_ids[] = $individual_category->term_id;
                }
                $args = array(
                    'category__in' => $category_ids,
                    'post__not_in' => array($post->ID),
                    'showposts' => $post_qty,
                    'ignore_sticky_posts' => 1
                );
            }
    endswitch;
    if ($show == true) {
        $related = new wp_query($args);
        if ($related->have_posts()) {
            $layout = '<div class="related-posts">';
            $layout .= '<h3>' . strip_tags($title) . '</h3>';
            $layout .= '<ul class="nostyle related-posts-list">';
            while ($related->have_posts()) {
                $related->the_post();
                $layout .= '<li class="related-post">';
                if ($images == true) {
                    $layout .= '<span class="related-thumb">';
                    $layout .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_post_thumbnail() . '</a>';
                    $layout .= '</span>';
                }
                $layout .= '<span class="related-title">';
                $layout .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a>';
                $layout .= '</span>';
                $layout .= '</li>';
            }
            $layout .= '</ul>';
            $layout .= '</div>';
            echo $layout;
        }
        wp_reset_query();
    }
}


/*********************
PAGE NAVI
*********************/

/* 
* Numeric Page Navi (built into the theme by default).
* (Updated 2018-05-17)
* 
* If you're using this with a custom WP_Query, make sure 
* to add your query variable as an argument and this 
* function will play nice. Example:
* 
* plate_page_navi( $query );
•
• Also make sure your query has pagination set, e.g.:
* $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
* (or something similar)
• See the codex: https://codex.wordpress.org/Pagination

*/

function plate_page_navi( $query_wp ) {
    $pages = $query_wp->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($pages > 1) {
        $page_current = max(1, get_query_var('paged'));

        echo '<nav class="pagination">';

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current'       => $page_current,
            'total'         => $pages,
            'prev_text'     => '&larr;',
            'next_text'     => '&rarr;',
            'type'          => 'list',
            'end_size'      => 3,
            'mid_size'      => 3
        ));

        echo '</nav>';
    }
}


/*
****************************************
*        PLATE SPECIAL FUNCTIONS       *
****************************************
*/

// Body Class functions
// Adds more slugs to body class so we can style individual pages + posts.
add_filter( 'body_class', 'plate_body_class' );

function plate_body_class( $classes ) {

    global $post;

    if ( isset( $post ) ) {

        /* $classes[] = $post->post_type . '-' . $post->post_name; *//*Un comment this if you want the post_type-post_name body class */
        $pagetemplate = get_post_meta( $post->ID, '_wp_page_template', true);
        $classes[] = sanitize_html_class( str_replace( '.', '-', $pagetemplate ), '' );
        $classes[] = $post->post_name;

    }

    if (is_page()) {

        global $post;

        if ( $post->post_parent ) {

            // Parent post name/slug
            $parent = get_post( $post->post_parent );
            $classes[] = $parent->post_name;

            // Parent template name
            $parent_template = get_post_meta( $parent->ID, '_wp_page_template', true );
            
            if ( !empty($parent_template) )
                $classes[] = 'template-'.sanitize_html_class( str_replace( '.', '-', $parent_template ), '' );

        }
        
        // If we *do* have an ancestors list, process it
        // http://codex.wordpress.org/Function_Reference/get_post_ancestors
        if ($parents = get_post_ancestors( $post->ID )) {

            foreach ( (array)$parents as $parent ) {

                // As the array contains IDs only, we need to get each page
                if ( $page = get_page($parent) ) {
                    // Add the current ancestor to the body class array
                    $classes[] = "{$page->post_type}-{$page->post_name}";
                }

            }

        }
 
        // Add the current page to our body class array
        $classes[] = "{$post->post_type}-{$post->post_name}";

    }

    return $classes;

}


/* 
* QUICKTAGS
*
* Let's add some extra Quicktags for clients who aren't HTML masters
* They are pretty handy for HTML masters too.
*
* Hook into the 'admin_print_footer_scripts' action
*
*/
add_action( 'admin_print_footer_scripts', 'plate_custom_quicktags' );

function plate_custom_quicktags() {

    if ( wp_script_is( 'quicktags' ) ) { ?>

        <script type="text/javascript">

            QTags.addButton( 'qt-p', 'p', '<p>', '</p>', '', '', 1 );
            QTags.addButton( 'qt-br', 'br', '<br>', '', '', '', 9 );
            QTags.addButton( 'qt-span', 'span', '<span>', '</span>', '', '', 11 );
            QTags.addButton( 'qt-h2', 'h2', '<h2>', '</h2>', '', '', 12 );
            QTags.addButton( 'qt-h3', 'h3', '<h3>', '</h3>', '', '', 13 );
            QTags.addButton( 'qt-h4', 'h4', '<h4>', '</h4>', '', '', 14 );
            QTags.addButton( 'qt-h5', 'h5', '<h5>', '</h5>', '', '', 15 );

        </script>

<?php }

}

// Load dashicons on the front end
// To use, go here and copy the css/html for the dashicon you want: https://developer.wordpress.org/resource/dashicons/
// Example: <span class="dashicons dashicons-wordpress"></span>

// add_action( 'wp_enqueue_scripts', 'template_load_dashicons' );

// function template_load_dashicons() {

//     wp_enqueue_style( 'dashicons' );

// }

  
// Post Author function (from WP Twenty Seventeen theme)
// We use this in the byline template part but included here in case you want to use it elsewhere.
if ( ! function_exists( 'plate_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function plate_posted_on() {

    // Get the author name; wrap it in a link.
    $byline = sprintf(

    /* translators: %s: post author */
    __( 'by %s', 'platetheme' ),
    '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'

    );

    // Finally, let's write all of this to the page.
    echo '<span class="posted-on">' . plate_time_link() . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;


// Post Time function (from WP Twenty Seventeen theme)
if ( ! function_exists( 'plate_time_link' ) ) :
/**
 * Gets a nicely formatted string for the published date.
 */
function plate_time_link() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    // if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    //   $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    // }

    $time_string = sprintf( $time_string,
        get_the_date( DATE_W3C ),
        get_the_date(),
        get_the_modified_date( DATE_W3C ),
        get_the_modified_date()
    );

    // Wrap the time string in a link, and preface it with 'Posted on'.
    return sprintf(

        /* translators: %s: post date */
        __( '<span class="screen-reader-text">Posted on</span> %s', 'platetheme' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'

    );
}
endif;


// Live Reload for Grunt during development
//If your site is running locally it will load the livereload js file into the footer. This makes it possible for the browser to reload after a change has been made. 
if ( in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1')) ) {

    function livereload_script() {

    	wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
    	wp_enqueue_script('livereload');

    }
  
    add_action( 'wp_enqueue_scripts', 'livereload_script' );

}

?>