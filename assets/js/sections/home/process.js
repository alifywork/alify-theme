/**
 * Section: Home Process — scroll reveal for the sticky step cards (GSAP).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from('.alify-process__card', {
		scrollTrigger: {
			trigger: '.alify-process',
			start: 'top 75%'
		},
		y: 40,
		opacity: 0,
		duration: 0.8,
		stagger: 0.15,
		ease: 'power2.out'
	});
})();
