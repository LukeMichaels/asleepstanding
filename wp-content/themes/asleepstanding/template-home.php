<?php /* Template Name: Template-Home */ get_header(); ?>

  <main role="main" class="home-updates">

    <section class="page-content">
      <div class="row">

        <div class="articles-wrap">
          <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array( 'post_type' => 'post', 'posts_per_page' => 10, 'paged' => $paged );
          $wp_query = new WP_Query($args);
          while ( have_posts() ) : the_post(); ?>
          <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" alt="read <?php the_title(); ?>">
            <article class="article" id="post-<?php the_ID(); ?>">

              <?php if ( has_post_thumbnail() ) {
                $post_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
                <div class="image"> 
                  <img src="<?php echo $post_image[0]; ?>">
                </div>
              <?php } ?>

              <div class="content">
                <div class="title">
                  <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" alt="read <?php the_title(); ?>"><?php the_title(); ?></a>
                </div>
                <div class="excerpt">
                  <?php the_excerpt() ?>
                </div>
              </div>

            </article>
          </a>
          <?php endwhile; ?>
        </div>

      </div><!-- .row -->
    </section>

  </main>

<?php get_footer(); ?>
