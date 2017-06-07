$(document).ready(function() {

  //affiche la liste des activites par categorie

  var $imgLinks = $('.cat-img-link');

  var $pageActivites = [];
  $('.page-activites').each(function(){
    $pageActivites.push($(this));
  });

  $imgLinks.on('click', function() {
    $('.page-activites').toggleClass('fadeOut', true);
    $pageActivites[$(this).attr('number')].removeClass('fadeOut');
  });

  //affiche les details sur l'activite selectionnee

  var $actLinks = $('.act-link');

  var $mainActivites = [];
  $('.main-act-content').each(function() {
    $mainActivites.push($(this));
  });

  $actLinks.on('click', function(e) {
    e.preventDefault();

    $mainActivites[$(this).attr('number')].removeClass('fadeOut');

    $('html, body').animate({
      scrollTop: $('html, body').offset().top
    }, 500);

    $('.entire-page').addClass('slide-left');

    setTimeout(function() {

      $('.main').addClass('fadeOut');
      $('.back-button').addClass('button-slide-down');
    }, 500);
  });

  $('.back-button').on('click', function() {
    
    $('.main').removeClass('fadeOut');
    $('.entire-page').removeClass('slide-left');

    $('.main-act-content').addClass('fadeOut');
    

  });

});
