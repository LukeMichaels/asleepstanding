<?php /* Template Name: Template-Updates */ get_header(); ?>

  <main role="main" class="updates">

    <section class="page-content">
      <div class="row">

        <div class="articles-wrap">
          <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array( 'post_type' => 'post', 'posts_per_page' => 10, 'paged' => $paged );
          $wp_query = new WP_Query($args);
          while ( have_posts() ) : the_post(); ?>
            <article class="article" id="post-<?php the_ID(); ?>">

              <?php if ( has_post_thumbnail() ) {
                $post_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
                <div class="image" style="background: url('<?php echo $post_image[0]; ?>') center center no-repeat; background-size: cover;"></div>
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
          <?php endwhile; ?>
        </div>

        <aside class="sidebar" role="complementary">

          <h3>Instagram Feed</h3>

          <?php
          // use this instagram access token generator http://instagram.pixelunion.net/
          $access_token="433046236.1677ed0.85a72f70619947359dda54b0da8cde06";
          $photo_count=5;

          $json_link="https://api.instagram.com/v1/users/self/media/recent/?";
          $json_link.="access_token={$access_token}&count={$photo_count}";

          $json = file_get_contents($json_link);
          $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

          foreach ($obj['data'] as $post) {
            $pic_text=$post['caption']['text'];
            $pic_link=$post['link'];
            $pic_like_count=$post['likes']['count'];
            $pic_comment_count=$post['comments']['count'];
            $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
            $pic_created_time=date("F j, Y", $post['caption']['created_time']);
            $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));
            echo "<div class='image'>";        
              echo "<a href='{$pic_link}' target='_blank'>";
                echo "<img class='img-responsive photo-thumb' src='{$pic_src}' alt='{$pic_text}'>";
              echo "</a>";
             //  echo "<p>";
                // echo "<p>";
                  // echo "<div style='color:#888;'>";
                    // echo "<a href='{$pic_link}' target='_blank'>{$pic_created_time}</a>";
                  // echo "</div>";
                // echo "</p>";
                //  echo "<p>{$pic_text}</p>";
              // echo "</p>";
            echo "</div>";
          }
          ?>

        </aside>

      </div><!-- .row -->
    </section>

  </main>

<?php get_footer(); ?>
