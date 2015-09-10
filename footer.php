    </div><!-- close wrap -->
  </section>

  <footer class="bottom wrap">

    <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>

  </footer>

  <?php wp_footer(); ?>
  <!-- Google Analytics -->
  <script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='https://www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','<?php echo sanitize_text_field(GOOGLE_ANALYTICS); ?>','auto');ga('send','pageview');
  </script>
</body>
</html>
