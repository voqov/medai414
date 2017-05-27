//for drag effect
// commit test
var animLeftEnd = {opacity: 0.6, left: "90%"},
    animLeftStart = {opacity: 0, left: "92%"},
    animRightEnd = {opacity: 0.6, left: "4%"},
    animRightStart = {opacity: 0,left: "2%"};
var animObj = {
    left: [animLeftEnd, animLeftStart],
    right: [animRightEnd, animRightStart]
};
var curIntervalID = null;

jQuery(document).ready(function () {
    var pathname_split = window.location.pathname.split('/'),
        pathname_arr = pathname_split.clean("");

    if(pathname_arr.length >= 2) {
        jQuery("#main_nav a").on("click", function () {
            var hrefval = jQuery(this).attr("href");
            if (hrefval == "#ii") {
                openSidepage();
            }
            else if (hrefval == "http://media-jobs.ajou.ac.kr/wordpress/game/") {
                closeSidepage();
            }
        });
    } else {
        jQuery("#main_nav a").on("click", function () {
            var hrefval = jQuery(this).attr("href");
            if (hrefval == "#ii") {
                window.location = "http://media-jobs.ajou.ac.kr/wordpress/game/";
            }
        });
    }

    jQuery('.carousel').carousel({
        interval: false
    })

    //draggable CIL
    jQuery("#mil_subject_table").draggable({ axis: "x", stop: function(event, ui) {
        var table_width = ui.helper.width();
        var visible_width = jQuery("#content_wrap").width();
        var can_scroll_width = visible_width - table_width; //negative
        if(ui.position.left > 0)
            jQuery("#mil_subject_table").animate({"left": "0px"}, 300);
        else if(ui.position.left < can_scroll_width)
            jQuery("#mil_subject_table").animate({"left": can_scroll_width+"px"}, 300);
    }});

    //draggable Industry list of II
    jQuery("#industry-list-inner").draggable({ axis: "x", stop: function(event, ui) {
        var list_width = ui.helper.outerWidth(true);
        var visible_width = jQuery("#industry-list").width();
        var can_scroll_width = visible_width - list_width; //negative
        if(ui.position.left > 0)
            jQuery("#industry-list-inner").animate({"left": "0px"}, 300);
        else if(ui.position.left < can_scroll_width)
            jQuery("#industry-list-inner").animate({"left": can_scroll_width+"px"}, 300);
    }});

    //drag event handler of right sidebar
    var downX = 0;
    var isMouseDown = false;
    jQuery("#side2").on("mousedown", function(e) {
        downX = e.pageX;
        isMouseDown = true;
    });
    jQuery(document).on("mouseup", function(e) {
        if(isMouseDown) {
            if (jQuery("#industry_insight_content_wrap").css("display") == "none") {
                if (isMouseDown && downX - e.pageX > 30) {
                    var navArr = jQuery("#main_nav a");
                    for (var i = 0; i < navArr.length; i++) {
                        if (jQuery(navArr[i]).attr("href") == "#ii")
                            jQuery(navArr[i]).click();
                    }
                }
            } else if (jQuery("#industry_insight_content_wrap").css("display") == "block") {
                if (isMouseDown && downX - e.pageX < -30) {
                    var navArr = jQuery("#main_nav a");
                    for (var i = 0; i < navArr.length; i++) {
                        if (jQuery(navArr[i]).attr("href") == "http://media-jobs.ajou.ac.kr/wordpress/game/")
                            jQuery(navArr[i]).click();
                    }
                }
            }
            isMouseDown = false;
        }
    });

    jQuery("#menu-item-319 a").click(function () {
        window.open("https://ko.surveymonkey.com/r/links02", "Industry Survey");
    });

    //expand industry list inner div length
    var itemLength = jQuery("#industry-list-inner").children().length;
    var itemWidth = jQuery(jQuery("#industry-list-inner .item")[0]).outerWidth(true);
    jQuery("#industry-list-inner").css("width", itemWidth*itemLength+"px"); // one item width is 110


    //for industry news pagination
    jQuery(".pagination li").on("click", function() {
        if(!jQuery(this).hasClass("active")) {
            var that = this;
            jQuery.each(jQuery(".pagination li"), function (index, value) {
                if(jQuery(value).hasClass("active")) {
                    jQuery(value).removeClass("active");
                    var distance_factor = parseInt(jQuery(value).text()) - parseInt(jQuery(that).text()),
                        distance = distance_factor * jQuery("#industry-news").width(),
                        origin = parseInt(jQuery("#industry-news-inner").css("left"));
                    if(origin) distance += origin;
                    console.log("origin: "+origin+", distance: "+distance);
                    jQuery("#industry-news-inner").animate({"left": distance+"px"}, 300);
                }
            });
            jQuery(this).addClass("active");
        }

    });

    showIndustryList();
    setStyleBold();

});

