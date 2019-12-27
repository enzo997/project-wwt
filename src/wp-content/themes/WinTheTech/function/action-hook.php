<?php
//================== Get work article ==================//
function get_work_article($thisPost){
    $id = $thisPost->ID;
    $title = excerpt($thisPost->post_title, 4, '');
    $image = get_the_post_thumbnail_url($id)?get_the_post_thumbnail_url($id):DF_IMAGE. '/noimage.png';
    // $link = get_permalink($id);
    ?>
    <div class="our-work--content-group">
        <h4 class="our-work--title-h4 f-s-16 f-w-500 f_F_medium"><?php echo $title;?></h4>
        <div class="line-bottom-image"></div>
        <div class="our-work--cont-image">
            <a title="<?php echo $thisPost->post_title; ?>">
                <img src="<?php echo  $image ;?>" alt="image-post-work"/>
            </a>
        </div>
    </div>
    <?php
}
//================================================================
add_action( 'wp_ajax_loading_work', 'loading_work' );
add_action( 'wp_ajax_nopriv_loading_work', 'loading_work' );
function loading_work(){
    $data_page = $_POST['data_page'];
    $data_limit = $_POST['data_limit'];//common data
    $offset = ( $data_limit * $data_page ) - $data_limit;
    $args = array(
        'post_type'=> 'our-work-post',
        'orderby'    => 'date',
        'post_status' => 'publish',
        "posts_per_page" => $data_limit,
        'order'    => 'DESC',
        'offset'   => $offset,
    );
    $posts = get_posts($args);//Number of posts                 
    if($posts){
        foreach($posts as $key=>$post){     
            ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow fadeInUp"  data-wow-delay="<?php echo ($key!==1)?($key/9)."s":"0.15s";?>">
                    <?php get_work_article($post);?>
                </div>
            <?php
        }
    }
    $count_load = count($posts);
    $args['posts_per_page'] = -1;
    $total = count(get_posts($args));// post of Total at Current pages
    ?>
    <script>
        let input = jQuery('.button--load-more');
        input.attr('data-page', <?php echo ($data_page + 1); ?>);
        if(<?php echo ($count_load + $offset); ?> >= <?php echo $total; ?>)
            input.hide();
        else
            input.show();
    </script>
    <?php
    exit;
}
//action dinamic data for selecte option of contact form 7
// add_acction('option-dinamic-data','option_dinamic_data');
// function option_dinamic_data(){
//     $section_our_work = get_field('section_our_work');
//     foreach($section_our_work as $i=>$item):
//         $i++;
//         $content_group = $item['content_group'];
//         $title = $content_group['content_text']?$content_group['content_text']['title']:"";
        
//     endforeach;
//     var_dump($title);
// }