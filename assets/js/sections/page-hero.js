/**
 * Section: Shared page hero — kinetic title reveal (GSAP SplitText) +
 * background parallax. Entrance plays once, then settles.
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined') {
		return;
	}

	var title = document.querySelector('.alify-page-hero__title');
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	if (title && !reduceMotion && typeof SplitText !== 'undefined') {
		var split = new SplitText(title, { type: 'words', wordsClass: 'word' });
		gsap.from(split.words, {
			yPercent: 110,
			opacity: 0,
			duration: 0.85,
			ease: 'power3.out',
			stagger: 0.07,
			delay: 0.15
		});
	} else if (title) {
		gsap.from(title, { y: 22, opacity: 0, duration: 0.75, delay: 0.15 });
	}

	gsap.from('.alify-page-hero__sub', { y: 22, opacity: 0, duration: 0.8, delay: 0.45, ease: 'power2.out' });

	if (!reduceMotion && typeof ScrollTrigger !== 'undefined') {
		gsap.to('.alify-page-hero__bg img', {
			yPercent: 12,
			ease: 'none',
			scrollTrigger: {
				trigger: '.alify-page-hero',
				start: 'top top',
				end: 'bottom top',
				scrub: true
			}
		});
	}
})();
