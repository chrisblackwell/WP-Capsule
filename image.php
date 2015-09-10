<?php get_header(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>

    <h1 class="entry-title"><?php the_title(); ?></h1>

    <div class="entry-content">
      <a href="<?php echo wp_get_attachment_url($post->ID); ?>">
        <?php echo wp_get_attachment_image( $post->ID, array( 730, 730 ) ); ?>
      </a>
    </div>

    <footer class="entry-meta">
      <?php
        $metadata = wp_get_attachment_metadata();
        printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>.', 'wpcanvas' ),
          esc_attr( get_the_date( 'c' ) ),
          esc_html( get_the_date() ),
          esc_url( wp_get_attachment_url() ),
          $metadata['width'],
          $metadata['height'],
          esc_url( get_permalink( $post->post_parent ) ),
          esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
          get_the_title( $post->post_parent )
        );
      ?>
    </footer>

  </article>

<?php get_header(); ?>
