/*
 * @Author: Rituparna
 * @Date:   2017-08-02 17:46:35
 * @Last Modified by:   Rituparna
 * @Last Modified time: 2017-08-02 18:52:26
 */
/*jslint browser: true*/
/*global $, jQuery, alert*/
/*jslint plusplus: true */
/*jshint -W065 */
/*global baseUrl, FileReader*/

$(document).ready(function(){

/*Popup Appear when clicked on Delete Banner Icon*/
    $(".delBanner").on('click', function (event) {
        "use strict";
        $("#dynamicpagecreatepopup").fadeIn();
        var abc = $(this).data('id');
        $('#hidden_userid').val(abc);
});

});

