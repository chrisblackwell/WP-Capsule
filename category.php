<?php get_header(); ?>

  <h1 class="archive-title">Posts in <?php single_cat_title(); ?></h1>

  <div id="sortable" class="sort-view">

    <?php include(TEMPLATEPATH. '/inc/loop.php'); ?>

  </div>

<?php get_footer(); ?>
