/**
 * Section: Contact Hero — entrance reveal (GSAP).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined') {
		return;
	}

	gsap.from(['.alify-contact-hero__title', '.alify-contact-hero__sub'], {
		y: 26,
		opacity: 0,
		duration: 0.8,
		stagger: 0.12,
		delay: 0.15,
		ease: 'power2.out'
	});

	gsap.from('.alify-contact-hero__card', {
		y: 36,
		opacity: 0,
		duration: 0.9,
		delay: 0.35,
		ease: 'power2.out'
	});
})();
