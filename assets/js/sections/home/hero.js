/**
 * Section: Home Hero — kinetic title reveal (GSAP SplitText) + parallax.
 * Entrance plays once, then settles (project guideline #4).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined') {
		return;
	}

	var title = document.querySelector('.alify-hero__title');
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	if (title && !reduceMotion && typeof SplitText !== 'undefined') {
		var split = new SplitText(title, { type: 'words', wordsClass: 'word' });
		gsap.from(split.words, {
			yPercent: 110,
			opacity: 0,
			duration: 0.9,
			ease: 'power3.out',
			stagger: 0.08,
			delay: 0.15
		});
	} else if (title) {
		gsap.from(title, { y: 24, opacity: 0, duration: 0.8, delay: 0.15 });
	}

	gsap.from(['.alify-hero__eyebrow', '.alify-hero__sub', '.alify-hero__actions'], {
		y: 24,
		opacity: 0,
		duration: 0.8,
		ease: 'power2.out',
		stagger: 0.12,
		delay: 0.45
	});

	if (!reduceMotion && typeof ScrollTrigger !== 'undefined') {
		gsap.to('.alify-hero__bg img', {
			yPercent: 12,
			ease: 'none',
			scrollTrigger: {
				trigger: '.alify-hero',
				start: 'top top',
				end: 'bottom top',
				scrub: true
			}
		});
	}
})();
