<?php get_header(); ?>

  <h1 class="archive-title">
    <?php
        if ( is_day() ) :
            printf( __( 'Daily Archives: %s', 'wpcanvas' ), '<span>' . get_the_date() . '</span>' );
        elseif ( is_month() ) :
            printf( __( 'Monthly Archives: %s', 'wpcanvas' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'wpcanvas' ) ) . '</span>' );
        elseif ( is_year() ) :
            printf( __( 'Yearly Archives: %s', 'wpcanvas' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'wpcanvas' ) ) . '</span>' );
        else :
            _e( 'Archives', 'wpcanvas' );
        endif;
    ?>
  </h1>

  <div id="sortable" class="sort-view">

    <?php include(TEMPLATEPATH. '/inc/loop.php');?>

  </div>

<?php get_footer(); ?>
