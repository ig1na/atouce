$(document).ready(function() {

  $(".cat-img-link").click(function(event) {
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
  });



  /*$(".cat-img-link").click(function(event) {



    //alert(event.currentTarget.id);
    if( $(".page-activites" + event.currentTarget.id).is(":hidden") ) {

      $("[class^='page-activites']").hide();
      $(".page-activites" + event.currentTarget.id).fadeIn("slow");

    }
  });


  //slide de la liste des activités pour afficher l'activité choisie
  $(".act_link").click(function(event) {
    event.preventDefault();

    var id = event.currentTarget.id.split(":")[0];
    var titre = event.currentTarget.id.split(":")[1];

    //glissement vers la gauche de la liste d'activites

    $("html").animate({
      scrollTop: 0
    }, 500);

    $(".main").animate({

      left: "-=110%",
      right: "+=110%"
    }, 500, function() {

      //une fois le glissement terminé on met la hauteur à 0 pour que le footer revienne en place
      $(".main").animate({
        height: "hide"
      }, 10);
    });

    //glissement et affichage des détails de l'activité
    $(".main-act").animate({
      left: 0,
      right: 0,
    }, {
      duration: 500,
      queue: false,
      complete: function() {
        $(".main-act").css("position", "relative");
        $(".back-button").fadeIn(500);
      }
    });



    $.get( "../details-activite.php", { id: id, titre: titre } )
    .done(function( data ) {
      $(".main-act-content").append(data);
    });
  });

  $(".back-button").click(function(event) {

    $(".back-button").hide();

    $(".main").animate({
      height: "show",
    }, 0, function() {
      $(".main-act").css("position", "absolute");
    });



    $(".main-act").animate({
      left: "100%",
      right: 0,
    }, 500);

    $(".main").animate({
      left: 0,
      right: 0
    },  {
      duration: 500,
      queue: false,
      complete: function() {
        $(".main-act-content").empty();
      }
    });
  });*/
});
