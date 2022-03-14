;(function ($) {

    "use strict";

    var combinators = [' ', '>', '+', '~']; // https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors#Combinators
    var fraternisers = ['+', '~']; // These combinators involve siblings.
    var complexTypes = ['ATTR', 'PSEUDO', 'ID', 'CLASS']; // These selectors are based upon attributes.
    
    //Check if browser supports "matches" function
    if (!Element.prototype.matches) {
        Element.prototype.matches = Element.prototype.matchesSelector ||
            Element.prototype.webkitMatchesSelector ||
            Element.prototype.mozMatchesSelector ||
            Element.prototype.msMatchesSelector;
    }

    // Understand what kind of selector the initializer is based upon.
    function grok(msobserver) {
        if (!$.find.tokenize) {
            // This is an old version of jQuery, so cannot parse the selector.
            // Therefore we must assume the worst case scenario. That is, that
            // this is a complicated selector. This feature was available in:
            // https://github.com/jquery/sizzle/issues/242
            msobserver.isCombinatorial = true;
            msobserver.isFraternal = true;
            msobserver.isComplex = true;
            return;
        }

        // Parse the selector.
        msobserver.isCombinatorial = false;
        msobserver.isFraternal = false;
        msobserver.isComplex = false;
        var token = $.find.tokenize(msobserver.selector);
        for (var i = 0; i < token.length; i++) {
            for (var j = 0; j < token[i].length; j++) {
                if (combinators.indexOf(token[i][j].type) != -1)
                    msobserver.isCombinatorial = true; // This selector uses combinators.

                if (fraternisers.indexOf(token[i][j].type) != -1)
                    msobserver.isFraternal = true; // This selector uses sibling combinators.

                if (complexTypes.indexOf(token[i][j].type) != -1)
                    msobserver.isComplex = true; // This selector is based on attributes.
            }
        }
    }

    // MutationSelectorObserver represents a selector and it's associated initialization callback.
    var MutationSelectorObserver = function (selector, callback, options) {
        this.selector = selector.trim();
        this.callback = callback;
        this.options = options;

        grok(this);
    };

    // List of MutationSelectorObservers.
    var msobservers = [];
    msobservers.initialize = function (selector, callback, options) {

        // Wrap the callback so that we can ensure that it is only
        // called once per element.
        var seen = [];
        var callbackOnce = function () {
            if (seen.indexOf(this) == -1) {
                seen.push(this);
                $(this).each(callback);
            }
        };

        // See if the selector matches any elements already on the page.
        $(options.target).find(selector).each(callbackOnce);

        // Then, add it to the list of selector observers.
        var msobserver = new MutationSelectorObserver(selector, callbackOnce, options)
        this.push(msobserver);

        // The MutationObserver watches for when new elements are added to the DOM.
        var observer = new MutationObserver(function (mutations) {
            var matches = [];

            // For each mutation.
            for (var m = 0; m < mutations.length; m++) {

                // If this is an attributes mutation, then the target is the node upon which the mutation occurred.
                if (mutations[m].type == 'attributes') {
                    // Check if the mutated node matchs.
                    if (mutations[m].target.matches(msobserver.selector))
                        matches.push(mutations[m].target);

                    // If the selector is fraternal, query siblings of the mutated node for matches.
                    if (msobserver.isFraternal)
                        matches.push.apply(matches, mutations[m].target.parentElement.querySelectorAll(msobserver.selector));
                    else
                        matches.push.apply(matches, mutations[m].target.querySelectorAll(msobserver.selector));
                }
                
                // If this is an childList mutation, then inspect added nodes.
                if (mutations[m].type == 'childList') {
                    // Search added nodes for matching selectors.
                    for (var n = 0; n < mutations[m].addedNodes.length; n++) {
                        if (!(mutations[m].addedNodes[n] instanceof Element)) continue;

                        // Check if the added node matches the selector
                        if (mutations[m].addedNodes[n].matches(msobserver.selector))
                            matches.push(mutations[m].addedNodes[n]);

                        // If the selector is fraternal, query siblings for matches.
                        if (msobserver.isFraternal)
                            matches.push.apply(matches, mutations[m].addedNodes[n].parentElement.querySelectorAll(msobserver.selector));
                        else
                            matches.push.apply(matches, mutations[m].addedNodes[n].querySelectorAll(msobserver.selector));
                    }
                }
            }

            // For each match, call the callback using jQuery.each() to initialize the element (once only.)
            for (var i = 0; i < matches.length; i++)
                $(matches[i]).each(msobserver.callback);
        });

        // Observe the target element.
        var defaultObeserverOpts = { childList: true, subtree: true, attributes: msobserver.isComplex };
        observer.observe(options.target, options.observer || defaultObeserverOpts );

        return observer;
    };

    // Deprecated API (does not work with jQuery >= 3.1.1):
    $.fn.initialize = function (callback, options) {
        return msobservers.initialize(this.selector, callback, $.extend({}, $.initialize.defaults, options));
    };

    // Supported API
    $.initialize = function (selector, callback, options) {
        return msobservers.initialize(selector, callback, $.extend({}, $.initialize.defaults, options));
    };

    // Options
    $.initialize.defaults = {
        target: document.documentElement, // Defaults to observe the entire document.
        observer: null // MutationObserverInit: Defaults to internal configuration if not provided.
    }

})(jQuery);


