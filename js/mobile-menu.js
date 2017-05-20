$(document).ready(function() {
    $("a.threelines-button").click(function() {
      if( $(".menu ul").is(":hidden")) {
        $(".menu ul").slideDown("slow");
      } else {
        $(".menu ul").slideUp("50");
      }
    });

});
