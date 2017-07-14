'use strict';
/* global Modernizr */

(function($, undefined){

    function setEqualHeight(columns, pddingBottom = 0)
    {
        var tallestcolumn = 0;
        columns.each(
            function()
            {
                var currentHeight = $(this).height();
                if(currentHeight > tallestcolumn)
                {
                    tallestcolumn = currentHeight;
                }
            }
        );
        columns.height(tallestcolumn + pddingBottom);
    }
    $(document).ready(function() {

        if (Modernizr.mq('(min-width: 768px)')) {
            $('#three_blocks .three_blocks_item').height('auto');
            setEqualHeight($('#three_blocks .three_blocks_item'));

            setEqualHeight($('.equal_footer'));

            $('#banner article').height('auto');
            setEqualHeight($('#banner article a'));
            setEqualHeight($('.top_block_right article a'));

        } else {

            $('#banner article a').height('auto');
            $('.top_block_right .meta_categoty').css('position', 'relative');
            setEqualHeight($('#banner article a'));
            setEqualHeight($('.top_block_right article a'));
            $('.top_block_right .meta_categoty').css('position', 'absolute');

        }

    });
    $(window).resize(function(){
        if (Modernizr.mq('(min-width: 768px)')) {
            $('#three_blocks .three_blocks_item ').height('auto');
            setEqualHeight($('#three_blocks .three_blocks_item'));
            $('#three_blocks .three_blocks_item .tb_category').css('position', 'absolute');

            setEqualHeight($('.equal_footer'));

            $('#banner article a').height('auto');
            setEqualHeight($('#banner article a'));



        } else {


            $('#banner article a').height('auto');
            $('.top_block_right .meta_categoty').css('position', 'relative');
            setEqualHeight($('#banner article a'));
            setEqualHeight($('.top_block_right article a'));
            $('.top_block_right .meta_categoty').css('position', 'absolute');
        }
    });

    //infinity scroll
    if ($('body').hasClass('home') || $('body').hasClass('category') || $('body').hasClass('author') || $('body').hasClass('search')) {
        $(window).scroll(function () {
            if (typeof true_posts != 'undefined') {
                var doc_scrollTop = $(window).scrollTop();
                var height_window = $(window).height();
                var offset_main = $('.main_block_item_wrap').offset().top;
                var height_main = $('.main_block_item_wrap ').height();
                var height_art = $('.main_block_item_wrap .main_block_item').height();
                var data = {
                    'action': 'loadmore',
                    'query': true_posts,
                    'page': current_page
                };
                if (doc_scrollTop > offset_main + height_main - height_window - 2 * height_art && !$('body').hasClass('loading')) {
                    $.ajax({
                        url: ajaxurl,
                        data: data,
                        type: 'POST',
                        beforeSend: function beforeSend(xhr) {
                            $('body').addClass('loading');
                        },
                        success: function success(data) {
                            if (data != '' && data != 'no posts found' && data.search(/<div class="main_block_item/) != -1) {
                                $('#true_loadmore').before(data);

                                $('.main_block_item_wrap .main_block_item .mb_read_more').css('position', 'relative');
                                $('.main_block_item_wrap .main_block_item').height('auto');
                                setEqualHeight($('.main_block_item_wrap .main_block_item'));
                                $('.main_block_item_wrap .main_block_item .mb_read_more').css('position', 'absolute');

                                $('body').removeClass('loading');
                                current_page++;
                            } else {
                                console.log(data);
                            }
                        }
                    });
                }
            }
        });
    }

})(jQuery);
