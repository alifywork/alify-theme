/**
 * Section: About Values — bento stagger reveal (GSAP ScrollTrigger).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from('.alify-value-cell', {
		scrollTrigger: {
			trigger: '.alify-values',
			start: 'top 78%'
		},
		y: 34,
		opacity: 0,
		duration: 0.75,
		stagger: 0.1,
		ease: 'power2.out'
	});
})();
