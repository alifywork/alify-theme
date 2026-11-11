/**
 * ALIFY — Blog single: article header (kinetic title + image parallax).
 * Entrance plays once, then settles.
 */
(function () {
	'use strict';

	var root = document.querySelector('.alify-post-header');
	if (!root || typeof gsap === 'undefined') {
		return;
	}

	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var title = root.querySelector('.alify-post-header__title');

	if (title && !reduceMotion && typeof SplitText !== 'undefined') {
		var split = new SplitText(title, { type: 'words', wordsClass: 'word' });
		gsap.from(split.words, {
			yPercent: 110,
			opacity: 0,
			duration: 0.9,
			ease: 'power3.out',
			stagger: 0.07,
			delay: 0.15,
		});
	} else if (title) {
		gsap.from(title, { y: 22, opacity: 0, duration: 0.75, delay: 0.15 });
	}

	gsap.from('.alify-post-header__meta', { y: 18, opacity: 0, duration: 0.7, delay: 0.35, ease: 'power2.out' });
	gsap.from('.alify-post-header__media', { y: 40, opacity: 0, duration: 0.9, delay: 0.55, ease: 'power3.out' });

	if (!reduceMotion && typeof ScrollTrigger !== 'undefined') {
		var img = root.querySelector('.alify-post-header__media img');
		if (img) {
			gsap.to(img, {
				yPercent: 8,
				ease: 'none',
				scrollTrigger: {
					trigger: '.alify-post-header__media',
					start: 'top bottom',
					end: 'bottom top',
					scrub: true,
				},
			});
		}
	}
})();
