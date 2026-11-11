/**
 * ALIFY — global scripts: GSAP smooth scrolling (ScrollSmoother) and shared
 * animation defaults. Per-section JS lives in js/sections/.
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined') {
		return;
	}

	if (typeof ScrollTrigger !== 'undefined') {
		gsap.registerPlugin(ScrollTrigger);
	}

	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	if (!reduceMotion && typeof ScrollSmoother !== 'undefined' &&
		document.getElementById('smooth-wrapper') && document.getElementById('smooth-content')) {
		ScrollSmoother.create({
			wrapper: '#smooth-wrapper',
			content: '#smooth-content',
			smooth: 1.1,
			effects: true,
			smoothTouch: 0.08
		});
	}
})();
