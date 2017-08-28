/**
 * Neu v1.4 by yokCreative
 * Copyright 2014  
 * 
 */


$(function () {
// Sidebar menu toggle
    //  Get height of all dds before hide() occurs.  Store height in heightArray, indexed based on the dd's position.

    $('.sidebar-nav li a').click(function (event) {
        $(this).next().stop().slideToggle(300);
        $('.sidebar-nav').find('a').not(this).next().slideUp(300);
    });


    $('.close-panel').click(function ()
    {
        $(this).parent().parent().parent().hide();
    });

    $('a#all_open').click(function ()
    {
        $('div.col-md-3:hidden').show();
        $('a#all_open:visible').hide();
        $('a#all_close:hidden').show();
        return false;
    });

    $('a#all_close').click(function ()
    {
        $('div.col-md-3:visible').hide();
        $('a#all_close:visible').hide();
        $('a#all_open:hidden').show();
        return false;
    });

    $('a#all_invert').click(function ()
    {
        $('div.col-md-3').children().children().next().toggle("slow");
        return false;
    });

    $('a#all_expand').click(function ()
    {
        $('div.col-md-3').children().children().next().show("slow");
        return false;
    });
    $('a#all_collapse').click(function ()
    {
        $('div.col-md-3').children().children().next().hide();
        return false;
    });

    $('#menu-toggle').click(function (event) {
        if ($('.navbar-collapse').is(":visible")) {
            $('.navbar-collapse').hide();
        }
    });

    $('#user-menu').click(function (event) {
        if ($('.navbar-collapse').is(":hidden")) {
            $('.navbar-collapse').show();
        } else if ($('.navbar-collapse').is(":visible")) {
            $('.navbar-collapse').hide();
        }
    });

// Stretch Columns to Full Height

    $(".stretch-full-height").height($(document).height());
    $(".stretch-full-height").height($("#page-content-wrapper").height());

    window.onresize = function () {
        $(".stretch-full-height").height($("#page-content-wrapper").height());
    };



// Preloader
    $('.preloader-wrapper').fadeOut();


// Rotate accordion icon
    $('.accord-collapse').on('shown.bs.collapse', function () {
        $(this).parent().find(".icon-chevron-right").removeClass("icon-chevron-right").addClass("icon-chevron-down");
    }).on('hidden.bs.collapse',
            function () {
                $(this).parent().find(".icon-chevron-down").removeClass("icon-chevron-down").addClass("icon-chevron-right");
            });
// Close panels
    $('.icon-chevron-down').click(function () {
        $(this).parent().parent().parent().next().stop().slideToggle(500);


    });
// Show first tab
    $(function () {
        $('.nav-tabs a:first').tab('show')
    })


// Show first pill
    $(function () {
        $('.nav-pills .active a').tab('show')
    })

});


/* Initializing some of the plugins  */

// Easy Pie Charts
var initPieChart = function () {
    $('.percentage').easyPieChart({
        animate: 1000
    });
    $('.percentage-light').easyPieChart({
        trackColor: '#a64077',
        scaleColor: false,
        lineCap: 'butt',
        lineWidth: 15,
        animate: 1000
    });

    $('.updateEasyPieChart').on('click', function (e) {
        e.preventDefault();
        $('.percentage, .percentage-light').each(function () {
            var newValue = Math.round(100 * Math.random());
            $(this).data('easyPieChart').update(newValue);
            $('span', this).text(newValue);
        });
    });
};


// Counters

