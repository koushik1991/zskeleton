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

/*Add Office Address Validation*/
    $('body').on('click', '#ofcBtnSave', function(){
        var offTitle  = $('#offTitle').val(),
            addrOne   = $('#addrOne').val(),
            addrTwo   = $('#addrTwo').val(),
            offCity   = $('#offCity').val(),
            offPin    = $('#offPin').val(),
            offState  = $('#offState').val(),
            offCon    = $('#offCon').val(),
            landline  = $('#landline').val(),
            phone1    = $('#phone1').val(),
            phone2    = $('#phone2').val(),
            offEmail  = $('#offEmail').val(),
            latitude  = $('#lat').val(),
            longitude = $('#long').val();

        if (offTitle === '') {
            $('#errorName').css('display', 'block');
            $('#errorName').html("<font color='red'> Please enter the office name </font>");
            return false;
        } else if (addrOne === '') {
            $('#error1').css('display', 'block');
            $('#error1').html("<font color='red'> Please enter the office address </font>");
            return false;
        } else if (offCity === '') {
            $('#errorCity').css('display', 'block');
            $('#errorCity').html("<font color='red'> Please enter the city </font>");
            return false;
        } else if (offPin === '') {
            $('#errorPin').css('display', 'block');
            $('#errorPin').html("<font color='red'> Please enter the pin </font>");
            return false;
        } else if (offState === '') {
            $('#errorState').css('display', 'block');
            $('#errorState').html("<font color='red'> Please enter the state </font>");
            return false;
        } else if (offCon === '') {
            $('#errorCon').css('display', 'block');
            $('#errorCon').html("<font color='red'> Please enter the country </font>");
            return false;
        } else if (phone1 === '') {
            $('#errorPhn1').css('display', 'block');
            $('#errorPhn1').html("<font color='red'> Please enter the phone number </font>");
            return false;
        } else {
             $.ajax({
                type: "POST",
                url: baseUrl + '/officeaddress/saveaddress',
                data: {
                    offTitle : offTitle,
                    addrOne  : addrOne,
                    addrTwo  : addrTwo,
                    offCity  : offCity,
                    offPin   : offPin,
                    offState : offState,
                    offCon   : offCon,
                    landline : landline,
                    phone1   : phone1,
                    phone2   : phone2,
                    offEmail : offEmail,
                    latitude : latitude,
                    longitude: longitude,
                },
                success: function (response) {
                    if (response.trim() === "error") {
                        return false; //error message
                    } else {
                        window.location = baseUrl + '/officeaddress/view';
                    }
                }
            });

        }
    });

/*Edit Office Address Validation*/
    $('body').on('click', '#addresEdit', function(){
        var officeId  = $('#officeId').val(),
            offTitle  = $('#offTitle').val(),
            addrOne   = $('#addrOne').val(),
            addrTwo   = $('#addrTwo').val(),
            offCity   = $('#offCity').val(),
            offPin    = $('#offPin').val(),
            offState  = $('#offState').val(),
            offCon    = $('#offCon').val(),
            landline  = $('#landline').val(),
            phone1    = $('#phone1').val(),
            phone2    = $('#phone2').val(),
            offEmail  = $('#offEmail').val(),
            latitude  = $('#lat').val(),
            longitude = $('#long').val();

        if (offTitle === '') {
            $('#errorName').css('display', 'block');
            $('#errorName').html("<font color='red'> Please enter the office name </font>");
            return false;
        } else if (addrOne === '') {
            $('#error1').css('display', 'block');
            $('#error1').html("<font color='red'> Please enter the office address </font>");
            return false;
        } else if (offCity === '') {
            $('#errorCity').css('display', 'block');
            $('#errorCity').html("<font color='red'> Please enter the city </font>");
            return false;
        } else if (offPin === '') {
            $('#errorPin').css('display', 'block');
            $('#errorPin').html("<font color='red'> Please enter the pin </font>");
            return false;
        } else if (offState === '') {
            $('#errorState').css('display', 'block');
            $('#errorState').html("<font color='red'> Please enter the state </font>");
            return false;
        } else if (offCon === '') {
            $('#errorCon').css('display', 'block');
            $('#errorCon').html("<font color='red'> Please enter the country </font>");
            return false;
        } else if (phone1 === '') {
            $('#errorPhn1').css('display', 'block');
            $('#errorPhn1').html("<font color='red'> Please enter the phone number </font>");
            return false;
        } else {
             $.ajax({
                type: "POST",
                url: baseUrl + '/officeaddress/updateaddress',
                data: {
                    officeId : officeId,
                    offTitle : offTitle,
                    addrOne  : addrOne,
                    addrTwo  : addrTwo,
                    offCity  : offCity,
                    offPin   : offPin,
                    offState : offState,
                    offCon   : offCon,
                    landline : landline,
                    phone1   : phone1,
                    phone2   : phone2,
                    offEmail : offEmail,
                    latitude : latitude,
                    longitude: longitude,
                },
                success: function (response) {
                    //console.log(response); return false;
                    if (response.trim() === "error") {
                        return false; //error message
                    } else {
                        window.location = baseUrl + '/officeaddress/view';
                    }
                }
            });

        }
    });

/*Remove all error messages on keypress*/
    $('body').on('keypress', '.errRemove', function(){
        $('#errorName,#error1,#error2,#errorCity,#errorPin,#errorState,#errorCon,#errorLand, #errorPhn1,#errorPhn2,#errorEmail').css('display', 'none');
    });

});
