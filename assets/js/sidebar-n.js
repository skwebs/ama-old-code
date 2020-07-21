"use strict";
//ama__sidebar
//$(".menuContent").clone().appendTo(".sidebar-menu");
$(".sidebar-menu .navbar").append($(".menuContent .navbar-nav").clone())

$(document).ready(function() {
    function navBreakpoint() {
        if ($(".navbar").hasClass("navbar-expand-sm")) {
            return 576;
        } else if ($(".navbar").hasClass("navbar-expand-md")) {
            return 768;
        } else if ($(".navbar").hasClass("navbar-expand-lg")) {
            return 992;
        } else if ($(".navbar").hasClass("navbar-expand-xl")) {
            return 1200;
        }
    }
    //sticky navbar
    var navHeight = $(".navbar").outerHeight();
    $("#ama-nav").sticky({
        topSpacing: 0
    })

    $(".hamburger").css({
        "top": (navHeight - $(".hamburger").outerHeight()) / 2
    })
    var headerHeight = $("header").outerHeight();
    var navHeight = $(".navbar").outerHeight();
    /*$(window).on("load resize scroll",function(){
    	if($(document).scrollTop()>=headerHeight){
    	
    	}
    })*/

    //for dropdown smooth open
    // Add slideDown animation to Bootstrap dropdown when expanding.
    $(document).on('show.bs.dropdown', '.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
        $(this).find('.dropdown-toggle').delay(300).addClass("active");
    });

    // Add slideUp animation to Bootstrap dropdown when collapsing.
    $(document).on('hide.bs.dropdown', '.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
        $(this).find('.dropdown-toggle').delay(300).removeClass("active");
    });

});

function elem(e) {
    return document.querySelector(e);
}

var touchSurface = elem("body");
var sidebar = elem(".sidebar");
var sidebarWidth = sidebar.offsetWidth;
var startX = "";
var change = "";
var sidebarOpened = false;
var minTouchLeft = 30;
var navbarToggler = elem(".navbar-toggler");
var sidebarOverlay = elem(".sidebar-overlay");
var hamburgerBtn = elem(".hamburger");
var content = elem(".content")
//CSS related variables
const __SETTING = {
    drawerTrans: "transform 500ms ",
    overlayTrans: "all 1s ease-in 500ms"
};
var winWide = $(window).outerWidth();
if (winWide < navBreakpoint()) {
    //sidebar opening time
    function handleStart(e) {
        if (!sidebarOpened) {
            startX = e.changedTouches[0].clientX;
            if (startX < minTouchLeft) {
                sidebarOverlay.style.opacity = 0;
                sidebarOverlay.style.display = "block";
                sidebar.style.transition = "none";
                sidebarOverlay.style.transition = "none";
            }
        }
    }

    function handleMove(e) {
        if (!sidebarOpened) {
            if (startX < minTouchLeft) {
                change = e.changedTouches[0].clientX - startX;
                if ((change - sidebarWidth) < 0) {
                    sidebar.style.transform = "translateX(" + (change - sidebarWidth) + "px)";
                    sidebarOverlay.style.opacity = change / sidebarWidth;
                }
            }
        }
    }

    function handleEnd(e) {
        if (!sidebarOpened) {
            if (startX < minTouchLeft) {
                if (change < (sidebarWidth / 3)) {
                    sidebarClose();
                } else {
                    sidebarOpen();
                }
            }
        }
    }

    // sidebar closing time
    function sidebarHandlerStart(e) {
        sidebarOverlay.style.display = "block";
        sidebar.style.transition = "none";
        sidebarOverlay.style.transition = "none";
        if (sidebarOpened) {
            startX = e.changedTouches[0].clientX;
        }
    }

    function sidebarHandlerMove(e) {
        if (sidebarOpened) {
            change = e.changedTouches[0].clientX - startX;
            if (change < 0) {
                sidebar.style.transform = "translateX(" + change + "px)";
                sidebarOverlay.style.opacity = (sidebarWidth + change) / sidebarWidth;
            }
        }
    }

    function sidebarHandlerEnd(e) {
        if (sidebarOpened) {
            if (change < 0) {
                if (change < (0 - sidebarWidth / 3)) {
                    sidebarClose();
                } else {
                    sidebarOpen();
                }
            }
        }
    }


    function handleCancel(e) {}

    function sidebarOpen() {
        sidebarOverlay.style.display = "block";
        sidebar.style.transform = "translateX(0px)";
        sidebar.style.transition = __SETTING.drawerTrans;
        sidebarOverlay.style.transition = __SETTING.overlayTrans;
        sidebarOpened = true;
        hamburgerBtn.classList.add("is-active");
        //	content.style.filter = "blue(2px)";
    }

    function sidebarClose() {
        sidebarOverlay.style.display = "none";
        sidebar.style.transform = "translateX(-" + sidebarWidth + "px)";
        sidebar.style.transition = __SETTING.drawerTrans;
        sidebarOverlay.style.transition = __SETTING.overlayTrans;
        sidebarOpened = false;
        hamburgerBtn.classList.remove("is-active");
        //		content.style.filter = "blur(0)";
    }

    function sidebarToggle() {
        if (sidebarOpened) {
            sidebarClose();
        } else {
            sidebarOpen();
        }
    }
    document.addEventListener("DOMContentLoaded", () => {
        touchSurface.addEventListener("touchstart", handleStart, false);
        touchSurface.addEventListener("touchend", handleEnd, false);
        touchSurface.addEventListener("touchmove", handleMove, false);
        //for sidebar
        sidebar.addEventListener("touchstart", sidebarHandlerStart, false);
        sidebar.addEventListener("touchmove", sidebarHandlerMove, false);
        sidebar.addEventListener("touchend", sidebarHandlerEnd, false);
    });

    sidebarOverlay.addEventListener("click", () => {
        sidebarClose();
    })
    navbarToggler.addEventListener("click", () => {
        sidebarToggle();
    })
}