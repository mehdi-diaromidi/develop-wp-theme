jQuery(document).ready(function ($) {
    //tech post change ajax
    $('#change-post-type').on('change', function () {
        let el = $(this);
        let option_find = el.find('option:selected');
        let option_value = option_find.val();
        // console.log(option_value);
        $.ajax({
            url: ajax.ajaxurl,
            type: 'post',
            datatype: 'json',
            data: {
                action: option_value,
                nonce: ajax._nonce
            },
            beforeSend: function () {
                $('#ajax-load-content').css('opacity', '.3');
                $('.tech-loading').show();
            },
            success: function (response) {
                if (response.success) {
                    // console.log(response.content);
                    if (response.content != null) {
                        $('#ajax-load-content').html(response.content);
                    } else {
                        $('#ajax-load-content').html('<div class="alert alert-info">مطلبی پیدا نشد!</div>');
                    }
                }
            },
            error: function (error) {

            },
            complete: function () {
                $('#ajax-load-content').css('opacity', '1');
                $('.tech-loading').hide();
            }
        })
    });
    //archive content filter ajax
    $('#archive-filter').on('submit', function (e) {
        e.preventDefault();
        let post_type = $('.post-type:checked').val();
        console.log(post_type);
        let page_name  =$('.page_name').val();
        let user_id = [];
        let post_term_id = [];
        let tech_term_id = [];
        $.each($(".user-id:checked"), function () {
            user_id.push($(this).val());
        });
        $.each($(".post-term-id:checked"), function () {
            post_term_id.push($(this).val());
        });
        $.each($(".tech-term-id:checked"), function () {
            tech_term_id.push($(this).val());
        });
        /* console.log(user_id);
         console.log(post_term_id);
         console.log(tech_term_id);*/
        $.ajax({
            url: ajax.ajaxurl,
            type: 'post',
            datatype: 'json',
            data: {
                action: 'dwt_filter_content',
                user_id: user_id,
                post_term_id: post_term_id,
                tech_term_id: tech_term_id,
                post_type:post_type,
                page_name : page_name,
                nonce: ajax._nonce
    },
        beforeSend: function () {
            $('#filter-content-results').css('opacity', '.3');
            $('.find-post-num-title').text('تعداد مطالب مرتبط با فیلتر شما :');
            $('#load-more-archive').hide();
        }
    ,
        success: function (response) {
            if (response.success) {
                // console.log(response.content);
                if (response.content != null) {
                    if(current_page >= response.max_page){
                        $('#load-more').hide();
                        /* return false;*/
                    }else {
                        $('#load-more').show();
                    }
                    $('#filter-content-results').html(response.content);
                    $('.find-post-num').text(response.total_post);
                    $('#filter-content').hide();
                    $('.filter_post_query').val(response.filter_post_query);
                    current_page = '1';

                } else {
                    $('#filter-content-results').html('<div class="alert alert-info">مطلبی پیدا نشد!</div>');
                    $('.find-post-num').text('0');

                }
            }
        }
    ,
        error: function (error) {
            if (error) {
                alert('خطایی در ارسال اطلاعات رخ داده است ! مجددا تلاش نمایید');
            }
        }
    ,
        complete: function () {
            $('#filter-content-results').css('opacity', '1');

            /*$('.tech-loading').hide();*/
        }
    })
    });

    //load more post With ajax
    let  current_page = 1;
    $('#load-more').on('click', function (e) {
        current_page++;
        // console.log(current_page);
        let post_type = $('.post-type:checked').val();
        let page_name  =$('.page_name').val();
        let user_id = [];
        let post_term_id = [];
        let tech_term_id = [];
        let filter_post_query = $('.filter_post_query').val();
        $.each($(".user-id:checked"), function () {
            user_id.push($(this).val());
        });
        $.each($(".post-term-id:checked"), function () {
            post_term_id.push($(this).val());
        });
        $.each($(".tech-term-id:checked"), function () {
            tech_term_id.push($(this).val());
        });
        $.ajax({
            url: ajax.ajaxurl,
            type: 'post',
            datatype: 'json',
            data: {
                action: 'dwt_filter_content',
                'paged':current_page,
                user_id: user_id,
                post_term_id: post_term_id,
                tech_term_id: tech_term_id,
                post_type:post_type,
                page_name : page_name,
                filter_post_query : filter_post_query,
                nonce: ajax._nonce
            },
            beforeSend: function () {
                $('#filter-content-results').css('opacity', '.3');
                $('.load-more-loading').show();
            }
            ,
            success: function (response) {
                if (response.success) {
                    // console.log(response.content);
                    if (response.content != null) {
                        if(current_page >= response.max_page){
                            $('#load-more').hide();
                           /* return false;*/
                        }
                        $('#filter-content-results').append(response.content);
                    } else {
                        $('#filter-content-results').html('<div class="alert alert-info">مطلبی پیدا نشد!</div>');
                    }
                }
            }
            ,
            error: function (error) {
                if (error) {
                    alert('خطایی در ارسال اطلاعات رخ داده است ! مجددا تلاش نمایید');
                }
            }
            ,
            complete: function () {
                $('#filter-content-results').css('opacity', '1');
                $('.load-more-loading').hide();
                /*$('.tech-loading').hide();*/
            }
        })
    });
    // load more fore tech archive and post archive
    $('#load-more-archive').on('click', function (e) {
        current_page++;
        // console.log(current_page);
        let page_slug = $(this).data('page-slug');
    /*    console.log(page_slug);*/
        $.ajax({
            url: ajax.ajaxurl,
            type: 'post',
            datatype: 'json',
            data: {
                action: 'dwt_more_content',
                'paged':current_page,
                page_slug : page_slug,
                nonce: ajax._nonce
            },
            beforeSend: function () {
                $('#filter-content-results').css('opacity', '.3');
                $('.load-more-loading').show();
            }
            ,
            success: function (response) {
                if (response.success) {
                    // console.log(response.content);
                    if (response.content != null) {
                        if(current_page >= response.max_page){
                            $('#load-more-archive').hide();
                            /* return false;*/
                        }
                        $('#filter-content-results').append(response.content);
                    } else {
                        $('#filter-content-results').html('<div class="alert alert-info">مطلبی پیدا نشد!</div>');
                    }
                }
            }
            ,
            error: function (error) {
                if (error) {
                    alert('خطایی در ارسال اطلاعات رخ داده است ! مجددا تلاش نمایید');
                }
            }
            ,
            complete: function () {
                $('#filter-content-results').css('opacity', '1');
                $('.load-more-loading').hide();
                /*$('.tech-loading').hide();*/
            }
        })
    });
    //contact us ajax
    $('#contact-form').on('submit', function (e) {
        e.preventDefault();
        let full_name  = $('[name = full_name]').val();
        let email  = $('[name = email]').val();
        let title  = $('[name = title]').val();
        let message  = $('[name = message]').val();
        let recaptcha = $('[name = g-recaptcha-response]').val();
        $.ajax({
            url: ajax.ajaxurl,
            type: 'post',
            datatype: 'json',
            data: {
                action: 'dwt_contact',
                full_name:full_name,
                email:email,
                title:title,
                message:message,
                recaptcha:recaptcha,
                nonce: ajax._nonce
            },
            beforeSend: function () {
                $('.load-more-loading').show();
            }
            ,
            success: function (response) {
                if (response.success) {
              /*      alert(response.message);*/
                    $.toast({
                        /*    heading: 'خطا',*/
                        text: response.message,
                        icon: 'success',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#5a5a5a',  // To change the background
                        textAlign: 'right',
                        bgColor: '#66BB6A',
                        hideAfter: 3000,
                    })
                    // console.log(response.content);
 /*                   if (response.content != null) {
                        if(current_page >= response.max_page){
                            $('#load-more').hide();
                            /!* return false;*!/
                        }else {
                            $('#load-more').show();
                        }
                        $('#filter-content-results').html(response.content);
                        $('.find-post-num').text(response.total_post);
                        $('#filter-content').hide();
                        $('.filter_post_query').val(response.filter_post_query);
                        current_page = '1';

                    } else {
                        $('#filter-content-results').html('<div class="alert alert-info">مطلبی پیدا نشد!</div>');
                        $('.find-post-num').text('0');

                    }*/
                }
            }
            ,
            error: function (error) {
                if (error) {
                    /*alert(error.responseJSON.message);*/
                    $.toast({
                    /*    heading: 'خطا',*/
                        text: error.responseJSON.message,
                        icon: 'error',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#5a5a5a',  // To change the background
                        textAlign: 'right',
                        bgColor: '#FF1356',
                        hideAfter: 3000,
                    })
                }
            }
            ,
            complete: function () {

                $('.load-more-loading').hide();
            }
        })
    });
})

