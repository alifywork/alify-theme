/**
 * ALIFY — Blog posts grid (GSAP card reveals).
 */
(function () {
	'use strict';

	var cards = Array.prototype.slice.call(document.querySelectorAll('.alify-posts-grid .alify-post-card'));
	if (!cards.length || !window.gsap) {
		return;
	}

	window.gsap.fromTo(
		cards,
		{ autoAlpha: 0, y: 30 },
		{
			autoAlpha: 1,
			y: 0,
			duration: 0.7,
			ease: 'power3.out',
			stagger: 0.09,
			scrollTrigger: { trigger: '.alify-posts-grid__cards', start: 'top 82%', once: true },
		}
	);
})();
