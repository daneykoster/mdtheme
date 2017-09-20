<?php
/**
 * Pagination layout.
 *
 * @package mdtheme
 */

/**
 * Custom Pagination with numbers
 * Credits to http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/
 */

function mdtheme_pagination() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="row center"><ul class="pagination">' . "\n";

 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link(' <i class="material-icons">chevron_left</i> ') );

    else echo '<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>';

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' active ' : '';
 
        printf( '<li class="waves-effect%s"><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li class="waves-effect">…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' active ' : '';
        printf( '<li class="waves-effect%s" ><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li class="waves-effect">…</li>' . "\n";
 
        $class = $paged == $max ? ' active ' : '';
        printf( '<li class="waves-effect%s"><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link( ' <i class="material-icons">chevron_right</i> ' ) );

    else echo ' <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li> ' ;
 
    echo '</ul></div>' . "\n";
 
}
