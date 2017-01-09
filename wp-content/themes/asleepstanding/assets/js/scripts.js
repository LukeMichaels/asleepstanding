(function ($, root, undefined) {
  
  $(function () {

    'use strict';

    // toggle hamburger & off-canvas nav
    var $hamburger = $(".hamburger");
    $hamburger.on("click", function() {
      $hamburger.toggleClass("is-active");
    });

    // off canvas menu
    $(function() {
      $('#off-canvas-button').click(function() {
        toggleNav();
      });
    });
    function toggleNav() {
      if ($('#wrapper').hasClass('show-nav')) {
        $('#wrapper').removeClass('show-nav');
      } else {
        $('#wrapper').addClass('show-nav');
      }
    }

    // disable save as image in right-click context menu
    $("body").on("contextmenu", "img", function() {
      return false;
    });

  });

})(jQuery, this);
