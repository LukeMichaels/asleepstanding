<?php /* Template Name: Template-Portfolio */ get_header(); ?>

<main role="main" class="portfolio">

  <section class="page-content">
    <div class="row">

      <div class="articles-wrap">
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array( 'post_type' => 'portfolio', 'posts_per_page' => 10, 'paged' => $paged );
        $wp_query = new WP_Query($args);
        while ( have_posts() ) : the_post(); ?>
          <article class="article" id="post-<?php the_ID(); ?>">

            <?php if ( has_post_thumbnail() ) {
              $post_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
              <div class="image">
                <img src="<?php echo $post_image[0]; ?>">
              </div>
            <?php } ?>

            <div class="content">
              <div class="title">
                <?php the_title(); ?>
              </div>
              <div class="excerpt">
                <?php the_content() ?>
              </div>
            </div>

          </article>
        <?php endwhile; ?>
      </div>

      <aside class="sidebar" role="complementary">
        <h3>About</h3>
        <p><?php $page = get_page_by_title( 'portfolio' );
          $content = apply_filters('the_content', $page->post_content); 
          echo $content; ?></p>
      </aside>

    </div><!-- .row -->
  </section>

</main>

<?php get_footer(); ?>
