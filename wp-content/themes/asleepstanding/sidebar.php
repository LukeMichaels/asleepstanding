<aside class="sidebar" role="complementary">

  <div class="content-wrap">
    <?php 
    $current = $post->ID;
    $parent = $post->post_parent;
    $grandparent_get = get_post($parent);
    $grandparent = $grandparent_get->post_parent; ?>
    <div class="main-category-button">
      <a href="<?php echo get_permalink( $post->post_parent ); ?>">
        <?php if ($root_parent = get_the_title($grandparent) !== $root_parent = get_the_title($current)) {echo get_the_title($grandparent); }else {echo get_the_title($parent); }?>
      </a>
    </div>
    <?php echo do_shortcode('[wpb_childpages]'); ?>
  </div>

</aside>
