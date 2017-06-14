$(document).ready(function() {

    //gestion du menu, fait glisser la page en fonction du menu choisi
    $adminHWrap = $('.admin-h-wrap');
    $adminVWrap = $('.admin-v-wrap');
    $linksCats = $('.admin-menu ul');

    var $vWrapsByCat = {};
    $adminVWrap.each(function(){
        var $this = $(this);
        var cat = $this.attr('cat');

        if(!$vWrapsByCat[cat]) $vWrapsByCat[cat] = $();
        $vWrapsByCat[cat] = $vWrapsByCat[cat].add($this);
    });

    $('.link-admin').on('click', function() {
        var $this = $(this);
        var cat = $this.attr('cat');
        var num = $this.attr('num');

        $adminVWrap.attr('class', 'admin-v-wrap fadeOut');
        $vWrapsByCat[cat].removeClass('fadeOut');
        $adminVWrap.addClass('show-v-' + num);


    });
    
});
