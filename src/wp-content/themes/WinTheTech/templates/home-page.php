<?php
/* Template Name: Home page */
$id = get_queried_object()->ID;
get_header();
?>
<!-- Home page -->
<main class="home-page">
    <!-- section top -->
    <section class="home-page--top">
        <div class="home-page--top--backgroup-behind ">
            <img src="<?php echo DF_IMAGE."/backgound.png";?>" alt="backgound" />
        </div>
        <div class="container">
            <?php 
                $banner_top = get_field('banner_top',$id);
                $content_group_banner_top = $banner_top['content_group_banner_top'];
                $Description_slider = $content_group_banner_top['content_description'];
            ?>
            <div class="home-page--col-group">
                <div class="row">
                    <div class="col-lg-6 col-md-6-col-sm-12 col-12">
                        <div class="home-page--col-left">
                            <div class="home-page--col-image wow fadeInUp wow fadeInUp" data-wow-delay="0.4s">
                                <img src="<?php echo $content_group_banner_top['image_banner_top']?$content_group_banner_top['image_banner_top']['url']:DF_IMAGE. '/noimage.png';?>" alt="<?php echo  $content_group_banner_top['image_banner_top']?$content_group_banner_top['image_banner_top']['name']:"noimage";?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6-col-sm-12 col-12">
                        <div class="home-page--col-right">
                            <h1 class="home-page--title-h4 f-s-20 f-w-500 f_F_medium wow fadeInUp"><?php echo $banner_top['title']; ?></h1>
                            <?php
                            if($Description_slider):
                                $number_slide = count($Description_slider);?>
                                <div class="home-page--cont-slider-title-h1">
                                    <?php
                                        foreach($Description_slider as $i=>$item):
                                            $i++;
                                            $Description = $item['description'];
                                            if($Description):?>
                                                <p class="home-page--title-h1 f-s-44 f-w-900 f_F_heavy wow fadeInUp" data-wow-delay="0.2s"><?php echo $Description; ?></p>
                                            <?php endif;
                                        endforeach;
                                    ?>
                                </div><?php
                                $button = $banner_top['button_view_our_work'];
                                $title_button = excerpt(($button['title']?$button['title']:"View Our Work"),4,"");
                                $link_button = $button['url']?$button['url']:"#";
                                ?>
                                <div class="content-btn-view-slick-dot">
                                    <a href="<?php echo $link_button;?>" class="btn-view-our-work f-s-14 f-w-500 f_F_medium wow fadeInUp" data-wow-delay="0.5s"><?php echo $title_button;?><i class="fas fa-angle-right"></i></a>
                                    <?php if($number_slide !==1):?>
                                        <div class="content-btn-slick-dot wow fadeInUp" data-wow-delay="0.6s">
                                            <div class="slick-wrapper">
                                                <div class="slider-arrows">
                                                    <button class="pre"><i class="fas fa-angle-left"></i></button>
                                                    <button class="next"><i class="fas fa-angle-right"></i></button>
                                                </div>
                                                <div class="cont-dots">
                                                    <div class="slider-dots"></div><span>/</span>
                                                    <div class="c-dots"></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ;?>
                                </div>
                                <?php
                            endif; 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section our work -->
    <?php
        $section_our_work = get_field('section_our_work',$id);

    if($section_our_work):?>
        <section class="home-page--our-work wow fadeIn" data-wow-delay="0.7s">
            <div class="home-page--our-work_1--backgroup-behind">
                <img src="<?php echo DF_IMAGE."/circle-under.png";?>" alt="circle-under" />
            </div>
            <div class="home-page--our-work--backgroup-behind">
                <img src="<?php echo DF_IMAGE."/Circle-BG-Middle.png";?>" alt="Circle BG Middle" />
            </div>
            <div class="container">
                <?php
                    foreach($section_our_work as $i=>$item):
                        $i++;
                        $content_group = $item['content_group'];
                        $title = $content_group['content_text']?$content_group['content_text']['title']:"";
                        $Description =  $content_group['content_text']['description'];
                        $image = $content_group['image_description']?$content_group['image_description']['url']:DF. "/noimage.png";
                        if($i%2 == 0){
                            if($title):?>
                                <div class="home-page--our-work--col-content-chan">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6-col-sm-12 col-12">
                                            <div class="home-page--our-work--col-image wow fadeInUp" data-wow-delay = "0.5s">
                                                <div class="cont-image">
                                                    <img src="<?php echo $image;?>" alt="<?php echo $content_group['image_description']?$content_group['image_description']['name']:"noimage";?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6-col-sm-12 col-12">
                                            <div class="home-page--our-work--col-group">
                                                <div class="content">
                                                    <h4 class="home-page--our-work--title-h4 f-s-20 f-w-500 f_F_medium wow fadeInUp" data-wow-delay = "0.2s">Our Work</h4>
                                                    <h3 class="home-page--our-work--title-h3 f-s-50 f-w-700 f_F_bold wow fadeInUp"  data-wow-delay = "0.3s"><?php echo $title;?></h3>
                                                    <div class="home-page--our-work--description f-s-20 f-w-500 f_G_medium wow fadeInUp"  data-wow-delay = "0.4s"><p><?php echo $Description;?></p></div>
                                                    <?php 
                                                        $phone_Consulting = get_field('your_information','option')['phone_number']?get_field('your_information','option')['phone_number']['consulting_phone_number']:"NULL";
                                                    ?>
                                                    <div class="btn-get-free-consultant btn-get-free-consultant-<?php echo $i;?>  f-s-14 f-w-500 f_F_medium wow fadeInUp"   data-wow-delay = "0.5s">
                                                            Get Free Consultant<i class="fas fa-angle-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;
                        }else{
                            if($title):?>
                                <div class="home-page--our-work--col-content-le">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6-col-sm-12 col-12">
                                            <div class="home-page--our-work--col-image wow fadeInUp"  data-wow-delay = "0.5s">
                                                <div class="cont-image">
                                                    <img src="<?php echo $image;?>" alt="<?php echo $content_group['image_description']?$content_group['image_description']['name']:"noimage";?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6-col-sm-12 col-12">
                                            <div class="home-page--our-work--col-group">
                                                <div class="content">
                                                    <h4 class="home-page--our-work--title-h4  f-s-20 f-w-500 f_F_medium wow fadeInUp">Our Work</h4> 
                                                    <h3 class="home-page--our-work--title-h3 f-s-50 f-w-700 f_F_bold wow fadeInUp"  ><?php echo $title;?></h3>
                                                    <div class="home-page--our-work--description f-s-20 f-w-500 f_G_medium wow fadeInUp" ><p><?php echo $Description;?></p></div>
                                                    <?php 
                                                        $phone_Consulting = get_field('your_information','option')['phone_number']?get_field('your_information','option')['phone_number']['consulting_phone_number']:"NULL";
                                                    ?>
                                                    <div class="btn-get-free-consultant  btn-get-free-consultant-<?php echo $i;?>  f-s-14 f-w-500 f_F_medium wow fadeInUp"   data-wow-delay = "0.5s">
                                                            Get Free Consultant<i class="fas fa-angle-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;
                        }
                    endforeach;
                ?>
            </div>
        </section>
    <?php endif;?>
    <!-- section our packages -->
    <?php 
        $section_our_packages = get_field('section_our_packages',$id);
        $title =  $section_our_packages['title']? $section_our_packages['title']:"";
        $packages_group = $section_our_packages['packages_group'];
        $content_package = $packages_group['content_package'];
    if($content_package):?>
        <section class="home-page--our-packages">
            <div class="container">
                <h4 class="home-page--packages--title-h4  f-s-20 f-w-500 f_F_medium wow fadeInUp">Our Packages</h4> 
                <h3 class="home-page--our-packages--title-h3 f-s-50 f-w-700 f_F_medium wow fadeInUp" data-wow-delay = "0.4s"><?php echo $title;?></h3>
                <div class="home-page--our-packages--group-content">
                    <div class="row">
                        <?php
                            foreach($content_package as $i=> $item):
                                $i++;
                                $package = $item['package'];
                                    $Title = $package['title']?$package['title']:"";
                                    $Description = $package['description']?$package['description']:"";
                                    $number_of_template = $package['number_of_template']?$package['number_of_template']:"";
                                    $execution_time = $package['execution_time']?$package['execution_time']:"";
                                    $price = $package['price']?$package['price']:"";
                                    $link_view_demo = $package['view_demo']?$package['view_demo']:"#";
                                ?>
                                    <div class="col-lg-3 col-md-4 col-custom">
                                        <div class="home-page--content-box wow fadeInUp" data-wow-delay = "<?php echo ($i!==1)?($i/4).'s':"0.1s"; ?>">
                                            <div class="content-box-border">
                                                <h4 class="home-page--our-packages--title-h4 f-s-22 f-w-700 f_F_bold wow fadeIn"><?php echo $Title;?></h4>
                                                <div class="home-page--our-packages--description f-s-18 f-w-500 f_G_medium wow fadeIn">
                                                    <p><?php echo $Description;?></p>
                                                </div>
                                                <?php 
                                                if( $number_of_template):?>
                                                    <h5 class="home-page--our-packges--title-h5 f-s-12 f-w-500 f_G_medium wow fadeIn">TEMPLATES:</h5>
                                                    <div class="home-page--our-packages--amount f-s-16 f-w-800 f_F_heavy wow fadeIn"><?php echo $number_of_template;?></div>
                                                <?php endif;
                                                if($execution_time):?>
                                                    <h5 class="home-page--our-packges--title-h5 f-s-12 f-w-500 f_G_medium wow fadeIn">TIME:</h5>
                                                    <div class="home-page--our-packages--deadline f-s-16 f-w-800 f_F_heavy wow fadeIn"><?php echo $execution_time;?></div>
                                                <?php endif;
                                                if($price):?>
                                                <div class="home-page--our-packges--group-cont-price">
                                                    <h5 class="home-page--our-packges--title-h5 f-s-20 f-w-500 f_G_medium wow fadeIn">Price:</h5>
                                                    <div class="home-page--our-packages--price f-s-24 f-w-800 f_F_heavy wow fadeIn"><?php echo $price;?></div>
                                                </div>
                                                <?php endif;?>
                                                <a class="btn-view-Demo f-s-14 f-w-500 f_F_medium wow fadeIn" href="<?php echo $link_view_demo;?>" target="_blank">View Demo<i class="fas fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- section why choose us -->
    <?php
        $section_why_choose = get_field('why_choose_us',$id);
            $title_why_choose = $section_why_choose['title_section']?$section_why_choose['title_section']:"";
            $content_group_why_choose = $section_why_choose['content_group'];
    if($content_group_why_choose):?>
        <section class="home-page--why-choose-us">
            <div class="home-page--why-choose--backgroup-behind">
                <img src="<?php echo DF_IMAGE."/circle-sm.png";?>" alt="circle-sm">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                        <h4 class="home-page--our-work--title-h4  f-s-20 f-w-500 f_F_medium wow fadeInUp">Why Choose Us ?</h4>
                        <h3 class="home-page--why-choose-us--title-h3 f-s-50 f-w-700 f_F_bold wow fadeInUp" data-wow-delay = "0.1s" ><?php echo $title_why_choose;?></h3>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                        <div class="row">
                            <?php
                                foreach($content_group_why_choose as $i=>$item):
                                    $i++;
                                    $content = $item['content'];
                                    $image_icon = $content['icon']?$content['icon']['url']:DF_IMAGE. '/noimage.png';
                                    $title = $content['title']?$content['title']:"";
                                    $Description = $content['description']?$content['description']:"";
                                    if($content):?>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="home-page--why-choose-us--cont-box wow fadeInUp" data-wow-delay="<?php echo ($i!==1)?($i/4)."s":"0.2s";?>">
                                                <div class="content-group">
                                                    <div class="home-page--why-choose-us--cont-icon-img wow fadeIn">
                                                        <img src="<?php echo $image_icon;?>" alt="<?php echo $content['icon']?$content['icon']['name']:"noimage";?>">
                                                    </div>
                                                    <h4 class="home-page--why-choose-us--title-h4 f-s-24 f-w-700 f_F_Bold wow fadeIn" data-wow-delay="0.2s"><?php echo $title;?></h4>
                                                </div>
                                                <div class="home-page--why-choose-us--description f-s-20 f-w-500 f_G_medium wow fadeIn" data-wow-delay="0.4s">
                                                    <p><?php echo $Description;?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;
                                endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif;?>
    <!-- section contact form -->
    <section class="home-page--contact-form">
        <div class="container">
            <div class="row">
                <?php
                    $Description_contact = get_field('contact_us')?get_field('contact_us'):"Let's work together";
                ?>
                <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                    <div class="content-group">
                        <h4 class="home-page--contact-form-h4 f-s-20 f-w-500 f_F_medium wow fadeInUp">Contact Us</h4>
                        <h3 class="home-page--contact-form--title-h3 f-s-50 f-w-700 f_F_bold wow fadeInUp" data-wow-delay = "0.1s"><?php echo $Description_contact;?></h3>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-12 wow fadeIn" data-wow-delay = "0.2s">
                    <?php echo do_shortcode('[contact-form-7 id="5" title="WinWithTech Contact form"]');?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer();