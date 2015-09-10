<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
  <article>
    <header>
      <?php echo get_avatar( $comment->comment_author_email, 64 ); ?>
      <div class="comment-author vcard">
        <cite>
          <p><span class="author"><?php comment_author_link(); ?></span></p>
          <p><time class="time" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_date('H:i:sT') ?>"><?php comment_time() ?> on <?php comment_date('F jS, Y') ?></time></p>
        </cite>
      </div>
    </header>

    <div class="commenttext">
      <div class="reply">
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        <?php edit_comment_link(__('Edit'),' • ','') ?>
      </div>
      <?php comment_text() ?>
      <?php if ($comment->comment_approved == '0') : ?>
        <em><?php _e('Your comment is awaiting moderation.') ?></em>
      <?php endif; ?>
    </div>
  </article>
