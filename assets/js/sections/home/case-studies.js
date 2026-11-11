/**
 * Section: Home Case Studies — scroll reveal for the spotlight cards (GSAP).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from('.alify-case-card', {
		scrollTrigger: {
			trigger: '.alify-case',
			start: 'top 75%'
		},
		y: 44,
		opacity: 0,
		duration: 0.85,
		stagger: 0.18,
		ease: 'power2.out'
	});
})();
