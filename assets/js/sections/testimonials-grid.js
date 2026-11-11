/**
 * ALIFY — Testimonials grid (GSAP card reveals).
 */
(function () {
	'use strict';

	var cards = Array.prototype.slice.call(document.querySelectorAll('.alify-testimonials-grid .alify-testimonial-card'));
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
			stagger: 0.1,
			scrollTrigger: { trigger: '.alify-testimonials-grid__cards', start: 'top 82%', once: true },
		}
	);
})();
