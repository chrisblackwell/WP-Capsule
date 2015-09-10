<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if ( is_single() ) : ?>

    <h1 class="entry-title"><?php the_title(); ?></h1>

    <div class="entry-content">
      <?php the_content(); ?>
    </div>

  <?php else : ?>

    <?php the_post_thumbnail(); ?>

    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <div class="entry-content">
      <?php the_content('Read Article →'); ?>
    </div>

  <?php endif; ?>

  <footer>

    <ul>
      <li class="category"><i class="icon-folder-open"></i> <?php the_category(', '); ?></li>
      <li class="date"><i class="icon-calendar"></i> <?php the_time('M jS, Y'); ?></li>
      <?php the_tags('<li class="tags"><i class="icon-tags"></i> ', ', ', '</li>'); ?>
    </ul>

  </footer>

</article>

<?php if ( is_single() ) { comments_template(); } ?>
