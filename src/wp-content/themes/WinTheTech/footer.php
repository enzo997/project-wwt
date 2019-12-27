<!-- Footer -->
<footer class="footer" id="footer">
    <div class="container">
        <div class="content-footer-information wow fadeIn">
            <div class="footer--content-logo-footer">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_field('logo_header_and_footer','option')?get_field('logo_header_and_footer','option')['url']:DF_IMAGE. '/logo.png';?>" alt="<?php echo get_field('logo_header_and_footer','option')?get_field('logo_header_and_footer','option')['name']:"logo";?>" />
                </a>
            </div>
            <?php
                $address = get_field('your_information','option')['address'];
                $number_phone_at_footer = get_field('your_information','option')['phone_number']['phone_number_at_footer'];
                $email_at_footer = get_field('your_information','option')['email'];
                $icon_social_network = get_field('icon_social_network','option');
            if($address):?>
            <div class="footer--group-address">
                <h4 class="footer--title-h4 f-s-16 f-w-700 f_G_bold">ADDRESS</h4>
                <div class="footer--content-address f-s-16 f-w-500 f_G_medium"><?php echo $address;?></div>
            </div>
            <?php endif;
            if($number_phone_at_footer || $email_at_footer):?>
                <div class="footer--group-contact">
                    <h4 class="footer--title-h4 f-s-16 f-w-700 f_G_bold">CONTACT</h4>
                    <?php if($number_phone_at_footer):?>
                        <div class="footer--content-number-phone">
                            <a class="f-s-16 f-w-500 f_G_medium" href="tel:+<?php $delete = array(' ','(',')','+','-');
                                            echo str_replace($delete,'',$number_phone_at_footer);?>">
                                <?php echo $number_phone_at_footer; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if($email_at_footer):?>
                        <div class="footer--content-email">
                            <a class="f-s-16 f-w-500 f_G_medium" href="mailto:<?php echo $email_at_footer; ?>"><?php echo $email_at_footer; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif;
            if($icon_social_network):?>
                <div class="footer--group-follow-us">
                    <h4 class="footer--title-h4 f-s-16 f-w-700 f_G_bold">FOLLOW US</h4>
                    <ul class="footer--group-icon-social-network">
                        <?php
                            foreach($icon_social_network as $i=> $item):
                                $i++;
                                $icon_image = $item['content_group']['icon_image']?$item['content_group']['icon_image']['url']:DF_IMAGE. '/noimage.png';
                                $link_url = $item['content_group']['link_url']?$item['content_group']['link_url']:"Null";
                                ?>
                                    <li class="content-image ">
                                        <a class="f-s-16 f-w-500 f_G_medium " href="<?php echo $link_url;?>" target="_blank">
                                            <img src="<?php echo $icon_image;?>" alt="icon-social-network">
                                        </a>
                                    </li>
                                <?php
                            endforeach;
                        ?>
                    </ul>
                </div>
            <?php endif;?>
        </div>
        <div class="content-main-footer">
            <div class="footer--main-nav wow fadeIn">
                <?php 
                    wp_nav_menu( 
                        array( 
                            'theme_location' => 'main_menu', 
                            'menu_class' => 'col-left-nav-menu_footer f-s-16 f-w-500 f_F_medium'
                        ) 
                    );
                ?>
                <div class="col-right-copyright-footer f-s-16 f-w-500 f_F_medium">Copyright 2019 WinWithTech</div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</div>
</body>
</html>