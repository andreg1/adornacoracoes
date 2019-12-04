$(document).ready(function(){
  $(".custom-menu-class > ul li:nth-of-type(4) > a ").click(function () {
    $(".sub-menu").toggle();
  });

  $(".responsive-toggle > a").click(function(){
    $(this).toggleClass("active");
  });

  $('.artists_slideshow').slick({
    dots: false,
    infinite: false,
    speed: 600,
    slidesToShow: 3,
    slidesToScroll: 3
  });

  $('.artist_text').after().click(function () {
    $('.artist_text').toggleClass('active');
  });
  remove_filter('the_content', 'wpautop');

  $('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer',
    gutter: '.gutter-sizer',
    percentPosition: true
  });

})
