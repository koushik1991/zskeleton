/*
 * @Author: Rituparna
 * @Date:   2017-07-27 17:46:35
 * @Last Modified by: Rituparna
 * @Last Modified time: 2017-07-27 19:21:42
 */
/*jslint browser: true*/
/*global $, jQuery, alert*/
/*jslint plusplus: true */
/*jshint -W065 */
/*global diff:true*/

var baseUrl = window.location.origin;

var Script = (function () {
    "use strict";

    //    sidebar dropdown menu auto scrolling

    jQuery('#sidebar .sub-menu > a').click(function () {

        var o = ($(this).offset());
        diff = 250 - o.top;
        if (diff > 0) {
            $("#sidebar").scrollTo("-=" + Math.abs(diff), 500);
        } else {
            $("#sidebar").scrollTo("+=" + Math.abs(diff), 500);
        }
    });

    $(function () {
        var pathname = window.location.pathname,
            parts = pathname.split("/"),
            part1 = parts[0],
            part2 = parts[1],
            part3 = parts[2],
            part4 = parts[3],
            part5 = parts[4];

        if (pathname === '/user/index') {
            $('.common_class').removeClass('active');
            $('.user').addClass('active');
        } else if (pathname === '/banner/view') {
            $('.common_class').removeClass('active');
            $('.banner').addClass('active');
        } else if (pathname === '/banner/addbanner') {
            $('.common_class').removeClass('active');
            $('.banner').addClass('active');
        } else if (pathname === '/banner/editbanner/' + part4) {
            $('.common_class').removeClass('active');
            $('.banner').addClass('active');
        } else if (pathname === '/carrer/index') {
            $('.common_class').removeClass('active');
            $('.carrer').addClass('active');
        } else if (pathname === '/contact/index') {
            $('.common_class').removeClass('active');
            $('.contact').addClass('active');
        } else if (pathname === '/coupon/index') {
            $('.common_class').removeClass('active');
            $('.coupon').addClass('active');
        } else if (pathname === '/driver/index') {
            $('.common_class').removeClass('active');
            $('.driver').addClass('active');
        } else if (pathname === '/finance/index') {
            $('.common_class').removeClass('active');
            $('.finance').addClass('active');
        } else if (pathname === '/officeaddress/view') {
            $('.common_class').removeClass('active');
            $('.officeAddress').addClass('active');
        } else if (pathname === '/officeaddress/add') {
            $('.common_class').removeClass('active');
            $('.officeAddress').addClass('active');
        }else if (pathname === '/officelist/index') {
            $('.common_class').removeClass('active');
            $('.officeList').addClass('active');
        } else if (pathname === '/order/index') {
            $('.common_class').removeClass('active');
            $('.order').addClass('active');
        } else if (pathname === '/payment/index') {
            $('.common_class').removeClass('active');
            $('.payment').addClass('active');
        } else if (pathname === '/van/index') {
            $('.common_class').removeClass('active');
            $('.van').addClass('active');
        }


        $('ul').on('click', 'li', function () {

            if ($('ul').children('li').hasClass('active')) {
                $('ul').children('li').removeClass('active');
            }
            $(this).addClass('active');
            var className = $(this).attr('class');

            if (className === 'user common_class active') {
                window.location.href = baseUrl + '/user/index';
            } else if (className === 'banner common_class active'){
                window.location.href = baseUrl + '/banner/view';
            } else if (className === 'carrer common_class active'){
                window.location.href = baseUrl + '/carrer/index';
            } else if (className === 'contact common_class active'){
                window.location.href = baseUrl + '/contact/index';
            } else if (className === 'coupon common_class active'){
                window.location.href = baseUrl + '/coupon/index';
            } else if (className === 'driver common_class active'){
                window.location.href = baseUrl + '/driver/index';
            } else if (className === 'finance common_class active'){
                window.location.href = baseUrl + '/finance/index';
            } else if (className === 'officeAddress common_class active'){
                window.location.href = baseUrl + '/officeaddress/view';
            } else if (className === 'officeList common_class active'){
                window.location.href = baseUrl + '/officelist/index';
            } else if (className === 'order common_class active'){
                window.location.href = baseUrl + '/order/index';
            } else if (className === 'payment common_class active'){
                window.location.href = baseUrl + '/payment/index';
            } else if (className === 'van common_class active'){
                window.location.href = baseUrl + '/van/index';
            }

        });

    });

    //    sidebar toggle

    $(function () {
        function responsiveView() {
            var wSize = $(window).width();
            if (wSize <= 768) {
                $('#container').addClass('sidebar-close');
                $('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                $('#container').removeClass('sidebar-close');
                $('#sidebar > ul').show();
            }
        }
        $(window).on('load', responsiveView);
        $(window).on('resize', responsiveView);
    });


    $('.fa-bars').click(function () {
        if (!$("#sidebar").hasClass('hasEditor')) {
            if ($('#sidebar > ul').is(":visible") === true) {
                $('#main-content').css({
                    'margin-left': '0px'
                });
                $('#sidebar').css({
                    'margin-left': '-210px'
                });
                $('#sidebar > ul').hide();
                $("#container").addClass("sidebar-closed");
            } else {
                $('#main-content').css({
                    'margin-left': '210px'
                });
                $('#sidebar > ul').show();
                $('#sidebar').css({
                    'margin-left': '0'
                });
                $("#container").removeClass("sidebar-closed");
            }
        } else {
            if ($('#sidebar > ul').is(":visible") === true) {
                $('#sidebar').css({
                    'margin-left': '-210px'
                });
                $('#sidebar > ul').hide();
                $("#container").addClass("sidebar-closed");
            } else {
                $('#sidebar > ul').show();
                $('#sidebar').css({
                    'margin-left': '0'
                });
                $("#container").removeClass("sidebar-closed");
            }
        }
    });

    // custom scrollbar
//    $("#sidebar").niceScroll({
//        styler: "fb",
//        cursorcolor: "#4ECDC4",
//        cursorwidth: '3',
//        cursorborderradius: '10px',
//        background: '#404040',
//        spacebarenabled: false,
//        cursorborder: ''
//    });
//
//    $("html").niceScroll({
//        styler: "fb",
//        cursorcolor: "#4ECDC4",
//        cursorwidth: '6',
//        cursorborderradius: '10px',
//        background: '#404040',
//        spacebarenabled: false,
//        cursorborder: '',
//        zindex: '1000'
//    });

    // widget tools

    jQuery('.panel .tools .fa-chevron-down').click(function () {
        var el = jQuery(this).parents(".panel").children(".panel-body");
        if (jQuery(this).hasClass("fa-chevron-down")) {
            jQuery(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
            el.slideUp(200);
        } else {
            jQuery(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
            el.slideDown(200);
        }
    });

    jQuery('.panel .tools .fa-times').click(function () {
        jQuery(this).parents(".panel").parent().remove();
    });


    if ($(".custom-bar-chart")) {
        $(".bar").each(function () {
            var i = $(this).find(".value").html();
            $(this).find(".value").html("");
            $(this).find(".value").animate({
                height: i
            }, 2000);
        });
    }


}());
