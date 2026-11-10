/**
 * Section: About Story — scroll reveal (GSAP ScrollTrigger).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from(['.alify-story__text', '.alify-story__stat'], {
		scrollTrigger: {
			trigger: '.alify-story',
			start: 'top 78%'
		},
		y: 30,
		opacity: 0,
		duration: 0.75,
		stagger: 0.12,
		ease: 'power2.out'
	});
})();