$(document).ready(function () {

    //new products counter
    newProducts = $('#new_products_value').val();

    if (newProducts == 0) {
        $({countNum: $('#new_products').text()}).animate({countNum: newProducts}, {
            duration: 2500,
            easing: 'linear',
            step: function () {
                $('#new_products').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_products').text()}).animate({countNum: newProducts}, {
            duration: 2500,
            easing: 'linear',
            step: function () {
                $('#new_products').text(Math.floor(this.countNum + 1));
            },
        });
    }


//pening sops counter

    pendingSops = $('#pending_sop_value').val();

    if (pendingSops == 0) {
        $({countNum: $('#pending_sops').text()}).animate({countNum: pendingSops}, {
            duration: 2500,
            easing: 'linear',
            step: function () {
                $('#pending_sops').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#pending_sops').text()}).animate({countNum: pendingSops}, {
            duration: 2500,
            easing: 'linear',
            step: function () {
                $('#pending_sops').text(Math.floor(this.countNum + 1));
            },
        });
    }
    //regular_vendors counter

    regular_vendors = $('#regular_vendors_value').val();

    if (regular_vendors == 0) {
        $({countNum: $('#regular_vendors').text()}).animate({countNum: regular_vendors}, {
            duration: 2500,
            easing: 'linear',
            step: function () {
                $('#regular_vendors').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#regular_vendors').text()}).animate({countNum: regular_vendors}, {
            duration: 2500,
            easing: 'linear',
            step: function () {
                $('#regular_vendors').text(Math.floor(this.countNum + 1));
            },
        });
    }
    //manufacturers counter

    manufacturers = $('#new_manufacturers_value').val();

    if (manufacturers == 0) {
        $({countNum: $('#new_manufacturers').text()}).animate({countNum: manufacturers}, {
            duration: 2500,
            easing: 'linear',
            step: function () {
                $('#new_manufacturers').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_manufacturers').text()}).animate({countNum: manufacturers}, {
            duration: 2500,
            easing: 'linear',
            step: function () {
                $('#new_manufacturers').text(Math.floor(this.countNum + 1));
            },
        });
    }


//reports counter
    reports = $('#new_reports_value').val();
    if (reports == 0) {
        $({countNum: $('#new_reports').text()}).animate({countNum: reports}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_reports').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_reports').text()}).animate({countNum: reports}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_reports').text(Math.floor(this.countNum + 1));
            },
        });
    }
    //leads counter
    leads = $('#new_leads_value').val();
    if (leads == 0) {
        $({countNum: $('#new_leads').text()}).animate({countNum: leads}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_leads').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_leads').text()}).animate({countNum: leads}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_leads').text(Math.floor(this.countNum + 1));
            },
        });
    }
    //shopping_list counter
    shopping_list = $('#new_shopping_list_value').val();
    if (shopping_list == 0) {
        $({countNum: $('#new_shopping_list').text()}).animate({countNum: shopping_list}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_shopping_list').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_shopping_list').text()}).animate({countNum: shopping_list}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_shopping_list').text(Math.floor(this.countNum + 1));
            },
        });
    }
    //shopping_list counter
    normal_users = $('#new_normal_users_value').val();
    if (normal_users == 0) {
        $({countNum: $('#new_normal_users').text()}).animate({countNum: normal_users}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_normal_users').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_normal_users').text()}).animate({countNum: normal_users}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_normal_users').text(Math.floor(this.countNum + 1));
            },
        });
    }
    //pending_qoutes counter
    pending_qoutes = $('#new_pending_qoutes_value').val();
    if (pending_qoutes == 0) {
        $({countNum: $('#new_pending_qoutes').text()}).animate({countNum: pending_qoutes}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_pending_qoutes').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_pending_qoutes').text()}).animate({countNum: pending_qoutes}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_pending_qoutes').text(Math.floor(this.countNum + 1));
            },
        });
    }
    //pending_info_req counter
    /*pending_info_req = $('#new_pending_info_req_value').val();
    if (pending_info_req == 0) {
        $({countNum: $('#new_pending_info_req').text()}).animate({countNum: pending_info_req}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_pending_info_req').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_pending_info_req').text()}).animate({countNum: pending_info_req}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_pending_info_req').text(Math.floor(this.countNum + 1));
            },
        });
    }*/

    //closed_quotes_leads counter
   /* closed_quotes_leads = $('#new_closed_quotes_leads_value').val();
    if (closed_quotes_leads == 0) {
        $({countNum: $('#new_closed_quotes_leads').text()}).animate({countNum: closed_quotes_leads}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_closed_quotes_leads').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_closed_quotes_leads').text()}).animate({countNum: closed_quotes_leads}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_closed_quotes_leads').text(Math.floor(this.countNum + 1));
            },
        });
    }*/
    //closed_info_leads counter
    /*closed_info_leads = $('#new_closed_info_leads_value').val();
    if (closed_info_leads == 0) {
        $({countNum: $('#new_closed_info_leads').text()}).animate({countNum: closed_info_leads}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_closed_info_leads').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_closed_info_leads').text()}).animate({countNum: closed_info_leads}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_closed_info_leads').text(Math.floor(this.countNum + 1));
            },
        });
    }*/
    //total_quote_request counter
    /*total_quote_request = $('#new_total_quote_request_value').val();
    if (total_quote_request == 0) {
        $({countNum: $('#new_total_quote_request').text()}).animate({countNum: total_quote_request}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_total_quote_request').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_total_quote_request').text()}).animate({countNum: total_quote_request}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_total_quote_request').text(Math.floor(this.countNum + 1));
            },
        });
    }*/
    //total_info_request counter
    /*total_info_request = $('#new_total_info_request_value').val();
    if (total_info_request == 0) {
        $({countNum: $('#new_total_info_request').text()}).animate({countNum: total_info_request}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_total_info_request').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_total_info_request').text()}).animate({countNum: total_info_request}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_total_info_request').text(Math.floor(this.countNum + 1));
            },
        });
    }*/
    //processed_shopping_list counter
    /*processed_shopping_list = $('#new_processed_shopping_list_value').val();
    if (processed_shopping_list == 0) {
        $({countNum: $('#new_processed_shopping_list').text()}).animate({countNum: processed_shopping_list}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_processed_shopping_list').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_processed_shopping_list').text()}).animate({countNum: processed_shopping_list}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_processed_shopping_list').text(Math.floor(this.countNum + 1));
            },
        });
    }*/
    //unprocessed_shopping_list counter
    /*unprocessed_shopping_list = $('#new_unprocessed_shopping_list_value').val();
    if (unprocessed_shopping_list == 0) {
        $({countNum: $('#new_unprocessed_shopping_list').text()}).animate({countNum: unprocessed_shopping_list}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_unprocessed_shopping_list').text(Math.floor(this.countNum));
            },
        });
    } else {
        $({countNum: $('#new_unprocessed_shopping_list').text()}).animate({countNum: unprocessed_shopping_list}, {
            duration: 4500,
            easing: 'linear',
            step: function () {
                $('#new_unprocessed_shopping_list').text(Math.floor(this.countNum + 1));
            },
        });
    }
*/
});

