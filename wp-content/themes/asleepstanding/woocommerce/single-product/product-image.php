<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
?>

<div class="images">

  <?php $main_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hero' ); ?>
  <div class="image-main preview">
    <img id="preview" src="<?php echo $main_image[0]; ?>">
  </div>

  <div class="image-thumbnails thumbails">
    <?php
      $img_id = 0;
      global $product;
      $attachment_ids = $product->get_gallery_attachment_ids();
      foreach( $attachment_ids as $attachment_id ) { ?>
        <img onmouseover="getElementById('preview').src=getElementById('img-<?php echo $img_id ?>').src" id="img-<?php echo $img_id ?>" src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ) ?>" alt="" />
        <?php
        $img_id++;
      }
    ?>
  </div><!-- .image-thumbnails -->

</div><!-- .images -->
