$(document).ready(function() {

    //Slow scrolling
    $('a[href*="#"]').click(function (event) {
        var target = $(this.hash);
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top
        }, 1000);
    });
});
