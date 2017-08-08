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

  $('body').on('click', '.sfp__googleform', function(){
    var geocoder = new google.maps.Geocoder(),
        address = $('#addrTwo').val() + " " + $('#addrOne').val() + $('#offCity').val() + $('#offState').val() + $('#offCon').val(),
        latitude = "",
        longitude = "",
        add = "",
        value = "",
        getaddresscity = "",
        count = "",
        country = "",
        state = "",
        city = "",
        myLatlng = "",
        mapProp = "",
        map = "",
        marker = "",
        lat = "",
        long = "",
        //zoomlevel = parseInt($('#sfp-maps-zoom').val(), radix);
        //zoomlevel = $('#sfp-maps-zoom').val();
        zoomlevel = 17;

    geocoder.geocode({
        'address': address
    }, function (results, status) {
        latitude = results[0].geometry.location.lat();
        longitude = results[0].geometry.location.lng();
        add = results[0].formatted_address;
        value = add.split(",");
        count = value.length;
        country = value[count - 1];
        state = value[count - 2];
        city = value[count - 3];
        getaddresscity = city + "," + state + "," + country;
        $('#lat').val(latitude);
        $('#long').val(longitude);

        if (status == google.maps.GeocoderStatus.OK) {

            myLatlng = new google.maps.LatLng(latitude, longitude);
            mapProp = {
                scrollwheel: false,
                navigationControl: false,
                mapTypeControl: false,
                scaleControl: false,
                zoomControl: false,
                draggable: false,
                center: myLatlng,
                zoom: zoomlevel,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map"), mapProp);
            marker = new google.maps.Marker({
                position: myLatlng
            });
            marker.setMap(map);
            $("#map").css("height", "100%");
        }

    });



//    $.ajax({
//            type: "POST",
//            url: baseUrl + '/officeaddress/saveaddress',
//            data: {
//                latitude: latitude,
//                longitude: longitude
//            }
//    });

//      if (navigator.geolocation) {
//          alert();
//        navigator.geolocation.getCurrentPosition(function (position) {
//            $.ajax({
//                type: "POST",
//                url: baseUrl + '/officeaddress/saveaddress',
//                data: {
//                    x: position.coords.latitude,
//                    y: position.coords.longitude
//                },
//                success: function (res) {
//                    alert('lat-long'); return false;
//                }
//            });
//        });
//      }




  });

});
