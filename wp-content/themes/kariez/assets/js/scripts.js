;(function ($) {

    'use strict';

	$('a[href=\\#]').on('click', function (e) {
		e.preventDefault();
	})

    var Kariez = {

        _init: function () {

            var offCanvas = {
                menuBar: $('.trigger-off-canvas'),
                drawer: $('.kariez-offcanvas-drawer'),
                drawerClass: '.kariez-offcanvas-drawer',
                menuDropdown: $('.dropdown-menu.depth_0'),
            };

            Kariez.menuDrawerOpen(offCanvas);
            Kariez.offcanvasMenuToggle(offCanvas);
            Kariez.headerSearchOpen();
            Kariez.backTopTopScroll();
            Kariez.counterUp();
            Kariez.preLoader();
            Kariez.menuOffset();
            Kariez.headRoom();
            Kariez.wow();
            Kariez.rtElementorParallax();
            Kariez.magnificPopup();
            Kariez.imageFunction();
            Kariez.hasAnimation();
            Kariez.rtMasonary();
			Kariez.rtIsotope();
            Kariez.swiperSlider($);
            Kariez.horizontalSwiperSlider();
            Kariez.heroSlider();
			Kariez.ProgressBar();
			Kariez.rtOpenTabs();
			Kariez.mousemove_team_hover_effect();
			Kariez.CustomCursor();
			Kariez.ServiceActive();
        },

		CustomCursor: function() {
			let clientX = -100;
			let clientY = -100;
			let lastX = -100;
			let lastY = -100;
			const cursor = document.querySelector('.cursor')

			const sections = document.querySelectorAll('.custom-cursor-swiper .swiper-wrapper'); // Common class for all Swiper sections

			if (!cursor || sections.length === 0) return;

			// const section = document.querySelector('.rt-testimonial-slider .swiper-wrapper');
			// const links = document.querySelectorAll('.rt-testimonial-slider .swiper-slide a');

			sections.forEach(section => {
				const links = section.querySelectorAll('.swiper-slide a');

				section.addEventListener('mouseenter', () => {
					cursor.classList.add('visible')
				})

				section.addEventListener('mouseleave', () => {
					cursor.classList.remove('visible')
				})

				links.forEach(link => {
					link.addEventListener('mouseenter', () => {
						cursor.classList.remove('visible');
					});

					link.addEventListener('mouseleave', () => {
						cursor.classList.add('visible');
					});
				});

			});

			// function for linear interpolation of values
			const lerp = (a, b, n) => {
				return (1 - n) * a + n * b;
			};

			const initCursor = () => {
				if (!cursor) return

				// add listener to track the current mouse position
				document.addEventListener('mousemove', e => {
					clientX = e.clientX;
					clientY = e.clientY;
				});

				// transform the cursor to the current mouse position
				// use requestAnimationFrame() for smooth performance
				const render = () => {
					// lesser delta, greater the delay that the custom cursor follows the real cursor
					const delta = 0.1;
					lastX = lerp(lastX, clientX, delta);
					lastY = lerp(lastY, clientY, delta);

					cursor.style.transform = `translate(${lastX}px, ${lastY}px)`;

					requestAnimationFrame(render);
				};
				requestAnimationFrame(render);
			};

			initCursor();
		},

		// rtMouseActive: function() {
		// 	$(".service-items").each(function () {
		// 		$(this)
		// 			.on("mouseover", function () {
		// 				$(".service-container").addClass("hover");
		// 				$(".service-items").removeClass("active");
		// 				$(this).parent().addClass("active");
		// 			})
		// 			.on("mouseleave", function () {
		// 				$(".service-container").removeClass("hover");
		// 			});
		// 	});
		// },

ServiceActive: function () {
	var service_active = function() {
		$('.creative-service-style-01 .service-img-box:first-child').addClass('service-img-active')
		var $teams = $('.creative-service-style-01 .service-items');

		if ($teams.length <= 0) {
			return;
		}

		$teams.each(function() {
			var blockHover = $(this);
			blockHover.children('.service-item').hover(function() {
				blockHover.find('.service-item').removeClass('item-active');
				$(this).addClass('item-active');
				var id = $(this).data('tab');
				$(this).parents('.creative-service-style-01').find('.service-img-box').removeClass('service-img-active');
				$('#'+id).addClass("service-img-active");
			});
		});
	};

	$(document).ready(function() {
		service_active();
	});

	$(window).on('elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction('frontend/element_ready/rt_creative-service.default', service_active);
	});
},





		rtElementorParallax: function () {
			if ($(".rt-parallax-bg-yes").length) {
				$(".rt-parallax-bg-yes").each(function () {
					var speed = $(this).data('speed');
					$(this).parallaxie({
						speed: speed ? speed : 0.5,
						offset: 0,
					});
				})
			}
		},


        magnificPopup: function (){
            var yPopup = $(".popup-youtube");
            if (yPopup.length) {
                yPopup.magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
            }
        },

		imageFunction: function () {
			$("[data-bg-image]").each(function () {
				let img = $(this).data("bg-image");
				$(this).css({
					backgroundImage: "url(" + img + ")",
				});
			});
		},

		// headRoom js
		headRoom: function () {
			if ($('body').hasClass('has-sticky-header')) {
				var myElement = document.querySelector(".headroom");
				var headroom = new Headroom(myElement);
				headroom.init();

				$(window).on('scroll', function () {
					var height = $(window).scrollTop();
					if (height < 86) {
						$('.site-header').removeClass('scrolling');
					} else {
						$('.site-header').addClass('scrolling');
					}
				});

				var intHeight = $('.headroom')[0].getBoundingClientRect().height;
				$('.fixed-header-space').height(intHeight);
			}
		},

		wow: function () {
			var wow = new WOW({
				boxClass: 'wow',
				animateClass: 'animated',
				offset: 0,
				mobile: false,
				live: true,
				scrollContainer: null,
			});
			wow.init();
		},




		// Team Hover
		mousemove_team_hover_effect: function () {
		if (jQuery( window ).width() > 0 ) {
			if ( (".rt-team-default").length > 0 ) {
				jQuery(".rt-team-default .team-item").each(function() {
					let $Purpose = jQuery(this);
					let $PurposeInner = $Purpose.find('.team-hover-effect');
					$Purpose.mousemove(function(event){
						let y = event.pageY - $Purpose.offset().top + 10;
						let x = event.pageX - $Purpose.offset().left + 10;
						$PurposeInner.css({'top': y,'left': x,'bottom': "auto",'right': "auto",'opacity': 1});
					})
						.mouseleave(function() {
							$PurposeInner.css({'top': 'auto','left': 10,'bottom': 10,'right': "auto",'opacity': 0});
						});
				});
			}
		}
	},


		menuOffset: function () {
            $(".dropdown-menu > li").each(function () {
                var $this = $(this),
                    $win = $(window);

                if ($this.offset().left + ($this.width() + 30) > $win.width() + $win.scrollLeft() - $this.width()) {
                    $this.addClass("dropdown-inverse");
                } else if ($this.offset().left < ($this.width() + 30)) {
                    $this.addClass("dropdown-inverse-left");
                } else {
                    $this.removeClass("dropdown-inverse");
                }
            });
        },

		/* Masonary */
		rtMasonary: function () {
			var gridIsoContainer = $(".rt-masonry-grid");
			if (gridIsoContainer.length) {
				var imageGallerIso = gridIsoContainer.imagesLoaded(function () {
					imageGallerIso.isotope({
						itemSelector: ".rt-grid-item",
						percentPosition: true,
						isAnimated: true,
						masonry: {
							columnWidth: ".rt-grid-item",
							horizontalOrder: true
						},
						animationOptions: {
							duration: 700,
							easing: 'linear',
							queue: false
						}
					});
				});
			}
		},

		/* Isotope */
		rtIsotope: function () {
			if (typeof $.fn.isotope == 'function') {
				var $parent = $('.rt-isotope-wrapper'),
					$isotope;
				var blogGallerIso = $(".rt-isotope-content", $parent).imagesLoaded(function () {
					$isotope = $(".rt-isotope-content", $parent).isotope({
						filter: "*",
						transitionDuration: "1s",
						hiddenStyle: {
							opacity: 0,
							transform: "scale(0.001)"
						},
						visibleStyle: {
							transform: "scale(1)",
							opacity: 1
						}
					});
					$('.rt-isotope-tab a').on('click', function () {
						var $parent = $(this).closest('.rt-isotope-wrapper'),
							selector = $(this).attr('data-filter');
						$parent.find('.rt-isotope-tab .current').removeClass('current');
						$(this).addClass('current');
						$isotope.isotope({
							filter: selector
						});

						return false;
					});

					$(".hide-all .rt-isotope-tab a").first().trigger('click');
				});
			}
		},


        menuDrawerOpen: function (offCanvas) {
            offCanvas.menuBar.on('click', e => {
                e.preventDefault();
                offCanvas.menuBar.toggleClass('is-open')
                offCanvas.drawer.toggleClass('is-open');
                e.stopPropagation()
            });

            $(document).on('click', e => {
                if (!$(e.target).closest(offCanvas.drawerClass).length) {
                    offCanvas.drawer.removeClass('is-open');
                    offCanvas.menuBar.removeClass('is-open')
                }
            });
        },

        offcanvasMenuToggle: function (offCanvas) {
            offCanvas.drawer.each(function () {
                const caret = $(this).find('.caret');
                caret.on('click', function (e) {
                    e.preventDefault();
                    $(this).closest('li').toggleClass('is-open');
                    $(this).parent().next().slideToggle(300);
                })
            })
        },

        headerSearchOpen: function () {
			$('a[href="#header-search"]').on("click", function (event) {
				event.preventDefault();
				$("#header-search").addClass("open");
				$('#header-search > form > input[type="search"]').focus();
			});

			$("#header-search, #header-search button.close").on("click keyup", function (event) {
				if (
					event.target === this ||
					event.target.className === "close" ||
					event.keyCode === 27
				) {
					$(this).removeClass("open");
				}
			});
        },


		backTopTopScroll: function () {
			var minSpeed 		= 500;
			var maxSpeed		= 1500;
			$(".kariez-bc-totop").off().on('click', function(e) {
				e.preventDefault();
				var speed		= ($(window).scrollTop()-$(window).height())/2;
				if(speed < minSpeed){speed = minSpeed;}
				if(speed > maxSpeed){speed = maxSpeed;}
				$("html, body").animate({ scrollTop: 0 }, speed);
				return false;
			});

			$(window).on('scroll', function(e) {
				var WinOffset	= $(window).scrollTop();
				var totop		= $('a.kariez-bc-totop');


				var scrollPercent = 100 * WinOffset / ($(document).height() - $(window).height());
				totop.find('.progress').css({height: `calc(${scrollPercent}% - 6px`});


				if(totop.length){
					if(WinOffset > 300){
						totop.addClass('active');
					}else{
						totop.removeClass('active');
					}
				}
			});
		},




	/* Counter */
		counterUp: function () {
			const counterContainer = $('.counter');
			if (counterContainer.length) {
				counterContainer.counterUp({
					delay: counterContainer.data('rtsteps'),
					time: counterContainer.data('rtspeed')
				});
			}
		},


		/* preloader */
		preLoader: function () {
			$('#preloader').fadeOut('slow', function () {
				$(this).remove();
			});
		},

		// with progress bar
		ProgressBar: function () {
			if ( $(".progress-appear").length === 0 ) {
				return false;
			}
			let counter = true;
			$(".progress-appear").appear();
			$(".progress-appear").on("appear", function () {
				if (counter) {
					// with skill bar
					$(".skill-per").each(function () {
						let $this = $(this);
						let per = $this.attr("data-per");
						$this.css("width", per + "%");
						$({ animatedValue: 0 }).animate(
							{
								Hover: per,
								animatedValue: per
							},
							{
								duration: 500,
								step: function () {
									$this.attr("data-per", Math.floor(this.animatedValue) + "%");
								},
								complete: function () {
									$this.attr("data-per", Math.floor(this.animatedValue) + "%");
								},
							},
						);
					});
					counter = false;
				}
			});
		},

		/* Tab action */
		rtOpenTabs: function () {
			var TabBlock = {
				s: {
					animLen: 300
				},

				init: function() {
					TabBlock.bindUIActions();
					TabBlock.hideInactive();
				},

				bindUIActions: function() {
					$('.tab-block-tabs').on('click', '.tab-block-tab', function(){
						TabBlock.switchTab($(this));
					});
				},

				hideInactive: function() {
					var $tabBlocks = $('.tab-block');
					$tabBlocks.each(function(i) {
					var
						$tabBlock = $($tabBlocks[i]),
						$panes = $tabBlock.find('.tab-block-pane'),
						$activeTab = $tabBlock.find('.tab-block-tab.is-active');
						$panes.hide();
						$($panes[$activeTab.index()]).show();
					});
				},

				switchTab: function($tab) {
					var $context = $tab.closest('.tab-block');
					if (!$tab.hasClass('is-active')) {
						$tab.siblings().removeClass('is-active');
						$tab.addClass('is-active');
						TabBlock.showPane($tab.index(), $context);
					}
				},

				showPane: function(i, $context) {
					var $panes = $context.find('.tab-block-pane');
					$panes.slideUp(TabBlock.s.animLen);
					$($panes[i]).slideDown(TabBlock.s.animLen);
				}
			};

			$(function() {
				TabBlock.init();
			});
		},

		/* windrow scroll animation */
		hasAnimation: function () {
			if (!!window.IntersectionObserver) {
				let observer = new IntersectionObserver((entries, observer) => {
					entries.forEach(entry => {
						if (entry.isIntersecting) {
							entry.target.classList.add("active-animation");
							observer.unobserve(entry.target);
						}
					});
				}, {
					rootMargin: "0px 0px -100px 0px"
				});
				document.querySelectorAll('.has-animation').forEach(block => {
					observer.observe(block)
				});
			} else {
				document.querySelectorAll('.has-animation').forEach(block => {
					block.classList.remove('has-animation')
				});
			}
		},

		/* Swiper slider */
		swiperSlider: function () {
			$('.rt-swiper-slider').each(function () {
				var $this = $(this);
				var settings = $this.data('xld');
				var autoplayconditon = settings['auto'];
				var $pagination = $this.find('.swiper-pagination')[0];
				var $next = $this.find('.swiper-button-next')[0];
				var $prev = $this.find('.swiper-button-prev')[0];
				var swiper = new Swiper(this, {
					autoplay: autoplayconditon ? { delay:settings['autoplay']['delay'] } : false,
					speed: settings['speed'],
					loop: settings['loop'],
					pauseOnMouseEnter: true,
					effect: typeof settings['effect'] == "undefined" ? 'slide' : settings['effect'],
					slidesPerView: settings['slidesPerView'],
					spaceBetween: settings['spaceBetween'],
					centeredSlides: settings['centeredSlides'],
					slidesPerGroup: settings['slidesPerGroup'],
					rtl: true,
					pagination: {
						el: $pagination,
						clickable: true,
						type: 'bullets',
					},
					navigation: {
						nextEl: $next,
						prevEl: $prev,
					},
					scrollbar: {
						el: '.swiper-scrollbar',
						draggable: true,
					},
					breakpoints: {
						0: {
							slidesPerView: settings['breakpoints']['0']['slidesPerView'],
						},
						425: {
							slidesPerView: settings['breakpoints']['425']['slidesPerView'],
						},
						576: {
							slidesPerView: settings['breakpoints']['576']['slidesPerView'],
						},
						768: {
							slidesPerView: settings['breakpoints']['768']['slidesPerView'],
						},
						992: {
							slidesPerView: settings['breakpoints']['992']['slidesPerView'],
						},
						1200: {
							slidesPerView: settings['breakpoints']['1200']['slidesPerView'],
						},
						1600: {
							slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
						},
					},
				});
				swiper.init();
			});
		},

		/* Horizontal Thumbnail slider */
		horizontalSwiperSlider: function () {
			$('.rt-horizontal-slider').each(function () {
				var slider_wrap = $(this);
				var $pagination = slider_wrap.find('.swiper-pagination')[0];
				var $next = slider_wrap.find('.swiper-button-next')[0];
				var $prev = slider_wrap.find('.swiper-button-prev')[0];
				var target_thumb_slider = slider_wrap.find('.horizontal-thumb-slider');
				var thumb_slider = null;
				if (target_thumb_slider.length) {
					var settings = target_thumb_slider.data('xld');
					var autoplayconditon = settings['auto'];
					thumb_slider = new Swiper(target_thumb_slider[0],
						{
							autoplay: autoplayconditon ? { delay:settings['autoplay']['delay'] } : false,
							speed: settings['speed'],
							loop: settings['loop'],
							pauseOnMouseEnter: true,
							slidesPerView: settings['slidesPerView'],
							spaceBetween: settings['spaceBetween'],
							centeredSlides: settings['centeredSlides'],
							slidesPerGroup: settings['slidesPerGroup'],
							rtl: true,
							pagination: {
								el: $pagination,
								clickable: true,
								type: 'bullets',
							},
							navigation: {
								nextEl: $next,
								prevEl: $prev,
							},
							breakpoints: {
								0: {
									slidesPerView: settings['breakpoints']['0']['slidesPerView'],
								},
								425: {
									slidesPerView: settings['breakpoints']['425']['slidesPerView'],
								},
								576: {
									slidesPerView: settings['breakpoints']['576']['slidesPerView'],
								},
								768: {
									slidesPerView: settings['breakpoints']['768']['slidesPerView'],
								},
								992: {
									slidesPerView: settings['breakpoints']['992']['slidesPerView'],
								},
								1200: {
									slidesPerView: settings['breakpoints']['1200']['slidesPerView'],
								},
								1600: {
									slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
								},
							},

						});
				}

				var target_slider = slider_wrap.find('.horizontal-slider');
				if (target_slider.length) {
					var settings = target_slider.data('xld');
					new Swiper(target_slider[0], {
						autoplay: autoplayconditon ? { delay:settings['autoplay']['delay'] } : false,
						speed: settings['speed'],
						loop: settings['loop'],
						effect: settings && settings['effect'],
						rtl: true,
						// effect: 'fade',

						thumbs: {
							swiper: thumb_slider,
						},
						navigation: {
							nextEl: $next,
							prevEl: $prev,
						},
						pagination: {
							el: $pagination,
							clickable: true,
						},
					});
				}
			});
		},

		/* Swiper slider */
		heroSlider: function () {
			$('.rt-swiper-hero-slider').each(function () {
				var $this = $(this);
				var settings = $this.data('xld');
				var autoplayconditon = settings['auto'];
				var $pagination = $this.find('.swiper-pagination')[0];
				var $next = $this.find('.swiper-button-next')[0];
				var $prev = $this.find('.swiper-button-prev')[0];
				var swiper = new Swiper(this, {
					autoplay: autoplayconditon ? { delay:settings['autoplay']['delay'] } : false,
					speed: settings['speed'],
					loop: settings['loop'],
					pauseOnMouseEnter: true,
					effect: typeof settings['effect'] == "undefined" ? 'slide' : settings['effect'],
					slidesPerView: settings['slidesPerView'],
					spaceBetween: settings['spaceBetween'],
					centeredSlides: settings['centeredSlides'],
					slidesPerGroup: settings['slidesPerGroup'],
					rtl: true,
					pagination: {
						el: $pagination,
						clickable: true,
						renderBullet: function (index, className) {
							return '<span class="' + className + '">' + 0 + (index + 1) + "</span>";
						},
					},
					navigation: {
						nextEl: $next,
						prevEl: $prev,
					},
					scrollbar: {
						el: '.swiper-scrollbar',
						draggable: true,
					},

					breakpoints: {
						0: {
							slidesPerView: 1,
						},
						768: {
							slidesPerView: 1,
						},
						1200: {
							slidesPerView: 1,
						},
					},
				});
				swiper.init();
			});
		},
    };

    $(document).ready(function (e) {
        Kariez._init();
    });

    $(document).on('load', () => {
        Kariez.menuOffset();
    })

    $(window).on('scroll', (event) => {
        Kariez.backTopTopScroll(event);
    });

    $(window).on('resize', () => {
        Kariez.menuOffset($);
    });

    $(window).on('elementor/frontend/init', () => {
        if (elementorFrontend.isEditMode()) {
            //For all widgets
            elementorFrontend.hooks.addAction('frontend/element_ready/widget', () => {
                Kariez.rtElementorParallax();
                Kariez.magnificPopup();
				Kariez.backTopTopScroll();
				Kariez.hasAnimation();
				Kariez.counterUp();
				Kariez.imageFunction();
				Kariez.rtMasonary();
				Kariez.rtIsotope();
				Kariez.swiperSlider($);
				Kariez.horizontalSwiperSlider();
				Kariez.heroSlider();
				Kariez.ProgressBar();
				Kariez.rtOpenTabs();
				Kariez.mousemove_team_hover_effect();
				Kariez.CustomCursor();
				Kariez.ServiceActive();
            });

        }
    });

    window.Kariez = Kariez;

})(jQuery);
