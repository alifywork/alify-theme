/**
 * Section: Project Details — scroll reveal (GSAP ScrollTrigger).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.from(['.alify-project-details__content', '.alify-project-details__meta'], {
		scrollTrigger: {
			trigger: '.alify-project-details',
			start: 'top 78%'
		},
		y: 28,
		opacity: 0,
		duration: 0.75,
		stagger: 0.15,
		ease: 'power2.out'
	});

	gsap.from('.alify-project-details__stat', {
		scrollTrigger: {
			trigger: '.alify-project-details__stats',
			start: 'top 88%'
		},
		y: 24,
		opacity: 0,
		duration: 0.65,
		stagger: 0.12,
		ease: 'power2.out'
	});
})();
