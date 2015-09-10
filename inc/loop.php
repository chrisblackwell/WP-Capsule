<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php get_template_part( 'content', get_post_format() ); ?>

<?php endwhile; else : ?>

  <h2>There are no posts available</h2>

  <?php get_search_form(); ?>

<?php endif; ?>
