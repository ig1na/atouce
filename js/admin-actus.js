$(document).ready(function(){

	$('#admin-actus').on('click', '#actus-add-btn', function() {
		$.ajax({
			url: '../admin/add-actu.php',
			type: 'POST',
		})
		.done(function() {
			console.log('success');
			//$('.actus').load('index.php .actu-update');
			$('.actus').load('index.php .actus > *');

		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});
	}).on('click', '.select-menu option', function(){
		$('.actu-update').attr('class', 'actu-update fadeOut');
		
		$('#' + $(this).attr('value')).removeClass('fadeOut');

	}).on('change', '.image-file', function() {
		var $this = $(this);
		var $croppie = initCroppie($this.siblings('.croppie'), $this, 290, 200);

		$this.siblings('.btn-sbm-img').removeClass('hide');
	}).on('click', '.btn-sbm-img', function() {
		var $this = $(this);
		var $croppie = $this.siblings('.croppie');
		var num = $this.closest('.actu-update').attr('num');

		saveImg($croppie, 'news/', num, function() {
			$croppie.attr('class', 'croppie');
			$croppie.load("index.php #actu-update-"+num+" .croppie > img");
		});
		$this.addClass('hide');
	}).on('click', '.btn-sbm-txt', function() {
		var $this = $(this);
		var $txtUpload = $this.closest('.txt-upload');
		var num = $this.closest('.actu-update').attr('num');
		var title = $txtUpload.find('input[name="title"]').val();
		var text_desc = $txtUpload.find('textarea[name="texte_desc"]').val();
		var text = $txtUpload.find('textarea[name="texte"]').val();

		$.ajax({
			url: '../admin/upload-txt-actus.php',
			type: 'POST',
			data: {
				num: num,
				title: title,
				text_desc: text_desc,
				text: text
			}
		})
		.done(function() {
			console.log("success");
			$('.actus').load('index.php .actus > *');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});




});