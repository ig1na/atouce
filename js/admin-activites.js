$(document).ready(function() {

	$('#admin-activites').on('click', '#categorie-act-add-btn', function(){

		var numCats = $('.cat-act-form').length;

		if(numCats >= 5) {
			$('.too-much-cats').removeClass('hide');
			return;
		}

		$.ajax({
			url: '../admin/add-cat-actu.php',
			type: 'POST',
			data: {
				numCats: numCats
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