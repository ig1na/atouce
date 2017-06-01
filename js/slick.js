$(document).ready(function(){
  $('.carousel').slick({
    accessibility:true,
    //variableWidth:true,
    centerMode: true,
    centerPadding: '0',
    autoplay: true,
    autoplaySpeed: 4000,
  });

  $('.news-slider').slick({
    autoplay: true,
    autoplaySpeed: 4000,
    fade: true
  });
});
