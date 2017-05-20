$(document).ready(function() {
    $("a[class*='link-accueil']").click(function(event) {
        $(".accueil").removeClassRegExp(/^show/);
        $(".accueil").addClass("show-"+$(event.target).attr('class').split("-")[0]);
    });

    //appel du cropper et uploader pour la partie intro de la page d'accueil
    $.getScript('../js/image-crop.js', function() {

        var croppie;
        var savePath;

        $('#image-chooser-intro').on('change', function() {
            savePath  = "../images/accueil/intro/profile"+$.now()+".png";
            croppie = initCroppie($('#intro-croppie'), $('#image-chooser-intro'), 385, 283);
        });

        $('#btn-sbm-intro-img').on('click', function() {
            saveImg($('#intro-croppie'), croppie, savePath);
        });

    });

    $.getScript('../js/upload-txt.js', function() {

        $('#btn-sbm-intro-txt').click(function() {
            uploadTxt($('#intro-title').val(), $('#intro-textarea').val(), 'intro', '1');
        });
    });

});

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
};
