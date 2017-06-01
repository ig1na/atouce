$(document).ready(function(){

  $('.news-button').each(function() {
    $('#' + $(this).attr('id')).on('click', function(event){
      var id = $(this).attr('id').split('-').pop();

      event.preventDefault();

      $('html, body').animate({
        scrollTop: $('html, body').offset().top
      }, 500);

      $('#full-news-' + id).removeClass('fadeOut');
      $('#full-news-' + id).addClass('fadeIn');

      $('.entire-page').addClass('hide-left');

      setTimeout(function() {
        $('.back-button').addClass('button-slide-down');
        $('.main').removeClass('fadeIn');
        $('.main').addClass('fadeOut');
      }, 500);
    });

    $('.back-button').on('click', function(event){
      $('.main').removeClass('fadeOut');
      $('.main').addClass('fadeIn');

      $('.entire-page').removeClass('hide-left');

      setTimeout(function() {
        $('.back-button').addClass('button-slide-down');
        $('.full-news').removeClass('fadeIn');
        $('.full-news').addClass('fadeOut');
      }, 500);
    });
  });
});
