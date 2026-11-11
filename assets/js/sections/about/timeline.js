/**
 * Section: About Timeline — scroll reveal (GSAP ScrollTrigger).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from('.alify-timeline__item', {
		scrollTrigger: {
			trigger: '.alify-timeline',
			start: 'top 78%'
		},
		x: -28,
		opacity: 0,
		duration: 0.7,
		stagger: 0.12,
		ease: 'power2.out'
	});
})();
