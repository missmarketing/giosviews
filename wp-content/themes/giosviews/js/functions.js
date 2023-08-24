
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

/* Back Top */
jQuery(document).ready(function($) {
  $("span#back-top").on("click", function() {
    $("html, body").animate(
      {
        scrollTop: 0
      },
      "slow"
    );
  });
});

