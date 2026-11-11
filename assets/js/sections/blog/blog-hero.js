/**
 * ALIFY — Blog hero section (kinetic title + featured reveal).
 * Entrance plays once, then settles.
 */
(function () {
	'use strict';

	var root = document.querySelector('.alify-blog-hero');
	if (!root || typeof gsap === 'undefined') {
		return;
	}

	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var title = root.querySelector('.alify-blog-hero__title');

	if (title && !reduceMotion && typeof SplitText !== 'undefined') {
		var split = new SplitText(title, { type: 'words', wordsClass: 'word' });
		gsap.from(split.words, {
			yPercent: 110,
			opacity: 0,
			duration: 0.85,
			ease: 'power3.out',
			stagger: 0.07,
			delay: 0.15,
		});
	} else if (title) {
		gsap.from(title, { y: 22, opacity: 0, duration: 0.75, delay: 0.15 });
	}

	gsap.from('.alify-blog-hero__sub', { y: 22, opacity: 0, duration: 0.8, delay: 0.45, ease: 'power2.out' });
	gsap.from('.alify-blog-hero__chip', {
		y: 16,
		opacity: 0,
		duration: 0.55,
		delay: 0.55,
		ease: 'power2.out',
		stagger: 0.05,
	});

	var featured = root.querySelector('.alify-blog-featured');
	if (featured) {
		gsap.from(featured, {
			y: 34,
			opacity: 0,
			duration: 0.85,
			delay: 0.65,
			ease: 'power3.out',
		});
	}
})();
