$=jQuery;$(function(){$(document).ready(function(){let top_desktop=$('#header').offset().top;let top_mobile=$('#header').offset().top;if(top_desktop>100)
$('.header-desktop').addClass('change-color');else
$('.header-desktop').removeClass('change-color');if(top_mobile>50)
$('.header-mobile').addClass('change-color');else
$('.header-mobile').removeClass('change-color');$(window).scroll(function(event){let top=$('html,body').scrollTop();if(top>100)
$('.header-desktop').addClass('change-color');else
$('.header-desktop').removeClass('change-color');});$(window).scroll(function(event){let top=$('html,body').scrollTop();if(top>50)
$('.header-mobile').addClass('change-color');else
$('.header-mobile').removeClass('change-color');});});$('.header-mobile .btn-bar').click(function(){$(this).toggleClass('active-menu-show'),$('.header-desktop').toggleClass('menu-nav-show'),$('body').toggleClass('no-Scroll');});$('.home-page--cont-slider-title-h1').slick({slidesToShow:1,slidesToScroll:1,arrows:true,dots:true,prevArrow:$('.home-page--col-group button.pre'),nextArrow:$('.home-page--col-group button.next'),appendDots:$('.home-page--col-group .slider-dots'),infinite:false});$('.home-page--our-packages--group-content .row').slick({dots:true,arrows:false,autoplay:false,speed:1300,infinite:true,slidesToShow:4,slidesToScroll:1,responsive:[{breakpoint:992,settings:{slidesToShow:3,slidesToScroll:1,}},{breakpoint:768,settings:{slidesToShow:2,slidesToScroll:1,}},{breakpoint:426,settings:{slidesToShow:1,slidesToScroll:1,}}]});$('select').each(function(){var $this=jQuery(this);numberOfOptions=jQuery(this).children('option').length;var val=$(this).val();$this.addClass('select-hidden');$this.wrap('<div class="select"></div>');$this.after('<div class="select-styled"></div>');var $styledSelect=$this.next('div.select-styled');var $list=jQuery('<ul />',{'class':'select-options'}).insertAfter($styledSelect);for(var i=0;i<numberOfOptions;i++){var html=$this.children('option').eq(i).text();if(val==$this.children('option').eq(i).val()){$styledSelect.text($this.children('option').eq(i).text());}
jQuery('<li />',{html:html,rel:$this.children('option').eq(i).val(),class:(val==$this.children('option').eq(i).val())?'active':'',}).appendTo($list);}
var $listItems=$list.children('li');$styledSelect.click(function(e){e.stopPropagation();jQuery('div.select-styled.active').not(this).each(function(){jQuery(this).removeClass('active').next('ul.select-options').hide();});jQuery(this).toggleClass('active').next('ul.select-options').toggle();});$listItems.click(function(e){e.stopPropagation();$styledSelect.text($(this).text()).removeClass('active');if((val!=$(this).attr('rel')||$(this).attr('rel')=='')&&!$(this).hasClass('active')){$list.children('li').removeClass('active');$(this).addClass('active');$this.val($(this).attr('rel'));$this.trigger('change');}
$list.hide();});jQuery(document).click(function(){$styledSelect.removeClass('active');$list.hide();});});$('.select').on('change',function(){$(this).addClass('change-color');});custom_slick();});function custom_slick(){$('.slider-dots button').each(function(index,element){let number=$(element).text();let fixNumber='0'+number;$(element).text(fixNumber);});$('.slider-dots').each(function(index,element){let number=$(element).find('li:last-child button').text();let numberFix=' /'+number;$(element).find('.c-dots').text(numberFix);$(element).find('.button.next').addClass('clear-next');});$('.slider-dots').each(function(index,element){let number=$(element).find('li:first-child button').text();$(element).find('.button.pre').addClass('clear-pre');});};