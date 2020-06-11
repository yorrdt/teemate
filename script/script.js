function setNavBarHeight() {
    $('.navbar_container').css({
        height: $(window).height() - $('#header_container').height() - 20 + 'px',
    });
	$('.content_container').css({
        height: $(window).height() - $('#header_container').height() - 20 + 'px',
    });
}

setNavBarHeight();
$(window).resize(setNavBarHeight);