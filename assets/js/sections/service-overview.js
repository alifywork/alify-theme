/**
 * Section: Service Overview — scroll reveal (GSAP ScrollTrigger).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from(['.alify-service-overview__content', '.alify-service-overview__card'], {
		scrollTrigger: {
			trigger: '.alify-service-overview',
			start: 'top 78%'
		},
		y: 30,
		opacity: 0,
		duration: 0.75,
		stagger: 0.15,
		ease: 'power2.out'
	});
})();
