/**
 * Section: Case Story — scroll reveal (GSAP ScrollTrigger).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from(['.alify-case-story__content', '.alify-case-story__aside'], {
		scrollTrigger: {
			trigger: '.alify-case-story',
			start: 'top 78%'
		},
		y: 28,
		opacity: 0,
		duration: 0.75,
		stagger: 0.15,
		ease: 'power2.out'
	});
})();