function openSidepage() {

    jQuery('#industry_insight_content_wrap').css("display", "block");
    jQuery("#drag-icon-left").css("display", "none");
    jQuery("#drag-icon-right").css("display", "none");
    if(jQuery(document).innerWidth() < 1919)
        jQuery('#slide_area').animate({ right: '84%' }, 1000, 'easeOutQuart', function() {
            jQuery("#drag-icon-right").css("display", "block");
            setAnimGuideToDrag("right");
            jQuery('#industry_insight_content_wrap').css("z-index", 3);
        });
    else
        jQuery('#slide_area').animate({ right: '82.325%' }, 1000, 'easeOutQuart', function() {
            jQuery("#drag-icon-right").css("display", "block");
            setAnimGuideToDrag("right");
            jQuery('#content_ii_wrap').css("z-index", 3);
        });
}

function closeSidepage(){
    jQuery('#industry_insight_content_wrap').css("z-index", -1);
    jQuery("#drag-icon-left").css("display", "none");
    jQuery("#drag-icon-right").css("display", "none");
    jQuery('#slide_area').animate({
        right: '0'
    }, 1000, 'easeOutQuart', function() {
        jQuery('#industry_insight_content_wrap').css("display", "none");
        jQuery("#drag-icon-left").css("display", "block");
        setAnimGuideToDrag("left");
    });
}

function showIndustryList() {
    if (jQuery("#menu-job_game li").hasClass("current-menu-item")) {
        jQuery("#right2").css("display", "block");
        jQuery(".menu-industry_movie-container").css("display", "none");
    }
    else if (jQuery("#menu-job_ani li").hasClass("current-menu-item")) {
        jQuery("#right2").css("display", "block");
        jQuery(".menu-industry_game-container").css("display", "none");
    }
    else if (jQuery("#menu-job_movie li").hasClass("current-menu-item")) {
        jQuery("#right2").css("display", "block");
        jQuery(".menu-industry_game-container").css("display", "none");
    }
}

function setStyleBold() {
    jQuery("#menu-industry_game li a[href$='#']").css({"font-weight": "normal", "color": "#919296"});
    jQuery("#menu-industry_movie li a[href$='#']").css({"font-weight": "normal", "color": "#919296"});
}

function setAnimGuideToDrag(direction) {
    if(curIntervalID != null) clearInterval(curIntervalID);
    jQuery("#drag-icon-"+direction).animate(animObj[direction][0], {
        duration: 800,
        specialEasing: { width: "easeOutBounce", height: "easeOutBounce" },
        complete: function () {
            setTimeout(function () {
                jQuery("#drag-icon-"+direction).animate(animObj[direction][1], 1200, null);
            }, 300);
        }
    });
    curIntervalID = setInterval(function () {
        jQuery("#drag-icon-" + direction).animate(animObj[direction][0], {
            duration: 800,
            specialEasing: { width: "easeOutBounce", height: "easeOutBounce" },
            complete: function () {
                setTimeout(function () {
                    jQuery("#drag-icon-" + direction).animate(animObj[direction][1], 1200, null);
                }, 300);
            }
        });
    }, 5000); // end of guide to drag effect
}

/*
 * Used by /plugins/mil_editor/backend/functions.php:576

function stylizeMandatoryTd(element, bgColor, borderColor) {
    var self = $(element);
    var colorObj = {backgroundColor : bgColor, borderColor : borderColor};
    var tableBg = self.find('.table_bg').css(colorObj);
    var typeIcon = self.find('.type_icon');
    if (typeIcon.length > 0) {
        typeIcon.text('M').css(colorObj);
    } else {
        $('<div>').appendTo("#"+self.attr('id')).text('M').attr('id', self.attr('id') + '_icon').addClass('type_icon').css(colorObj);
    }
}
 */

Array.prototype.clean = function(deleteValue) {
    for (var i = 0; i < this.length; i++) {
        if (this[i] == deleteValue) {
            this.splice(i, 1);
            i--;
        }
    }
    return this;
};