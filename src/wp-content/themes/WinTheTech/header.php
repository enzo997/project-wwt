<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <script>
    var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
    // console.log(ajaxUrl);
    </script>
</head>
<body <?php body_class(); ?> >
<div id="page">
    <header class="header-mobile" id="header-mobile">
        <div class="container">
            <div class="header-mobile--content-header">
                <div class="header-mobile--content-header-cont-logo"> 
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo get_field('logo_header_and_footer','option')?get_field('logo_header_and_footer','option')['url']:DF_IMAGE. '/logo.png';?>" alt="<?php echo get_field('logo_header_and_footer','option')?get_field('logo_header_and_footer','option')['name']:"logo";?>" />
                    </a>
                </div>
                <div class="header-mobile--content-header--cont-menu-bar">
                    <div class="btn-bar">
                        <div class="icon-menu"></div>
                        <div class="close-icon-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header class="header-desktop" id="header">
        <div class="container">
            <div class="header-desktop--content-header">
                <div class="header-desktop--content-header--col-left">
                    <div class="header-desktop--content-header--col-left--cont-logo ">  
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo get_field('logo_header_and_footer','option')?get_field('logo_header_and_footer','option')['url']:DF_IMAGE. '/logo.png';?>" alt="<?php echo get_field('logo_header_and_footer','option')?get_field('logo_header_and_footer','option')['name']:"logo";?>" />
                        </a>
                    </div>
                </div>
                <div class="header-desktop--content-header--col-right">
                    <div class="header-desktop--content-header--col-right--main-nav-menu">
                        <?php 
                            wp_nav_menu( 
                                array( 
                                    'theme_location' => 'main_menu', 
                                    'menu_class' => 'main-nav-menu  f-s-16 f-w-500 f_F_medium'
                                ) 
                            );
                        $phone_number_at_header = get_field('your_information','option')['phone_number']['phone_number_at_header'];
                        if($phone_number_at_header):?>
                        <a class="header-desktop--content-contact" href="tel:+<?php $delete = array(' ','(',')','+','-');echo str_replace($delete,'',$phone_number_at_header);?>">
                            <h5 class="contact-tilte f-s-12 f-w-700 f_F_bold">Contact:<span class="f-s-12 f-w-700 f_F_bold"><?php echo $phone_number_at_header; ?></span></h5>
                        </a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </header>


