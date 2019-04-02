$(document).ready(function(){

var state =  $(".side-nav").is(":hidden");
var win = $(window).width();

if (win > 950) {
    if (state == true) {
        $("#content").removeClass("col-md-10");
        $("#content").addClass("col-md-12");
    } else {
        $("#content").addClass("col-md-10");
        $("#content").removeClass("col-md-12");
    }
} else {
        if (state == true) {
            $("#content").removeClass("col-sm-10");
            $("#content").addClass("col-md-12");
        } else {
            $("#content").addClass("col-sm-10");
            $("#content").removeClass("col-md-12");
        }
}

$(window).resize(function() {
    var state =  $(".side-nav").is(":hidden");
    var win = $(window).width();

    if (win > 950) {
        if (state == true) {
            $("#content").removeClass("col-md-10");
            $("#content").addClass("col-md-12");
        } else {
            $("#content").addClass("col-md-10");
            $("#content").removeClass("col-md-12");
        }
    } else {
        if (state == true) {
            $("#content").removeClass("col-sm-10");
            $("#content").addClass("col-md-12");
        } else {
            $("#content").addClass("col-sm-10");
            $("#content").removeClass("col-md-12");
        }
    }
});


$("#nav").click(function(){
    $(".side-nav").toggle();
        var state =  $(".side-nav").is(":hidden");
        var win = $(window).width();

        if (win > 951) {
            if (state == true) {
                $("#content").removeClass("col-md-10");
                $("#content").addClass("col-md-12");
            } else {
                $("#content").addClass("col-md-10");
                $("#content").removeClass("col-md-12");
            }
        } else {
            if (state == true) {
                $("#content").removeClass("col-sm-10");
                $("#content").addClass("col-md-12");
            } else {
                $("#content").addClass("col-sm-10");
                $("#content").removeClass("col-md-12");
            }
        }          
    });
});