$({countNum: $('#new-subscribers').text()}).animate({countNum: 392}, {
    duration: 4000,
    easing: 'linear',
    step: function () {
        $('#new-subscribers').text(Math.floor(this.countNum));
    },
});
// Calendar date-popover

$(document).ready(function () {
    $("#date-popover").popover({html: true, trigger: "manual"});
    $("#date-popover").hide();
    $("#date-popover").click(function (e) {
        $(this).hide();
    });

    $("#my-calendar").zabuto_calendar({
        action: function () {
            return myDateFunction(this.id, false);
        },
        action_nav: function () {
            return myNavFunction(this.id);
        },
        ajax: {
            url: "show_data.php?action=1",
            modal: true
        },
        legend: [
            {type: "text", label: "Special event", badge: "00"},
            {type: "block", label: "Regular event", }
        ]
    });
});

function myDateFunction(id, fromModal) {
    $("#date-popover").hide();
    if (fromModal) {
        $("#" + id + "_modal").modal("hide");
    }
    var date = $("#" + id).data("date");
    var hasEvent = $("#" + id).data("hasEvent");
    if (hasEvent && !fromModal) {
        return false;
    }
    $("#date-popover-content").html('You clicked on date ' + date);
    $("#date-popover").show();
    return true;
}

function myNavFunction(id) {
    $("#date-popover").hide();
    var nav = $("#" + id).data("navigation");
    var to = $("#" + id).data("to");
    console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
}