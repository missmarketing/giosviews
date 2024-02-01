
/* Burger Menu */
jQuery(document).ready(function () {
    var body = jQuery(document.body);
    var button = jQuery("svg");
    var line = jQuery("line");

    button.click(function () {
        if (jQuery(document.body).hasClass("menu-open")) {
            body.removeClass("menu-open");
            return;
        }
        body.addClass("menu-open");
    });
});

/* Fixed Menu */
jQuery(document).ready(function() {
    jQuery(window).on("scroll", function() {
        const header = jQuery("#header");
        if (jQuery(window).scrollTop() > 0) {
            header.addClass("fixed");
        } else {
            header.removeClass("fixed");
        }
    });
});

/* Active Class Menú */
$(document).ready(function() {
    // Selecciona todos los elementos a dentro del menú
    var menuLinks = $('.menu-gios-views-container a');
    // Agrega un evento de clic a cada enlace del menú
    menuLinks.click(function() {
        // Elimina la clase 'active' de todos los enlaces
        menuLinks.removeClass('active');
        // Agrega la clase 'active' al enlace que fue clickeado
        $(this).addClass('active');
    });
    // Agregar la clase 'active' al enlace correspondiente a la página actual
    var currentUrl = window.location.href;
    menuLinks.each(function() {
        if ($(this).attr('href') === currentUrl) {
            $(this).addClass('active');
        }
    });
});


