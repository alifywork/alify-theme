/**
 * Section: Home Pricing — category chip filtering (GSAP reveal on top).
 */
(function () {
	'use strict';

	var chips = document.querySelectorAll('.alify-pricing__chip');
	var plans = document.querySelectorAll('.alify-plan');

	if (chips.length && plans.length) {
		chips.forEach(function (chip) {
			chip.addEventListener('click', function () {
				var category = chip.getAttribute('data-category');

				chips.forEach(function (c) {
					c.classList.remove('is-active');
				});
				chip.classList.add('is-active');

				plans.forEach(function (plan) {
					var slugs = plan.getAttribute('data-category') || '';
					var show = 'all' === category || slugs.split(' ').indexOf(category) !== -1;
					plan.parentElement.hidden = !show;
				});

				if (typeof ScrollTrigger !== 'undefined') {
					ScrollTrigger.refresh();
				}
			});
		});
	}

	if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
		gsap.from('.alify-plan', {
			scrollTrigger: {
				trigger: '.alify-pricing',
				start: 'top 78%'
			},
			y: 34,
			opacity: 0,
			duration: 0.75,
			stagger: 0.14,
			ease: 'power2.out'
		});
	}
})();
