/**
 * Section: Home Featured Work — pinned horizontal scroll (desktop) via
 * GSAP ScrollTrigger. Mobile keeps the CSS swipe carousel.
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	var section = document.querySelector('.alify-work');
	var track = document.querySelector('.alify-work__track');
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	if (!section || !track || reduceMotion || !window.matchMedia('(min-width: 992px)').matches) {
		return;
	}

	var distance = function () {
		return Math.max(0, track.scrollWidth - window.innerWidth + window.innerWidth * 0.12);
	};

	gsap.to(track, {
		x: function () {
			return -distance();
		},
		ease: 'none',
		scrollTrigger: {
			trigger: section,
			start: 'top top',
			end: function () {
				return '+=' + distance();
			},
			pin: true,
			scrub: 1,
			invalidateOnRefresh: true
		}
	});

	gsap.from('.alify-work-card', {
		scrollTrigger: {
			trigger: section,
			start: 'top 70%'
		},
		y: 36,
		opacity: 0,
		duration: 0.8,
		stagger: 0.12,
		ease: 'power2.out'
	});
})();
