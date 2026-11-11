/**
 * Section: Home FAQ — accessible accordion behaviour (one panel open at a
 * time).
 */
(function () {
	'use strict';

	var items = document.querySelectorAll('.alify-faq__item');

	items.forEach(function (item) {
		var button = item.querySelector('.alify-faq__question');

		if (!button) {
			return;
		}

		button.addEventListener('click', function () {
			var isOpen = item.classList.contains('is-open');

			items.forEach(function (other) {
				other.classList.remove('is-open');
				var otherButton = other.querySelector('.alify-faq__question');
				if (otherButton) {
					otherButton.setAttribute('aria-expanded', 'false');
				}
			});

			if (!isOpen) {
				item.classList.add('is-open');
				button.setAttribute('aria-expanded', 'true');
			}
		});
	});

	if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
		gsap.from('.alify-faq__item', {
			scrollTrigger: {
				trigger: '.alify-faq',
				start: 'top 80%'
			},
			y: 24,
			opacity: 0,
			duration: 0.6,
			stagger: 0.08,
			ease: 'power2.out'
		});
	}
})();
