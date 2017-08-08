/*
 * @Author: Rituparna
 * @Date:   2017-07-31 17:46:35
 * @Last Modified by:   Rituparna
 * @Last Modified time: 2017-07-31 18:52:26
 */
/*jslint browser: true*/
/*global $, jQuery, alert*/
/*jslint plusplus: true */
/*jshint -W065 */
/*global baseUrl, FileReader*/


/*Popup Appear when clicked on Delete Banner Icon*/
$(".delBanner").on('click', function (event) {
    "use strict";
    $("#dynamicpagecreatepopup").fadeIn();
    var abc = $(this).data('id');
    $('#hidden_userid').val(abc);
});

/*Popup Appear when clicked on Hide-Banner Icon*/
$(".temp_hide").on('click', function (event) {
    "use strict";
    var tempid = $(this).parent().prev().val(), // banner id
        dataid = $(this).data("id");
    $('#hidden_tempid_hide').val(tempid); // send banner id to popup
    $('#hidden_dataid_hide').val(dataid);
    $("#dynamichidecreatepopup").fadeIn();
});

/*Popup Appear when clicked on Show-Banner Icon*/
$(".temp_show").on('click', function (event) {
    "use strict";
    var tempid = $(this).parent().prev().val(), // banner id
        dataid = $(this).data("id");
    $('#hidden_tempid_show').val(tempid); // send banner id to popup
    $('#hidden_dataid_show').val(dataid);
    $("#dynamicshowcreatepopup").fadeIn();
});

$(document).ready(function () {
    "use strict";

    /* Hide Template in Gallery(Front) */
    $('body').on('click', '.hideTemplate', function () {
        var banrId = $('#hidden_tempid_hide').val(), //template id
            id = $('#hidden_dataid_hide').val();
        $('#dynamichidecreatepopup').fadeOut();
        $('.tmpImg' + id).parent().siblings('.temp').children('.temp_show').css('display', 'inline'); //display show btn
        $('.tmpImg' + id).parent().siblings('.temp').children('.temp_hide').css('display', 'none');
        $.ajax({
            type: 'POST',
            url: baseUrl + '/banner/hidebanner',
            data: {
                banrId: banrId
            }
        });

    });

    /* Show Template in Gallery(Front) */
    $('body').on('click', '.showTemplate', function () {
        var banrId = $('#hidden_tempid_show').val(), //template id
            id = $('#hidden_dataid_show').val();
        $('#dynamicshowcreatepopup').fadeOut();
        $('.tmpImg' + id).parent().siblings('.temp').children('.temp_hide').css('display', 'inline'); //display hide btn
        $('.tmpImg' + id).parent().siblings('.temp').children('.temp_show').css('display', 'none');
        $.ajax({
            type: 'POST',
            url: baseUrl + '/banner/showbanner',
            data: {
                banrId: banrId
            },
            success: function(res){
                console.log(res); return false;
            }
        });

    });

});
