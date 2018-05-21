<div class="byline-wrap">

    <?php // Get the author name; wrap it in a link.
    if ( get_the_author_meta( 'ID' ) ) {
        $byline = sprintf(
        /* translators: %s: post author */
        __( 'by %s', 'platetheme' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
    );
    // Finally, let's write all of this to the page.
    echo '<span class="posted-on">' . plate_time_link() . '</span>';
    } else {
    echo '<span class="posted-on">Posted on:' . plate_time_link() . '</span>';
    }
    ?>
</div>