jQuery(document).ready(function($) {

    $.initialize(".parallax-overlay", function() {
      var size = $(this).attr('data-vc-kd-parallax');
      var height = $(this).closest('.kd_vc_parallax').innerHeight();
      $(this).css('height', size * height + 'px');
    });

    $.initialize(".kd_number_string", function() {
      jQuery(this).countTo();
    });

    $.initialize(".countdown", function() {
    var text_days = $(this).attr("data-text-days");
    var text_hours = $(this).attr("data-text-hours");
    var text_minutes = $(this).attr("data-text-minutes");
    var text_seconds = $(this).attr("data-text-seconds");
    var count_year = $(this).attr("data-count-year");
    var count_month = $(this).attr("data-count-month");
    var count_day = $(this).attr("data-count-day");
    var count_date = count_year + '/' + count_month + '/' + count_day;
    $(this).countdown(count_date, function(event) {
      $(this).html(
        event.strftime('<span class="CountdownContent">%D<span class="CountdownLabel">' + text_days + '</span></span><span class="CountdownSeparator">:</span><span class="CountdownContent">%H <span class="CountdownLabel">' + text_hours + '</span></span><span class="CountdownSeparator">:</span><span class="CountdownContent">%M <span class="CountdownLabel">' + text_minutes + '</span></span><span class="CountdownSeparator">:</span><span class="CountdownContent">%S <span class="CountdownLabel">' + text_seconds + '</span></span>')
      );
    });
  });

  $.initialize(".features-tabs", function() {
    $( "li.tab-control-item", this ).appendTo( $( ".tab-controls", this ) );
    $(this).easytabs({
      updateHash: false,
      animationSpeed: "fast",
      transitionIn: "fadeIn"
    });
  });

  $.initialize(".video-container", function() {
    var trigger = $("body").find('.video-container [data-toggle="modal"]');
    trigger.click(function() {
      var theModal = $(this).data("target");
      videoSRC = $(this).data("src");
      videoSRCauto = videoSRC + "?showinfo=0&autoplay=1&enablejsapi=1&wmode=opaque";
      $(theModal + ' iframe').attr('src', videoSRCauto);
      $(theModal + ' button.close').click(function() {
        $(theModal + ' iframe').attr('src', videoSRC);
      });
      $('.modal').click(function() {
        $(theModal + ' iframe').attr('src', videoSRC);
      });
    });
  });

  $.initialize(".kd-text-rotator", function() {
    $(this).addClass("start-rotator");
  });

  $.initialize(".kd_progress_bar", function() {  
    var percent = '0.' + $(this).find(".kd_progressbarfill").attr("data-value");
    var filltime = parseInt($(this).find(".kd_progressbarfill").attr("data-time"));
    var add_width = (percent * $(this).find(".kd_progressbarfill").parent().width()) + 'px';
    $(this).find(".kd_progressbarfill, .kd_progb_head").animate({
      width: add_width
    }, {
      duration: filltime,
      queue: false
    });
  });

  $.initialize(".sliding_box_child", function() {
     $(this).on("mouseenter", function() {
        $(this).addClass("active-elem");
     });        
     $(this).on("mouseleave", function() {
        $(this).removeClass("active-elem");
     });        
  });  

  $.initialize(".kd_pie_chart .kd_chart", function() {
      $(this).easyPieChart({
        barColor: "#000",
        trackColor: "rgba(210, 210, 210, 0.2)",
        animate: 2000,
        size: "160",
        lineCap: 'round',
        lineWidth: "2",
        scaleColor: false,
        onStep: function(from, to, percent) {
          $(this.el).find(".pc_percent").text(Math.round(percent));
        }
      });
    var chart = window.chart = $(".kd_pie_chart .kd_chart").data("easyPieChart");
  });

  $.initialize(".kd-price-switch input", function() {
      $(this).on('click', function() {
        $(this).parents(".kd-ps-wrapper").toggleClass('active');
        if( $(this).is(':checked') ) {
          $(this).parents(".vc_row-fluid").find(".pricing").addClass('secondary-price');
        } else {
          $(this).parents(".vc_row-fluid").find(".pricing").removeClass('secondary-price');
        }
      });
  });

  $.initialize(".feature-sections-wrapper", function() {
    $("li.nav-label", this).appendTo($(".sticky-tabs", this));
    $('.sticky-tabs li a[href*=\\#]').bind('click', function(e) {
      e.preventDefault();
      var target = $(this).attr("href");
      $('html, body').stop().animate({
        scrollTop: $(target).offset().top - 136
      }, 1000, 'easeOutCubic');
      return false;
  });

    var feature_container = $(".feature-sections-wrapper");
    var feature_nav = $(".feature-sections-tabs");
    var offset = feature_container.offset().top;

    $(window).scroll(function(event) {
      var scroll = $(window).scrollTop();
      var total = feature_container.height() + offset - 400;
      if (scroll > total) {
        feature_nav.addClass('sticky-hide')
      }
      if (scroll < total) {
        feature_nav.removeClass('sticky-hide')
      }
    });
  });

  // $.initialize(".team-carousel .tc-content", function() {  
  // var nr_items = $(this).data('vc-items');  	       
  //      $(this).owlCarousel('destroy');   
  //       $(this).owlCarousel({
  //           stageClass: "owl-wrapper",
  //           stageOuterClass: "owl-wrapper-outer",
  //           loadedClass: "owl-carousel",
  //           dots: false,
  //           nav: false,
  //           margin: 1,
  //           responsive:{
  //               0:{
  //                   items:1,
  //               },
  //               768:{
  //                   items:2,
  //               },
  //               1199:{
  //                   items:3,
  //               },
  //               1366:{
  //                   items: nr_items,
  //               }
		// 	},                
  //       }); 
  //   });

  $.initialize(".mg-gallery", function() {
    var msnry = new Masonry(this, {
      itemSelector: '.mg-single-img',
      columnWidth: '.mg-sizer',
      percentPosition: true,
      gutter: 30
    });
      setInterval(function(){
        msnry.reloadItems();
        msnry.layout();
      },500);
  });

  $.initialize(".kd_map", function() {
    var map_id = $(this).attr('id');
    setTimeout( function() {
        eval("initKdMap_" + map_id + "()");
      }, 1000);
  });

});






            