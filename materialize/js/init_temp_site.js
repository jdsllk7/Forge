(function ($) {
  $(function () {

    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('.tooltipped').tooltip();
    $('select').formSelect();
    $(".dropdown-trigger").dropdown({ hover: true, constrainWidth: false });
    $('.carousel').carousel();
    
    $('.carousel').carousel({
      padding: 200
    });
    autoplay();
    function autoplay() {
      $('.carousel').carousel('next');
      setTimeout(autoplay, 3000);
    }

  }); // end of document ready
})(jQuery); // end of jQuery name space