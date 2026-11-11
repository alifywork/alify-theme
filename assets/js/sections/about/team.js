/**
 * Section: About Team — scroll reveal (GSAP ScrollTrigger).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from('.alify-team-card', {
		scrollTrigger: {
			trigger: '.alify-team',
			start: 'top 80%'
		},
		y: 28,
		opacity: 0,
		duration: 0.7,
		stagger: 0.1,
		ease: 'power2.out'
	});
})();
