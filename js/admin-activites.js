$(document).ready(function() {

	$('.act-col-list .txt').each(function() {
		var $this = $(this);
		var nbChar = $this.val().length;
		var totalNbChar = $this.attr('maxlength');

		var $remainingNbChar = $this.next().children('.nb-remaining-chars');

		$remainingNbChar.text(totalNbChar - nbChar);
	});

	$('.act-date').each(function(){
		var $this = $(this);
		var value = $this.attr('date');

		$this.datepicker({
			showOptions: {
				direction: 'up'
			},
			showOn: 'focus',
			dateFormat: 'dd/mm/yy'
		});

		$this.val($.datepicker.formatDate('dd/mm/yy', $.datepicker.parseDate('yy-mm-dd', value)));
	});

	$('.new-act-date').each(function() {
		$(this).datepicker({
			showOptions: {
				direction: 'up'
			},
			showOn: 'focus',
			dateFormat: 'dd/mm/yy'
		});
	});
	
	$( "#dialog-del-act" ).dialog({
		autoOpen: false
	});

	$( "#dialog-del-cat" ).dialog({
		autoOpen: false
	});

	$('.cats-selector:selected').each(function() {
		var $this = $(this);
		console.log($this.text());
		$('.act-col-list[cat='+ $this.text() +']').removeClass('fadeOut');
	});



	//////////////////////////////////////////////
	//Gestion des events de la partie categories//

	$('.cats').on('click', '.accueil-add-btn', function(){

		var $this = $(this);
		var numCats = $('.cat-act-form').length;

		if(numCats >= 5) {
			$('.too-much-cats').removeClass('hide');
			return;
		}

		$this.siblings('.new-cat-name').addClass('slide-right');


	}).on('change', '.image-file', function(){

		var $this = $(this);
		var $croppieDiv = $this.siblings('.croppie');

		initCroppie($croppieDiv, $this, 290, 200);

		$this.siblings('.btn-sbm-img').removeClass('hide');


	}).on('click', '.btn-sbm-img', function() {

		var $this = $(this);
		var $croppieDiv = $this.siblings('.croppie');
		var num = $this.closest('.cat-act-form').attr('num');

		saveImg($croppieDiv, 'cat_activites/', num, function() {
			$croppieDiv.attr('class', 'croppie');
			$croppieDiv.load('index.php .cats-act-list > .cat-act-form[num="'+num+'"] > .croppie > img');
		});

		$this.addClass('hide');


	}).on('click', '.valid-btn-top', function() {

		var $this = $(this);
		var catNamesArray = $this.closest('.cats').find('.cat-act-title').map(function() {
			return $(this).text();
		}).get();
		var catName = $this.siblings('input').val().trim();

		if(catNamesArray.indexOf(catName) != '-1'|| catName === undefined){
			$('.cat-name-exists').removeClass('hide');
			return;
		}

		$.ajax({
			url: '../admin/add-cat-activity.php',
			type: 'POST',
			data: {
				catName: catName
			}
		})
		.done(function() {
			console.log('success');
			reloadCats();
			reloadActs();
		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});


	}).on('click', '.btn-sbm-title', function() {
		var $this = $(this);
		var num = $this.closest('.cat-act-form').attr('num');
		var title = $this.closest('.cat-act-form').find('input[name=cat-title]').val();

		$.ajax({
			url: '../admin/upload-title-cat-act.php',
			type: 'POST',
			data: {
				title: title,
				num: num

			}
		})
		.done(function() {
			console.log('success');
			reloadCats();
			reloadActs();
		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});


	}).on('click', '.btn-del.category', function() {
		var $this = $(this);
		var num = $this.closest('.cat-act-form').attr('num');

		$('#dialog-del-cat').dialog('open');
		$('#dialog-del-cat').dialog('option', 'buttons', 
			[
				{
					text: 'Oui',
					click: function() {
						$(this).dialog('close');

						$.ajax({
							url: '../admin/delete-cat-activity.php',
							type: 'POST',
							data: {
								num: num
							}
						})
						.done(function() {
							console.log('success');
							reloadActs();
							reloadCats();

						})
						.fail(function() {
							console.log('error');
						})
						.always(function() {
							console.log('complete');
						});

					}
				}, 
				{
					text: 'Non',
					click: function() {
						$(this).dialog('close');
					}
				}
			]);

		
	});

	
	/////////////////////////////////////////////
	//Gestion des events de la partie activites//


	$('.activities').on('click', '.accueil-add-btn', function() {

		$('.cat-choice-new-act').addClass('slide-right');

	}).on('change', '.select-cat-menu select', function() {
		var $this = $(this);
		var selected = $this.find('option:selected').text();

		$('.act-col-list').attr('class', 'act-col-list fadeOut');

		$('.act-col-list[cat='+ selected +']').removeClass('fadeOut');

		$('.select-cat-menu-new-act').find('select').val(selected);

	}).on('click', '.valid-btn-top', function() {
		var $this = $(this);
		var selectedCat = $this.parent().find('option:selected').text();
		var $dateElem = $this.parent().find('.new-act-date');

		if(selectedCat === '') return;
		
		if($dateElem.val() === "") {
			$('.choose-a-date').removeClass('hide');
			return;
		}

		var date = $.datepicker.formatDate('yy-mm-dd', $dateElem.datepicker('getDate'));

		$.ajax({
			url: '../admin/add-activity.php',
			type: 'POST',
			data: {
				cat: selectedCat,
				date: date
			}
		})
		.done(function() {
			console.log('success');
			reloadCats();
			reloadActs(function() {
				$('.select-cat-menu select').val(selectedCat);
			});
		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});


	}).on('focus', '.new-act-date, .act-date', function() {
		$(this).datepicker({
			showOptions: {
				direction: 'up'
			},
			showOn: 'focus',
			dateFormat: 'dd/mm/yy'
		});


	}).on('input', '.txt', function() {
		var $this = $(this);
		var nbChar = $this.val().length;
		var totalNbChar = $this.attr('maxlength');

		var $remainingNbChar = $this.next().children('.nb-remaining-chars');

		$remainingNbChar.text(totalNbChar - nbChar);


	}).on('change', '.image-file-act', function() {
		var $this = $(this);
		var $croppieDiv = $this.siblings('.croppie');

		initCroppie($croppieDiv, $this, 290, 200);

		$this.next().removeClass('hide');


	}).on('click', '.btn-sbm-img', function() {
		var $this = $(this);
		var $croppieDiv = $this.siblings('.croppie');
		var num = $this.closest('.act-col').attr('num');
		var cat = $this.closest('.act-col').attr('cat');

		saveImg($croppieDiv, "activites/", num, function() {
			$this.addClass('hide');
			reloadCats();
			reloadActs(function() {
				$('.select-cat-menu select').val(cat);
			});

			
		});


	}).on('click', '.btn-sbm-txt', function() {
		var $this = $(this);
		var num = $this.closest('.act-col').attr('num');
		var cat = $this.closest('.act-col').attr('cat');
		var date = $.datepicker.formatDate( "yy-mm-dd", $this.siblings('.act-date').datepicker('getDate'));
		var title = $this.siblings('input[name=act-title]').val();
		var txt = $this.siblings('textarea[name=act-txt]').val();

		$.ajax({
			url: '../admin/update-act.php',
			type: 'POST',
			data: {
				num: num,
				date: date,
				title: title,
				txt: txt
			}
		})
		.done(function() {
			console.log("success");
			reloadCats();
			reloadActs( function() {
				$('.select-cat-menu select').val(cat);
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});


	}).on('click', '.btn-del.activity', function() {
		var $this = $(this);
		var num = $this.closest('.act-col').attr('num');
		var cat = $this.closest('.act-col').attr('cat');

		$('#dialog-del-act').dialog('open');
		$('#dialog-del-act').dialog('option', 'buttons', 
			[
				{
					text:"Oui",
					click: function() {
						$(this).dialog('close');
						$.ajax({
							url: '../admin/delete-activite.php',
							type: 'POST',
							data: {
								num: num
							}
						})
						.done(function() {
							console.log("success");
							reloadCats();
							reloadActs(function() {
								$('.select-cat-menu select').val(cat);
							});
						})
						.fail(function() {
							console.log("error");
						})
						.always(function() {
							console.log("complete");
						});
					}

				},
				{
					text: "Non",
					click: function() {
						$(this).dialog('close');
					}
				}
			]
		);
	});
});

function reloadCats(callback) {
	$('.cats').load('index.php .cats > *', function() {
		$( "#dialog-del-cat" ).dialog({
			autoOpen: false
		});

		if(!(callback === undefined)) callback();
	});						
}

function reloadActs(callback) {
	$('.activities').load('index.php .activities > *', function() {
		$( "#dialog-del-act" ).dialog({
			autoOpen: false
		});

		$('.act-date').each(function(){
			var $this = $(this);
			var value = $this.attr('date');

			$this.datepicker({
				showOptions: {
					direction: 'up'
				},
				showOn: 'focus',
				dateFormat: 'dd/mm/yy'
			});

			$this.val($.datepicker.formatDate('dd/mm/yy', $.datepicker.parseDate('yy-mm-dd', value)));
		});


		if(!(callback === undefined)) callback();

		$('.select-cat-menu select').change();
	});
}