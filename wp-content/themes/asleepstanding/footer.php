        </div><!-- .page-wrap -->

        <footer class="footer" role="contentinfo">
          <div class="row">
            <nav class="footer-nav">
              <?php wp_nav_menu( array('theme_location' => 'footer_nav', 'container' => '') ); ?>
            </nav>
            <div class="copyright">
              &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
            </div>
          </div>
        </footer>

      </div><!-- #canvas -->
    </div><!-- .wrapper -->

    <?php wp_footer(); ?>

    <?php /* :::::::::: analytics :::::::::: */ ?>
    <!--
    <script>
      (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
      (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
      l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
      ga('send', 'pageview');
    </script>
    -->

  </body>
</html>
