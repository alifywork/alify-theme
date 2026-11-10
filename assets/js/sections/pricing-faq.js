/**
 * ALIFY — Pricing FAQ strip (accordion).
 */
(function () {
	'use strict';

	var items = Array.prototype.slice.call(document.querySelectorAll('.alify-faq-strip__item'));
	if (!items.length) {
		return;
	}

	items.forEach(function (item) {
		var button = item.querySelector('.alify-faq-strip__question');
		if (!button) {
			return;
		}
		button.addEventListener('click', function () {
			var isOpen = item.classList.contains('is-open');

			items.forEach(function (other) {
				other.classList.remove('is-open');
				var otherButton = other.querySelector('.alify-faq-strip__question');
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
})();
