window.Bororo = window.Bororo || {};

(function ( jQuery, window, undefined ) {
	"";
	"use strict";

	var $window = jQuery(window),
	objWindow = jQuery($window),
	nodeRoot = jQuery("html, body"),
	objslider = null,

	infiniteScrollRunning = false,

	objSections = jQuery("section[class*=section-]"),
	selectMenuItemOnScrollCounter = null,

	HeadJS = {
		InitFeatures : function() {
			head.feature('placeholder', function() {
				var t = document.createElement('textarea');
				return (t.placeholder !== undefined);
			});

			if (!head.placeholder) {
				jQuery('[placeholder]').focus(function() {
					var input = jQuery(this);

					if (input.val() == input.attr('placeholder')) {
						input.val('').removeClass('placeholder');
					}
				}).blur(function() {
					var input = jQuery(this);

					if (input.val() == '' || input.val() == input.attr('placeholder')) {
						input.addClass('placeholder').val(input.attr('placeholder'));
					}
				}).blur().parents('form').submit(function() {
					jQuery(this).find('[placeholder]').each(function() {
						var input = jQuery(this);

						if (input.val() == input.attr('placeholder')) {
							input.val('');
						}
					});
				});
			}
		}
	},

	Microsoft = {
		FixWindowsPhone8Bug : function() {
			if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
				var msViewportStyle = document.createElement("style");
				msViewportStyle.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}"));
				document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
			}
		}
	},

	Effects = {
		Nav : function() {
			jQuery('.toggle-menu').click(function(event) {
				jQuery('body').toggleClass('nav-expanded');
				jQuery('.nav-main').fadeToggle();
			});
			jQuery('.nav-main .close-menu').click(function(event) {
				jQuery('body').toggleClass('nav-expanded');
				jQuery('.nav-main').fadeToggle();
			});

			jQuery('.nav-item').hover(function() {
				jQuery(this).toggleClass('nav-item-hovered');
			});
		},

		AdjustPageHeight : function(section, callback) {
			//if (window.innerWidth >= 992) {
				jQuery(section).innerHeight(window.innerHeight);
			//}
			if (callback) callback.call(this);
		},

		SantoTabs : function() {
			var currentHash = window.location.hash;

			if (currentHash != "") {
				jQuery(".nav-tabs li").removeClass('active');
				jQuery(".nav-tabs li>a[href='" + currentHash + "']").parent().addClass('active');

				jQuery(".tab-content .tab-pane").removeClass('active');
				jQuery(".tab-pane[id='" + currentHash.replace('#','') + "']").addClass('active');
			}

			jQuery('.nav-tabs>li>a').not('.direct-link').on('click', function(e){
				e.preventDefault();

				var index = jQuery(this).attr("href").replace('#',''),
				tabContent = jQuery(this).parents('.box-tabs').eq(0).find('.tab-content'),
				_self = jQuery(this),
				_selfParents = jQuery(this).parent().siblings();

				window.location.hash = this.hash;


				jQuery(tabContent).stop(true, true).fadeOut("fast", function() {
					jQuery(_selfParents).removeClass("active");
					jQuery(_self).parent().addClass("active");
					jQuery(this).find(".tab-pane").removeClass("active").hide();
					jQuery(this).find(".tab-pane[id='" + index + "']").addClass("active").show();
				});

				jQuery(tabContent).stop(true, true).fadeIn("fast");
			});
		},

		ArticleEmbedYoutube : function() {
			jQuery.each(jQuery('.content').find('iframe'), function(index, val) {
			  	if (jQuery(this).attr('src') && jQuery(this).attr('src').match(/youtube.com/) && jQuery(this).parent('article-embed-youtube').length == 0) {
			  		jQuery(this).wrap('<div class="article-embed-youtube"></div>');
				}
			});
		},
	},

	BrowserEvents = {
		Scroll : function() {
			objWindow.scroll(function(event) {
				var windowScrollTop = objWindow.scrollTop(),
				windowInnerWidth = window.innerWidth,
				windowInneHeight = window.innerHeight;
				
				if (windowInnerWidth >= 992) {
					Effects.HomeSeeMore_WindowOnScroll(windowScrollTop);
				}
			});

			objWindow.scroll();
		},

		Resize : function() {
		}
	},	

	InfiniteScroll = {
		Init : function() {
			jQuery(document).on('click', '.pagination-container button', function() {
				var containerOnPage = jQuery('.ajax-container:visible'),
				paginationOnPage = containerOnPage.closest('.row').siblings('.pagination-container'),
				navigationOnPage = containerOnPage.closest('.row').siblings('.navigation');

				if (navigationOnPage.find('a.next').length > 0) {
					if (infiniteScrollRunning == false) {
						infiniteScrollRunning = true;
						paginationOnPage.find('button>span').text('CARREGANDO...');
						setTimeout(InfiniteScroll.Ajax, 200);
					}
				}
				else {
					paginationOnPage.slideUp();
				}
			});
		},

		Ajax : function () {
			jQuery.ajax({
				type : 'GET',
				url : jQuery('.ajax-container:visible').closest('.row').siblings('.navigation').find('a.next').attr('href'),
				
				success : function(response) {
					response = jQuery.parseHTML(response);

					var itens = jQuery(response).find('.ajax-container .ajax-item'),
					navigation = jQuery(response).find('.navigation');

					var containerOnPage = jQuery('.ajax-container:visible'),
					paginationOnPage = containerOnPage.closest('.row').siblings('.pagination-container'),
					navigationOnPage = containerOnPage.closest('.row').siblings('.navigation');

					if (itens.length > 0) {
						itens.hide();
						containerOnPage.append(itens);
						containerOnPage.children('.ajax-item:hidden').fadeIn(function() {
							paginationOnPage.find('button>span').text('VER MAIS');
							infiniteScrollRunning = false;
						});
					}
					else {
						paginationOnPage.find('button>span').text('VER MAIS');
						paginationOnPage.slideUp();
						infiniteScrollRunning = false;
					}

					navigationOnPage.replaceWith(navigation);
				},
				
				error : function() {
					var containerOnPage = jQuery('.ajax-container:visible'),
					paginationOnPage = containerOnPage.closest('.row').siblings('.pagination-container');

					paginationOnPage.find('small').text('Mais');
					paginationOnPage.slideUp();

					infiniteScrollRunning = false;
				}
			});
		}
	},
	
	SlickSlider = {
		Init : function() {
			SlickSlider.SlickSliderMain();
		},

		SlickSliderMain : function() {
			jQuery('.slick-slider-main').slick({
				arrows: false,
				useCSS: true,
				draggable: false,
			  	onInit: function(slickSlider){
			  		jQuery('.slider-tabs-item').click(function(event) {
						var currentIndex = jQuery(this).attr('index');

						jQuery(this).siblings().removeClass('active');
						jQuery(this).addClass('active');

						jQuery('.slick-slider-main').slickGoTo(currentIndex);
					});
					jQuery('body').addClass('loaded');
				}
			});
		},
	},

	FancyBox = {
		Init : function() {
			//FancyBox.Content();
			FancyBox.Videos();
		},

		Content : function() {
			var windowWidth = Math.max( $window.width(), window.innerWidth ),
			modalContentPadding = window.innerWidth > 768 ? 0 : 0,
			modalContentWidthHeight = window.innerWidth > 768 ? '90%' : '100%';
			
			jQuery(".fancybox-content").fancybox({
				padding: modalContentPadding,
				maxWidth	: 1024,
				maxHeight	: 768,
				fitToView	: false,
				width		: modalContentWidthHeight,
				height		: modalContentWidthHeight,
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none',
				openMethod : 'dropIn',
				openSpeed : 250,
				closeMethod : 'dropOut',
				closeSpeed : 100,
				helpers : {
			        overlay : {
			            css : {
			                'background' : 'rgba(51, 51, 51, 0.9)'
			            }
			        }
			    }
			});
		},

		Videos : function() {
			var windowWidth = Math.max( $window.width(), window.innerWidth );
			
			if (window.innerWidth > 768) {
				jQuery(".fancybox-video").fancybox({
					padding: 10,
					width: 960,
					aspectRatio: true,
					
					openMethod : 'dropIn',
				    openSpeed : 250,
				    closeMethod : 'dropOut',
				    closeSpeed : 100,
				    helpers : {
			        overlay : {
			            css : {
			                'background' : 'rgba(51, 51, 51, 0.9)'
			            }
			        }
			    }
				});
			}
		},

	};

	Bororo.app = function() {
		return {
			init : function() {
				var isHomePage = jQuery('body').hasClass('home');

				Effects.AdjustPageHeight('.nav-main');

				if (isHomePage) {
					Effects.AdjustPageHeight('.section-main');
					jQuery('.lazyYT').lazyYT();
					var animateTimer = setInterval(function() {
						jQuery('.box-intro').show().addClass('animated fadeInLeft');
						clearInterval(animateTimer);

						jQuery('body').addClass('loaded2');
					}, 1000);
				}

				SlickSlider.Init();
				FancyBox.Init();
				Effects.SantoTabs();
				Effects.ArticleEmbedYoutube();
				Effects.Nav();

				InfiniteScroll.Init();
			}
		};
	};
}(jQuery, window, undefined));

bororo = new Bororo.app();
bororo.init();
