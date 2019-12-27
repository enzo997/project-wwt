<?php
/* Template Name: Our Work Page */
$id = get_queried_object()->ID;
get_header();
$array  = array(
    'post_type' => 'our-work-post',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1
);
$lang_total_posts = new WP_Query($array);
$total_posts = $lang_total_posts->posts;

?>
<main class="our-work">
    <div class="our-work--banner-top wow fadeIn">
        <div class="our-work--top--backgroup-behind ">
            <img src="<?php echo DF_IMAGE."/backgound.png";?>" alt="backgound">
        </div>
        <div class="container">
            <h1 class="our-work--title-h3 f-s-32 f-w-700 f_F_bold wow fadeInUp"  data-wow-delay="0.1s"><?php echo get_field('banner_top')['title']?get_field('banner_top')['title']:"OUR WORK";?></h1>
            <div class="our-work--description f-s-20 f-w-500 f_F_medium wow fadeInUp" data-wow-delay="0.2s">
                <p><?php echo get_field('banner_top')['description']?get_field('banner_top')['description']:"";?></p>
            </div>
        </div>
    </div>
    <div class="our-work--body">
        <div class="container">
            <?php 
                $limit = 9;
                $paged =  get_query_var('paged')?get_query_var('paged'):1;
                $args = array(
                    'post_type' => 'our-work-post',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => $limit,
                    "paged"=>$paged,
                );
                $lang_posts = new WP_Query($args);
                $posts = $lang_posts->posts;
            ?>
            <div class="row">
                <?php
                    foreach($posts as $key=> $post){
                        ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow fadeInUp"  data-wow-delay="<?php echo ($key!==1)?($key/9)."s":"0.15s";?>">
                                <?php get_work_article($post);?>
                            </div>
                        <?php
                    };
                ?>
            </div>
            <div class="button--load-more f-s-14 f-w-500 f_F_medium wow fadeIn" data-wow-delay="<?php echo ($limit/$limit)."s"?>" data-page="2" data-limit="<?php echo $limit; ?>"<?php if (count($total_posts) <= 9) : echo ' style="display: none;"'; endif; ?>>Show More<i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</main>
<?php get_footer();