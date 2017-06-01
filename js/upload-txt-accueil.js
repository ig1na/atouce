function uploadTxt(title, text, zone, id) {

		$.ajax({
			url: '../admin/upload-txt-accueil.php',
			type: 'POST',
			data: {
				zone: zone,
				id: id,
				title: title,
				text: text
			}
		})
		.done(function() {
			console.log("success");
			console.log(zone + " " + id + " " + title + " " + text);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
};