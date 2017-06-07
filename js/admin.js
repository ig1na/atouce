$(document).ready(function() {

    
});





/*$(document).ready(function() {
    $("a[class*='link-accueil']").click(function(event) {
        $(".accueil").removeClassRegExp(/^show/);
        $(".accueil").addClass("show-"+$(event.target).attr('class').split("-")[0]);
    });

    //appel du cropper et uploader pour la partie intro de la page d'accueil

    $('#image-chooser-intro').on('change', function() {
        category = "accueil/intro";
        var croppie = initCroppie($('#intro-croppie'), $('#image-chooser-intro'), 290, 200);

        $('#btn-sbm-intro-img').show();
        $('#btn-sbm-intro-img').on('click', function() {
            saveImg($('#intro-croppie'), croppie, category, 'intro', '1');
            $('#btn-sbm-intro-img').hide();
        });
    });

    $('#btn-sbm-intro-img').on('click', function() {
        saveImg($('#intro-croppie'), croppie, category, 'intro', '1');
    });

    $('#btn-sbm-intro-txt').on('click', function() {
        uploadTxt($('#intro-title').val(), $('#intro-textarea').val(), 'intro', '1');
    });

    ///////////////
    var croppies = [];
    var id;

    $('.image-chooser-article').on('change', function(e) {
        id = getId(e);
        var newCroppie = initCroppie($('#article-croppie-'+ id), $('#image-chooser-article-'+ id), 290, 200);
        console.log(newCroppie);
        croppies.push({crop: newCroppie, id: id});

        $('#btn-sbm-article-img-'+ id).show();
    });

    $('.btn-sbm-article-img').on('click', function(e) {
        var idClicked = getId(e);
        var sentCroppie = croppies.filter(function(croppie){
          return croppie.id === idClicked;
        })[0].crop;

        console.log(sentCroppie);

        var category = "accueil/articles";
        saveImg($('#article-croppie-'+ id), sentCroppie, category, 'articles', id);
        $('#btn-sbm-article-img-'+ id).hide();
    });


    $('.btn-sbm-article-txt').on('click', function(e) {
        var id = getId(e);
        uploadTxt($('#article-title-input-'+ id).val(), $('#article-textarea-'+ id).val(), 'articles', id);
        console.log("upload txt");
    });

    $('.accueil-add-btn').on('click', function(e) {

      type = $(e.target).attr('id').split('-')[0];

      $.ajax({
        url: '../admin/add-accueil-content.php',
        type: 'POST',
        data: {type: type}
      })
      .done(function(){
        console.log('success');
        $(e.target).attr('id').load('../admin/index.php articles');
      })
      .fail(function(){

      })
      .always(function(){

      });
    });


});

function getId(event) {
    return $(event.target).attr('id').split('-').pop();
}

$.fn.removeClassRegExp = function (regexp) {
    if(regexp && (typeof regexp==='string' || typeof regexp==='object')) {
        regexp = typeof regexp === 'string' ? regexp = new RegExp(regexp) : regexp;
        $(this).each(function () {
            $(this).removeClass(function(i,c) {
                var classes = [];
                $.each(c.split(' '), function(i,c) {
                    if(regexp.test(c)) { classes.push(c); }
                });
                return classes.join(' ');
            });
        });
    }
    return this;
};*/
