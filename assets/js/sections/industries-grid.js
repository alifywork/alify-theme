/**
 * Section: Industries Grid — scroll reveal (GSAP ScrollTrigger).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from('.alify-industries-grid .alify-industry-card', {
		scrollTrigger: {
			trigger: '.alify-industries-grid',
			start: 'top 80%'
		},
		y: 28,
		opacity: 0,
		duration: 0.7,
		stagger: 0.08,
		ease: 'power2.out'
	});
})();
