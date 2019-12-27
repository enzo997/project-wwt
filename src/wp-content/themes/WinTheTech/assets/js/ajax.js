jQuery(document).ready(function($) {
    ///
    $('.button--load-more').click(load_more_ajax_work);
});
//
var blogLoading= false;
function load_more_ajax_work(){
    if(blogLoading == false){
        blogLoading = true;
        let input = jQuery('.button--load-more'),
        data_page = input.attr('data-page'),
        data_limit = input.attr('data-limit');
        $.ajax({
            type : "post",
            url : ajaxUrl,
            // url :ajax_var.url,
            data : {
                action: "loading_work",
                data_page: data_page,
                data_limit: data_limit
            },
            beforeSend: function(){
                // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
        },
        success: function(response) {
                //Làm gì đó khi dữ liệu đã được xử lý
                $('.our-work--body .row').append(response);

        },
        complete: function() {
            blogLoading = false;
        },
        error: function( jqXHR, textStatus, errorThrown ){
                //Làm gì đó khi có lỗi xảy ra
                console.log( 'The following error occured: ' + textStatus, errorThrown );
        }
        });
    }

}