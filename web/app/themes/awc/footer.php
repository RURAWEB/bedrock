<footer class="has-background-background-color mt-5 p-5">
  <div class="d-flex flex-row justify-content-between p-5">
    <div class="w-75">
      <?php
        wp_nav_menu( array( 'theme_location' => 'footer1' ) );
      ?>
    </div>

    <div class="w-25">
      <?php
        wp_nav_menu( array( 'theme_location' => 'footer2' ) );
      ?>
    </div>
  </div>
</footer>

<?php wp_footer() ;?>
</body>
</html>
