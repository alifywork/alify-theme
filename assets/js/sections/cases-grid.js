/**
 * Section: Case Studies Grid — scroll reveal (GSAP ScrollTrigger).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from('.alify-cases-grid .alify-case-card', {
		scrollTrigger: {
			trigger: '.alify-cases-grid',
			start: 'top 80%'
		},
		y: 34,
		opacity: 0,
		duration: 0.75,
		stagger: 0.14,
		ease: 'power2.out'
	});
})();
