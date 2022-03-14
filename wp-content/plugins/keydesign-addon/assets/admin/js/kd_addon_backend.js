jQuery(document).ready(function($) {
	$('#vc_templates-editor-button, #vc-templatera-editor-button, #vc_templates-more-layouts').on('click', function() {
		$('.templates-filter-list .filter').removeClass('active');
		$('.templates-filter-list .filter:first-child').addClass('active');
		var $btns = $('.templates-filter-list .filter').click(function() {
			if (this.id == 'all') {
				$('#KeydesignTemplates > .vc_ui-template').fadeIn(450);
			} else {
				var $el = $('.' + this.id).fadeIn(450);
				$('#KeydesignTemplates > .vc_ui-template').not($el).hide();
			}
			$btns.removeClass('active');
			$(this).addClass('active');
		})

	  $(".templates-filter-list .filter").not('#all').each(function(index, value) {
	  	var cat = $(this).attr('id');
	  	var cat_nr = $('#KeydesignTemplates').find('.'+cat).length;
	  	$(this).find('.block-counter').text(cat_nr);
	  });
	  var cat_all = $('#KeydesignTemplates').find('.vc_templates-template-type-keydesign_templates').length;
	  $('.templates-filter-list #all .block-counter').text(cat_all);
	});

	$('#vc_inline-frame-wrapper iframe').on( 'load', function() {
		var iframe = $('#vc_inline-frame-wrapper iframe').contents();
		iframe.find("#vc_templates-more-layouts").click(function() {
			$('.templates-filter-list .filter').removeClass('active');
			$('.templates-filter-list .filter:first-child').addClass('active');
			var $btns = $('.templates-filter-list .filter').click(function() {
				if (this.id == 'all') {
					$('#KeydesignTemplates > .vc_ui-template').fadeIn(450);
				} else {
					var $el = $('.' + this.id).fadeIn(450);
					$('#KeydesignTemplates > .vc_ui-template').not($el).hide();
				}
				$btns.removeClass('active');
				$(this).addClass('active');
			})
		});
	});

	if ($(".nav-color-field").length) {
    $('.nav-color-field').wpColorPicker();
	}

});
