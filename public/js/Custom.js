//  Sticky Navbar

$(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 20) {
        $("#sticky").addClass("sticky");
    } else {
        $("#sticky").removeClass("sticky");
    }
});
//