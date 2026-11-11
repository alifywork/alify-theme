/**
 * Section: Projects Grid — category chip filtering + reveal (GSAP).
 */
(function () {
	'use strict';

	var chips = document.querySelectorAll('.alify-projects-grid__chip');
	var cards = document.querySelectorAll('.alify-project-card');

	if (chips.length && cards.length) {
		chips.forEach(function (chip) {
			chip.addEventListener('click', function () {
				var category = chip.getAttribute('data-category');

				chips.forEach(function (c) {
					c.classList.remove('is-active');
				});
				chip.classList.add('is-active');

				cards.forEach(function (card) {
					var slugs = card.getAttribute('data-category') || '';
					var show = 'all' === category || slugs.split(' ').indexOf(category) !== -1;
					card.parentElement.hidden = !show;
				});

				if (typeof ScrollTrigger !== 'undefined') {
					ScrollTrigger.refresh();
				}
			});
		});
	}

	if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
		gsap.from('.alify-project-card', {
			scrollTrigger: {
				trigger: '.alify-projects-grid',
				start: 'top 80%'
			},
			y: 30,
			opacity: 0,
			duration: 0.7,
			stagger: 0.1,
			ease: 'power2.out'
		});
	}
})();
