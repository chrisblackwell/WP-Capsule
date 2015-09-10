<?php get_header(); ?>

  <?php if ( have_posts() ) : ?>

    <h1 class="page-title">
      <?php printf( __( 'Search Results for: %s', 'chrisblackwell' ), '<span>' . get_search_query() . '</span>' ); ?>
    </h1>

    <?php while ( have_posts() ) : the_post(); ?>

      <div id="sortable" class="sort-view">
        <?php get_template_part( 'content', get_post_format() ); ?>
      </div>

  <?php endwhile; else : ?>

    <article id="post-0" class="page no-results not-found">

      <h1 class="entry-title"><?php _e( 'Nothing Found', 'wpcanvas' ); ?></h1>

      <div class="entry-content">

        <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'wpcanvas' ); ?></p>

        <?php get_search_form(); ?>

      </div>

    </article>

  <?php endif; ?>

<?php get_footer(); ?>
