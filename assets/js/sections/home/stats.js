/**
 * Section: Home Stats — animated counters on scroll (GSAP ScrollTrigger).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
		return;
	}

	document.querySelectorAll('.alify-stat__value').forEach(function (el) {
		var target = parseFloat(el.getAttribute('data-count')) || 0;
		var decimals = parseInt(el.getAttribute('data-decimals') || '0', 10);
		var suffix = el.getAttribute('data-suffix') || '';
		var counter = { val: 0 };

		ScrollTrigger.create({
			trigger: el,
			start: 'top 92%',
			once: true,
			onEnter: function () {
				gsap.to(counter, {
					val: target,
					duration: 1.6,
					ease: 'power2.out',
					onUpdate: function () {
						el.textContent = counter.val.toFixed(decimals) + suffix;
					}
				});
			}
		});
	});

	gsap.from('.alify-stat', {
		scrollTrigger: {
			trigger: '.alify-stats',
			start: 'top 82%'
		},
		y: 28,
		opacity: 0,
		duration: 0.7,
		stagger: 0.12,
		ease: 'power2.out'
	});
})();
