/*
 * @Author: Rituparna
 * @Date:   2017-08-01 17:46:35
 * @Last Modified by:   Rituparna
 * @Last Modified time: 2017-08-02 18:52:26
 */
/*jslint browser: true*/
/*global $, jQuery, alert*/
/*jslint plusplus: true */
/*jshint -W065 */
/*global baseUrl, FileReader*/

/* Preview Banner Image before Upload */
window.onload = function () {
    "use strict";

    var pathname = window.location.pathname,
        parts = pathname.split("/"),
        part3 = parts[3],
        fileUpload = '',
        dvPreview = '',
        i = '',
        file = '',
        ext = '',
        size = '',
        reader = '';

        fileUpload = document.getElementById("fileupload");
        fileUpload.onchange = function preview(e) {
            //var maxfilesize = 1024 * 1024; // 1MB

            if (typeof (FileReader) !== "undefined") {
                dvPreview = document.getElementById("upload_prev");
                dvPreview.innerHTML = "";
                for (i = 0; i < fileUpload.files.length; i++) {
                    file = fileUpload.files[i];
                    ext = file.name.split('.').pop().toLowerCase();
                    size = file.size;
                    if (ext === "jpg" || ext === "jpeg" || ext === "gif" || ext === "png" || ext === "bmp") {
                        //if (size < maxfilesize) {
                            reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement("IMG");
                                img.height = "100";
                                img.width = "100";
                                img.src = e.target.result;
                                img.style.marginRight = "12em";
                                img.style.marginTop = "5px";
                                dvPreview.appendChild(img);
                            };
                            reader.readAsDataURL(file);
                    //    }
                    } else {
                        $("#dynamicpagecreatepopupnewsbrief").fadeIn();
                        $('#hidden_newsbrief').html(file.name + " is not a valid image file.");
                        dvPreview.innerHTML = "";
                        return false;
                    }
                }
            } else {
                $("#dynamicpagecreatepopupnewsbrief").fadeIn();
                $('#hidden_newsbrief').html("This browser does not support HTML5 FileReader.");
            }
        };
};


$(document).ready(function () {
    "use strict";

/*Remove all error messages on keypress*/
    $('body').on('keypress', '.errRemove', function(){
        $('#errorName,#errorLink,#errorImg1,#errorImg2').css('display', 'none');
    });

/*Banner-Add Image Validation(onchange)*/
    $('#fileupload').bind('change', function () {
        var ext = $('#fileupload').val().split('.').pop().toLowerCase(),
            picsize = (this.files[0].size);
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) === -1) {
            $('#errorImg1').css('display', 'block');
            $('#errorImg1').html("<font color='red'> Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF </font>");
            $('#btnSave').attr("disabled", true);
            return false;
//        } else if (picsize > 1024000) {
//            $('#errorRate,#errorLink,#errorName,#errorImg1,#errorImg3,#upload_prev').css('display', 'none'); // hides image along with other error messages
//            $('#errorImg2').css('display', 'block');
//            $('#errorImg2').html("<font color='red'> Invalid Image Format! Maximum File Size Limit is 1MB </font>");
//            $('.upload_prev').children('img').attr('src', '');
//            $('#btnSave').attr("disabled", true);
//            return false;
        } else {
            $('#errorImg3').css('display', 'none');
            $('#upload_prev').css('display', 'block');
            $('#btnSave').attr("disabled", false);

        }
    });


/*Banner-Edit Update button click*/
    $('#btnSave').on("click", function () {
        var banrName    = $('#banrName').val(),
            bannerId    = $('#bannerId').val(),
            banrLink    = $('#banrLink').val(),
            prevImgPath = $('#prevImgPath').val(),
            visibility  = $('input[name=visibility]:checked').val();

        if (banrName === '') { //banner name field
            $('#errorName').css('display', 'block');
            $('#errorName').html("<font color='red'> Please enter the banner name </font>");
            return false;
        }  else if ((banrLink !== '')  && (!(/^(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp:/~\+#]*[\w\-\@?^=%&amp;/~\+#])?$/).test(banrLink))){ //banner redirect link
                $('#errorLink').css('display', 'block');
                $('#errorLink').html("<font color='red'> Please enter correct url format </font>");
            return false;
        } else {
            $("#bannerAddForm").ajaxSubmit({
                data: {
                    banrName   : banrName,
                    visibility : visibility,
                    bannerId   : bannerId,
                    banrLink   : banrLink,
                    prevImgPath: prevImgPath,
                    fileupload : 'fileupload'
                },
                success: function (response) {
                    if (response.trim() === "error") {
                        return false; //error message
                    } else {
                        window.location = baseUrl + '/banner/view';
                    }
                }
            });

        }
    });



});
