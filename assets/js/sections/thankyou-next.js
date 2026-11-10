/**
 * ALIFY — Thank-you "what happens next" (GSAP reveals).
 */
(function () {
	'use strict';

	var root = document.querySelector('.alify-thankyou-next');
	if (!root || !window.gsap) {
		return;
	}

	var steps = root.querySelectorAll('.alify-thankyou-next__step');
	if (steps.length) {
		window.gsap.fromTo(
			steps,
			{ autoAlpha: 0, y: 30 },
			{
				autoAlpha: 1,
				y: 0,
				duration: 0.7,
				ease: 'power3.out',
				stagger: 0.12,
				scrollTrigger: { trigger: root, start: 'top 78%', once: true },
			}
		);
	}
})();
