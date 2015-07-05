/*
 * Require
 */

var $ = require('jquery');


/*
 * Modules
 */

var Map = require('./map');
//var Ratings = require('./ratings');
//var AjaxForms = require('./ajaxforms');


/*
 * Initialisation
 */

Map.initialise();
//Ratings.initialise();
initialiseAjaxForms();
initialiseRatingForm();


/*
 * Ajax Forms
 */

//Initialise Ajax Forms
function initialiseAjaxForms() {

	$('body').on('submit', 'form[data-ajax-form]', function(event) {

		var $form = $(event.currentTarget);
		var $submitButton =  $form.find('button[type="submit"]');
		var submitClass = $submitButton.data('submit-button-class');
		var formAction = $form.prop('action');

		//Add Class
		$submitButton.addClass(submitClass).text('Saving');

		// post ajax form and update content areas
		$.post(formAction, $form.serialize(), function(response, status, xhr) {
			$('<div></div>').append(response).find('[data-ajax-form-target]').each(function() {
				var $el = $(this);
				$('[data-ajax-form-target="' + $el.data('ajax-form-target') + '"]')
					.replaceWith($el);
				$el.trigger('ajax.replace');
			});
		});

		event.preventDefault();
	});
}


/*
 * Rating Form
 */

//Initialise Ratings Form
function initialiseRatingForm() {
	
	setRatingAverage();

	$('form[data-rating-form] input').click(function () {
		var userRating = this.value;
		var $form = $(event.currentTarget);
		
		$('form[data-rating-form] span').removeClass('checked');

		$(this).parent().addClass('checked');
		
		console.log(userRating);

		$form.submit();

		event.preventDefault();
	});

	$('body').on('submit', 'form[data-rating-form]', function(event) {
		var $form = $(event.currentTarget);
		var formAction = $form.prop('action');

		$.post(formAction, $form.serialize(), function(response, status, xhr) {});

		setRatingAverage();

		event.preventDefault();
	});
}

function setRatingAverage() {
	var average = $('form[data-rating-form]').data('rating-form');
	
	$('form[data-rating-form] span:gt(' + (5 - (average + 1)) + ')').addClass('checked');
}
