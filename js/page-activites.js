$(document).ready(function() {

  var $imgLinks = $('.cat-img-link');

  var $pageActivites = [];
  $('.page-activites').each(function(){
    $pageActivites.push($(this));
  });

  $imgLinks.on('click', function() {
    $('.page-activites').toggleClass('fadeOut', true);
    $pageActivites[$(this).attr('number') - 1].removeClass('fadeOut');
  });


  /*$(".cat-img-link").click(function(event) {
    $("[class^='page-activites']").removeClass("fadeIn");
    $("[class^='page-activites']").addClass("fadeOut");
    $(".page-activites" + event.currentTarget.id).removeClass("fadeOut");
    $(".page-activites" + event.currentTarget.id).addClass("fadeIn");
  });

  $(".act-link").click(function(event) {
    event.preventDefault();

    var id = event.currentTarget.id.split(":")[0];
    var titre = event.currentTarget.id.split(":")[1];

    $("html, body").animate({
      scrollTop: $("html, body").offset().top
    }, 500);

    $(".entire-page").addClass("slide-left");

    $(".main-act-content" + id).removeClass("fadeOut");
    $(".main-act-content" + id).addClass("fadeIn");

    setTimeout(function() {
        $(".main").removeClass("fadeIn");
        $(".main").addClass("fadeOut");
    }, 500);

    setTimeout(function() {
      $(".back-button").addClass("button-slide-down");
    }, 500);

    $(".back-button").click(function() {
      $(".back-button").removeClass("button-slide-down");

      $(".main").removeClass("fadeOut");
      $(".main").addClass("fadeIn");
      $(".entire-page").removeClass("slide-left");

      setTimeout(function(){
        $(".main-act-content" + id).removeClass("fadeIn");
        $(".main-act-content" + id).addClass("fadeOut");
      }, 500);

    });
  });*/

});
