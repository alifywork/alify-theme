/**
 * Section: Home Industries — scroll reveal for the icon cards (GSAP).
 * The chip marquee is pure CSS.
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from('.alify-industry-card', {
		scrollTrigger: {
			trigger: '.alify-industries',
			start: 'top 78%'
		},
		y: 30,
		opacity: 0,
		duration: 0.7,
		stagger: 0.08,
		ease: 'power2.out'
	});
})();
