/**
 * Section: Related Projects — scroll reveal (GSAP ScrollTrigger).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from('.alify-related-card', {
		scrollTrigger: {
			trigger: '.alify-related-projects',
			start: 'top 80%'
		},
		y: 28,
		opacity: 0,
		duration: 0.7,
		stagger: 0.12,
		ease: 'power2.out'
	});
})();
