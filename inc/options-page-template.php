<div class="wrap">

  <form action="options.php" method="POST">

    <h2>Theme Settings and Options</h2>

    <?php
      settings_fields( 'wp_capsule_theme_page' );
      do_settings_sections( 'wp_capsule_theme_page' );
      submit_button();
    ?>

  </form>
</div>
