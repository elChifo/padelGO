(function ($) {
    var $win = $(window);
    //muestra la ventana. JQUERY
    $win.scroll(function () {
        if ($win.height() + $win.scrollTop() === $(document).height()) {
            $('footer').addClass('visible');
        } else {
            $('footer').removeClass('visible');
        }
    });

})(jQuery);