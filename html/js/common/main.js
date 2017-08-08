$(document).ready(function () {
    $('.banner_slider').slick({
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        /*nextArrow: false,
        prevArrow: false,*/
        dots: true,
        autoplay: true,
        arrows: true,
    });
    $('.backstage_slider').slick({
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 1,
        adaptiveHeight: true,
        dots: false,
        autoplay: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false,
                    arrows: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false,
                    arrows: true,
                }
            }

        ]
    });
    $('.tab_slider').slick({
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        /*nextArrow: false,
        prevArrow: false,*/
        dots: false,
        autoplay: true,
        arrows: true,
    });
    $('.fan_slider').slick({
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        adaptiveHeight: true,
        dots: false,
        autoplay: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false,
                    arrows: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false,
                    arrows: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: false,
                    dots: false,
                    arrows: false,
                }
            }

        ]
    });
    
    // frontend javascript start from here which are responsible for developing.
    $(".registerButton").click(function () {
          $.ajax({
             type: "POST", 
             url:'/login/register', 
             data: $('#register').serialize(), 
             success : function (data){
                 if(data.number == 0)
                     alert('You have entered wrong details. Pleae check.');
                 else
                 {
                     window.location.reload();
                     alert('Your account is created. Please login to to continue.');
                 }
             }
         });
    });
    $(".loginButton").click(function () {
          $.ajax({
             type: "POST", 
             url:'/login/login', 
             data: $('#signin').serialize(), 
             success : function (data){
                 if(!data.redirect)
                     alert('You have entered wrong details. Pleae check.');
                 else
                     window.location.href = "/";
             }
         });
    });
    if($("input[name='homePageDate']").length){
        $("input[name='homePageDate']").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:  "yy-mm-dd"
        });
    }
});

function addEventToCarts(){
    var bookingElement = $("table.bookingTable tbody tr"),
        tickets = [],
        counter = 1,
        event = $("#event-specific-id").val();
    bookingElement.each(function(){
        if(!$(this).hasClass('lastTR'))
        {    
            if($(this).find('.spaces').val().trim() != '0')
            {
                tickets[counter] = [];
                tickets[counter][0] = $(this).find('.ticketId').val();
                tickets[counter++][1] = $(this).find('.spaces').val();
            }
        }
    });
    
    if(counter == 1)
    {
        console.log(tickets);
        alert('Please select at least 1 ticket to proceed');
    } 
    else 
    {
        $.ajax({ 
            type:'POST',
            data:{value:tickets, id:event},
            url:"/event/addtocart",
            success:function(data){
               window.location.href="/event/queue/"+data;
            }
        })
    }
}