$(document).ready(function() {

  var $checkboxes = $('.doc-type').not('#doc-type-all');
  var $docs = $('.doc');
  var $checkboxAll = $('#doc-type-all');

  var $cats = {};

  $docs.each(function() {
    var $this = $(this);
    var cat = $this.attr('cat');

    if(!$cats[cat]) $cats[cat] = $();
    $cats[cat] = $cats[cat].add($this);
  });

  $checkboxAll.on('change', function() {
    if($(this).prop('checked')) {
      $checkboxes.prop('checked', false);
      $docs.removeClass('hide');
      return;
    }
    $docs.addClass('hide');
  });

  $checkboxes.on('change', function() {
    if($checkboxAll.prop('checked')) {
      $checkboxAll.prop('checked', false).change();
    }
    var cat = $(this).attr('cat');
    var $checked = $(this).prop('checked');

    if(!$cats[cat]) $cats[cat] = $();
    $cats[cat].toggleClass('hide', !$checked);
    console.log($cats[cat]);
  });


});
