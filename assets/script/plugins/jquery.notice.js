/**
*	jQuery.noticeAdd() and jQuery.noticeRemove()
*	These functions create and remove growl-like notices
**/
(function(jQuery)
{
	jQuery.extend({			
		noticeAdd: function(options)
		{	
			var defaults = {
				inEffect: 			{opacity: 'show'},	// in effect
				inEffectDuration: 	600,				// in effect duration in miliseconds
				stayTime: 			5000,				// time in miliseconds before the item has to disappear
				text: 				'',					// content of the item
				stay: 				false,				// should the notice item stay or not?
				type: 				'' 			// could also be error, success
			}
			
			// declare varaibles
			var options, noticeWrapAll, noticeItemOuter, noticeItemInner, noticeItemClose;
								
			options 		= jQuery.extend({}, defaults, options);
			noticeWrapAll	= (!jQuery('.notice-wrap').length) ? jQuery('<div></div>').addClass('notice-wrap').appendTo('body') : jQuery('.notice-wrap');
			noticeItemOuter	= jQuery('<div></div>').addClass('notice-item-wrapper');
			noticeItemInner	= jQuery('<div></div>').hide().addClass('notice-item ' + options.type).appendTo(noticeWrapAll).html('<p>'+options.text+'</p>').animate(options.inEffect, options.inEffectDuration).wrap(noticeItemOuter);
			noticeItemClose = jQuery('<div></div>').addClass('notice-item-close').prependTo(noticeItemInner).html('&times;').click(function () { jQuery.noticeRemove(noticeItemInner) });
			
			// hmmmz, zucht
			if(navigator.userAgent.match(/MSIE 6/i)) 
			{
		    	noticeWrapAll.css({top: document.documentElement.scrollTop});
		    }
			
			if(!options.stay)
			{
				setTimeout(function()
				{
					jQuery.noticeRemove(noticeItemInner);
				},
				options.stayTime);
			}
		},
		
		noticeRemove: function(obj)
		{
			obj.animate({opacity: '0'}, 1000, function()
			{
				obj.parent().animate({height: '0px'}, 300, function()
				{
					obj.parent().remove();
				});
			});
		},

		noticeUndo: function (options) {
		    var defaults = {
		        inEffect: { opacity: 'show' },	// in effect
		        inEffectDuration: 600,			// in effect duration in miliseconds
		        stayTime: 8000,				    // time in miliseconds before the item has to disappear
		        text: '',					    // content of the item
		        action: '',					    // Accion que hara al dar clic
		        stay: false,				    // should the notice item stay or not?
		        type: '' 					    // could also be error, success
		    }

		    // declare varaibles
		    var options, noticeWrapAll, noticeItemOuter, noticeItemInner, noticeItemClose;

		    options = jQuery.extend({}, defaults, options);
		    noticeWrapAll = (!jQuery('.notice-wrap-undo').length) ? jQuery('<div></div>').addClass('notice-wrap-undo').appendTo('body') : jQuery('.notice-wrap-undo');
		    noticeItemOuter = jQuery('<div></div>').addClass('notice-item-wrapper');
		    noticeItemInner = jQuery('<div></div>').hide().addClass('notice-item ' + options.type).appendTo(noticeWrapAll).html('<p>' + options.text + ' <label id="lbl_accion"> ' + options.action + ' </label></p>').animate(options.inEffect, options.inEffectDuration).wrap(noticeItemOuter);
		    noticeItemClose = jQuery('<div></div>').addClass('notice-item-close').prependTo(noticeItemInner).html('&times;').click(function () { jQuery.noticeRemove(noticeItemInner) });

		    $("#lbl_accion").click(function () {
		        jQuery.noticeRemove(noticeItemInner);
		    });

		    // hmmmz, zucht
		    if (navigator.userAgent.match(/MSIE 6/i)) {
		        noticeWrapAll.css({ top: document.documentElement.scrollTop });
		    }

		    if (!options.stay) {
		        setTimeout(function () {
		            jQuery.noticeRemove(noticeItemInner);
		        },
				options.stayTime);
		    }
		}



	});
})(jQuery);