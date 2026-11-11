/**
 * ALIFY — FAQs page (grouped accordion + GSAP reveals).
 */
(function () {
	'use strict';

	var items = Array.prototype.slice.call(document.querySelectorAll('.alify-faqs__item'));
	if (!items.length) {
		return;
	}

	items.forEach(function (item) {
		var button = item.querySelector('.alify-faqs__question');
		if (!button) {
			return;
		}
		button.addEventListener('click', function () {
			var isOpen = item.classList.contains('is-open');

			items.forEach(function (other) {
				other.classList.remove('is-open');
				var otherButton = other.querySelector('.alify-faqs__question');
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

	// Group entrance reveal — once, then settle.
	if (window.gsap) {
		var groups = Array.prototype.slice.call(document.querySelectorAll('.alify-faqs__group'));
		if (groups.length) {
			window.gsap.fromTo(
				groups,
				{ autoAlpha: 0, y: 30 },
				{
					autoAlpha: 1,
					y: 0,
					duration: 0.7,
					ease: 'power3.out',
					stagger: 0.12,
					scrollTrigger: { trigger: '.alify-faqs', start: 'top 78%', once: true },
				}
			);
		}
	}
})();
