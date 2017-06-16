$(document).ready(function() {

	$('#admin-activites').on('click', '#categorie-act-add-btn', function(){

		var numCats = $('.cat-act-form').length;

		if(numCats >= 5) {
			$('.too-much-cats').removeClass('hide');
			return;
		}

		

		$.ajax({
			url: '../admin/add-cat-activity.php',
			type: 'POST',
		})
		.done(function() {
			console.log('success');
			$('.cats').load('index.php .cats > *');
		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});


	}).on('click', '.btn-del', function() {
		var $this = $(this);
		var num = $this.closest('.cat-act-form').attr('num');

		$.ajax({
			url: '../admin/delete-cat-activity.php',
			type: 'POST',
			data: {
				num: num
			}
		})
		.done(function() {
			console.log('success');
			$('.cats').load('index.php .cats > *');
		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});
	});
});