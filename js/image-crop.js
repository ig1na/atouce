function saveImg(croppieDiv, crop, savePath) {

	crop.croppie('result', 'base64').then(function(canv) {
	    $.ajax({
	        url: '../admin/upload-img.php',
	        type: 'POST',
	        data: {canv: canv, savePath: savePath}
	    })
	    .done(function() {
	        console.log("success");
	        croppieDiv.removeClass('fadeIn');
	        croppieDiv.addClass('fadeOut');	                 
	    })
	    .fail(function() {
	        console.log("error");
	    })
	    .always(function() {
	        console.log("complete");
	    });
	});
};

function initCroppie(croppieDiv, inputFile, cropWidth, cropHeight) {

	var extension = inputFile[0].value.substring(inputFile[0].value.lastIndexOf(".") + 1).toLowerCase();
	console.log(["jpg", "jpeg", "png", "gif"].indexOf(extension));

	if(["jpg", "jpeg", "png", "gif"].indexOf(extension) >= 0) {

		if(typeof (FileReader) == undefined) {
			alert("this browser doesn't support FileReader");

			return;
		}

		console.log("fileReader defined");

		croppieDiv.empty();

		var reader = new FileReader();
		reader.readAsDataURL(inputFile[0].files[0]);
		
		var crop = croppieDiv.croppie({
	          viewport: { width: cropWidth, height: cropHeight},
	          boundary: { width: cropWidth + 20, height: cropHeight + 20}
	        });
		
		reader.onload = function(e) {

			console.log('reader onload');
			

	        crop.croppie('bind', {
	            url: e.target.result
	        });

	        

	        if(crop == undefined) {
        		console.log('crop undefined');
        	}
		};    

		croppieDiv.removeClass('fadeOut');
        croppieDiv.addClass('fadeIn');

		return crop;
		
	}
};