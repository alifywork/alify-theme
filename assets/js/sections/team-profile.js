/**
 * ALIFY — Team member profile (kinetic name + reveals).
 * Entrance plays once, then settles.
 */
(function () {
	'use strict';

	var root = document.querySelector('.alify-team-profile');
	if (!root || typeof gsap === 'undefined') {
		return;
	}

	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var name = root.querySelector('.alify-team-profile__name');

	if (name && !reduceMotion && typeof SplitText !== 'undefined') {
		var split = new SplitText(name, { type: 'words', wordsClass: 'word' });
		gsap.from(split.words, {
			yPercent: 110,
			opacity: 0,
			duration: 0.85,
			ease: 'power3.out',
			stagger: 0.07,
			delay: 0.15,
		});
	} else if (name) {
		gsap.from(name, { y: 22, opacity: 0, duration: 0.75, delay: 0.15 });
	}

	gsap.from('.alify-team-profile__media', { y: 32, opacity: 0, duration: 0.85, delay: 0.3, ease: 'power3.out' });
	gsap.from('.alify-team-profile__role', { y: 18, opacity: 0, duration: 0.6, delay: 0.45, ease: 'power2.out' });
	gsap.from('.alify-team-profile__bio', { y: 22, opacity: 0, duration: 0.75, delay: 0.55, ease: 'power2.out' });
})();
