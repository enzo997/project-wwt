<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
    global $post;
?>

    <main id="" class="default--page">
        <section class="section sec-default-content" style="Padding-top: 100px;">
            <div class="container">
                <h1 class="sec-default-content--title title-h1 wow fadeInUp" data-wow-duration="2s"><?php echo get_the_title(); ?></h1>
                <div class="sec-default-content--cont wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">
                    <?php echo $post->post_content; ?>
                </div>
            </div>
        </section>
    </main><!-- #main -->
<?php
get_footer();
