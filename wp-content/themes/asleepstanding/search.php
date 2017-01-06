<?php get_header(); ?>

  <main role="main">

    <section class="page-content">
      <div class="row">
        <h2><?php echo sprintf( __( '%s Search Results for ', 'juno' ), $wp_query->found_posts ); echo get_search_query(); ?></h2>
        <div class="search-results-wrap">
          <?php get_template_part('loop'); ?>
        </div>
      </div>
    </section>

  </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
