function hexc(colorval) {
    var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    delete(parts[0]);
    for (var i = 1; i <= 3; ++i) {
        parts[i] = parseInt(parts[i]).toString(16);
        if (parts[i].length == 1) parts[i] = '0' + parts[i];
    }
    color = '#' + parts.join('');
}
function formatNumber(number)
{
    var number = number + '';
    var x = number.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

$(document).ready(function(){
    $('.date-picker').datepicker();
    $('.time-picker').timepicker();
    var numFeatured = $('.list-product-featured ul li').length;
    $('.list-product-featured ul').owlCarousel({
        loop:(numFeatured > 4),
        nav:false,
        dots:false,
        autoplay:(numFeatured > 4),
        autoplayTimeout:3000,
        smartSpeed:1000,
        margin: 15,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:4
            },
            600:{
                items:4
            },
            1000:{
                items:4
            }
        },
    })
    $('.button-prev-featured').click(function() {
        $('.list-product-featured ul').trigger('prev');
    });
    $('.button-next-featured').click(function() {
        $('.list-product-featured ul').trigger('next');
    });
    
    
    var numBestSell = $('.list-product-bestSell ul li').length;
    $('.list-product-bestSell ul').owlCarousel({
        loop:(numBestSell > 4),
        nav:false,
        dots:false,
        autoplay:(numBestSell > 4),
        autoplayTimeout:3000,
        smartSpeed:1000,
        margin: 15,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:4
            },
            600:{
                items:4
            },
            1000:{
                items:4
            }
        },
    })
    $('.button-prev-bestSell').click(function() {
        $('.list-product-bestSell ul').trigger('prev');
    });
    $('.button-next-bestSell').click(function() {
        $('.list-product-bestSell ul').trigger('next');
    });
    
    
    $('.doitac ul').owlCarousel({
        loop: false,
        nav:false,
        dots:false,
        autoplay: true,
        autoplayTimeout:3000,
        smartSpeed:1000,
        margin: 20,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:9
            },
            600:{
                items:9
            },
            1000:{
                items:9
            }
        },
    })
    $('.pre').click(function() {
        $('.doitac ul').trigger('prev');
    })
    $('.next').click(function() {
        $('.doitac ul').trigger('next');
    })
    
    
    $('.list-doitac-duan ul').owlCarousel({
        loop: false,
        nav:false,
        dots:true,
        autoplay: true,
        autoplayTimeout:3000,
        smartSpeed:1000,
        margin: 10,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:3
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        },
    })
    
    $('.list-duan-khac ul').owlCarousel({
        loop: false,
        nav:false,
        dots:false,
        autoplay: true,
        autoplayTimeout:3000,
        smartSpeed:1000,
        margin: 20,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:4
            },
            600:{
                items:4
            },
            1000:{
                items:4
            }
        },
    })
    
    
    $('.list-duan ul').owlCarousel({
        loop: false,
        nav:false,
        dots:false,
        autoplay: false,
        autoplayTimeout:3000,
        smartSpeed:1000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        },
    })
    
    $('.bt-duan-pre').click(function() {
        $('.list-duan ul').trigger('prev');
    })
    $('.bt-duan-next').click(function() {
        $('.list-duan ul').trigger('next');
    })
    
    $('.list-sanpham ul li').hover(function(){
        $(this).find('.img-hover').toggleClass('none');
        $(this).find('.info-sanpham').toggleClass('none');
        $(this).find('.info-sanpham').toggleClass('flipInX');
    })
    
    $('#form-lienhe').submit(function(e){
        e.preventDefault();
        var value = $('#form-lienhe').serialize();
        var html = $(this).html();
        var content = $(this);
        content.html('<div class="loading" style="font-size:13px; text-align:center; color:#454545"><img src="public/default/img/icon/loading.gif" alt="" /><div class="clr10"></div><span>Sending Information...</span></div>');
        setTimeout(function(){
            $.post(base_url+'default/contact/send',value).done(function(data){
                alertify.alert(data);
                content.html(html);
            });
        },1500);
    })
    
    $('#form-lienhe-footer').submit(function(e){
        e.preventDefault();
        var value = $('#form-lienhe-footer').serialize();
        var html = $(this).html();
        var content = $(this);
        content.html('<div class="loading" style="font-size:13px; text-align:center; color:#454545"><img src="public/default/img/icon/loading.gif" alt="" /><div class="clr10"></div><span>Đang gửi thông tin...</span></div>');
        setTimeout(function(){
            $.post(base_url+'default/contact/send',value).done(function(data){
                alertify.alert(data);
                content.html(html);
            });
        },1500);
    })
    var isFocus = false;
    var timeOut;
    $('.search').click(function(e){
        clearTimeout(timeOut);
        if(e.target.tagName == 'IMG'){
            $(this).toggleClass('active');
            time = 3000;
        }
        if($(this).hasClass('active')){
            $('.menu .fix').css('overflow','visible');
        } else {
            $('.menu .fix').css('overflow','hidden');
        }
        timeOut = setTimeout(function(){
            if(!isFocus){
                $('.search').removeClass('active');
                $('.menu .fix').css('overflow','hidden');
            }
        }, 3000)
    })
    $('.search input').focus(function(){
        isFocus = true;
    })
    
    $('.menu nav ul li').hover(function(){
        $('.menu .fix').css('overflow','hidden');
        $('.search').removeClass('active');
    })
})
$(window).load(function(){
    $('.rslides_tabs li').each(function() {
        $(this).find('a').html('');
    })
    $(".scroll").mCustomScrollbar();
})