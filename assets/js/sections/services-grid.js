/**
 * Section: Services Grid — scroll reveal (GSAP ScrollTrigger).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from('.alify-service-card', {
		scrollTrigger: {
			trigger: '.alify-services-grid',
			start: 'top 80%'
		},
		y: 30,
		opacity: 0,
		duration: 0.7,
		stagger: 0.1,
		ease: 'power2.out'
	});
})();
