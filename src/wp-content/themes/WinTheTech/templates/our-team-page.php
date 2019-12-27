<?php
/* Template Name: Our Team Page */
$id = get_queried_object()->ID;
get_header();
?>
<main class="our-team">
    <div class="our-team--banner-top wow fadeIn">
        <div class="our-team--top--backgroup-behind ">
            <img src="<?php echo DF_IMAGE."/backgound.png";?>" alt="backgound">
        </div>
        <div class="container">
            <h1 class="our-team--title-h3 f-s-32 f-w-700 f_F_bold wow fadeInUp"  data-wow-delay="0.1s"><?php echo get_field('banner_top_team',$id)['title']?get_field('banner_top_team',$id)['title']:"OUR TEAM";?></h1>
            <div class="our-team--description f-s-20 f-w-500 f_F_medium wow fadeInUp" data-wow-delay="0.2s">
                <p><?php echo get_field('banner_top_team',$id )['description']?get_field('banner_top_team',$id )['description']:"";?></p>
            </div>
        </div>
    </div>
    <div class="our-team--body">
        <div class="container">
            <div class="row">
                <?php
                $body_team = get_field('body_team',$id);
                    foreach($body_team as $i=>$item):
                        $i++;
                        $group_team = $item['group_team'];
                        $Member = $group_team['member'];
                        $Avatar = $Member['avatar']?$Member['avatar']['url']:DF_IMAGE. "/noimage.png";
                        $name = $Member['name']?$Member['name']:"";
                        $position = $Member['position']?$Member['position']:"";
                        ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="our-team--content-group-member wow fadeInUp"  data-wow-delay="<?php echo ($i!==1)?($i/9)."s":"0.1";?>">
                                    <div class="our-team--cont-avatar">
                                        <img src="<?php echo $Avatar;?>" alt="image-avatar">
                                    </div>
                                    <div class="line-bottom-image-member"></div>
                                    <div class="our-team--name f-s-24 f-w-500 f_F_medium"><?php echo $name;?></div>
                                    <div class="our-team--position f-s-16 f_F_medium"><?php echo $position;?></div>
                                </div>
                            </div>
                        <?php
                    endforeach;
                ?>
            </div>
            
        </div>
    </div>
</main>
<?php get_footer();