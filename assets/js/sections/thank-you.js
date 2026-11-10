/**
 * Section: Thank You — entrance reveal (GSAP + ScrollTrigger).
 * Project guideline #4: reveals/parallax via GSAP, per-section JS file.
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	gsap.registerPlugin(ScrollTrigger);

	gsap.from('.alify-thank-you__inner > *', {
		scrollTrigger: {
			trigger: '.alify-thank-you',
			start: 'top 85%'
		},
		y: 32,
		opacity: 0,
		duration: 0.8,
		ease: 'power2.out',
		stagger: 0.15
	});
})();
