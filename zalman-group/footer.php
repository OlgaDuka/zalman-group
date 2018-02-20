<footer class="footer">
  <nav class="footer__menu menu">
    <?php wp_nav_menu(array(
      'theme_location' => 'footer_menu',
      'menu_class' => 'menu__third-list',
      'container' => ''
    )); ?>
  </nav>
  <section class="footer__social social">
    <?php if(!dynamic_sidebar('social_icons')): ?>
      <span style="color:#fff">Место для иконок соцсетей</span>
    <?php endif; ?>
  </section>
  <div class="footer__copyright">Copyright @ 2017 Zalman Group</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
