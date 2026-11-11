/**
 * ALIFY — Pricing plans section (category tabs + GSAP reveals).
 */
(function () {
	'use strict';

	var root = document.querySelector('.alify-plans');
	if (!root) {
		return;
	}

	var tabs = Array.prototype.slice.call(root.querySelectorAll('.alify-plans__tab'));
	var groups = Array.prototype.slice.call(root.querySelectorAll('.alify-plans__group, .alify-compare__group'));

	function activate(category, animate) {
		tabs.forEach(function (tab) {
			var active = tab.getAttribute('data-category') === category;
			tab.classList.toggle('is-active', active);
			tab.setAttribute('aria-selected', active ? 'true' : 'false');
		});

		groups.forEach(function (group) {
			var active = group.getAttribute('data-category') === category;
			group.classList.toggle('is-active', active);
		});

		if (animate && window.gsap) {
			var activeCards = root.querySelectorAll('.alify-plans__group.is-active .alify-plan-card');
			if (activeCards.length) {
				window.gsap.fromTo(
					activeCards,
					{ autoAlpha: 0, y: 22 },
					{ autoAlpha: 1, y: 0, duration: 0.55, ease: 'power3.out', stagger: 0.08, overwrite: true }
				);
			}
		}
	}

	tabs.forEach(function (tab) {
		tab.addEventListener('click', function () {
			activate(tab.getAttribute('data-category'), true);
		});
	});

	// Preselect the tab requested by the URL (category archive).
	var tablist = root.querySelector('.alify-plans__tabs');
	var initial = tablist ? tablist.getAttribute('data-active') : '';
	if (initial) {
		var match = tabs.filter(function (tab) {
			return tab.getAttribute('data-category') === initial;
		});
		if (match.length) {
			activate(initial, false);
		}
	}

	// Entrance reveal — once, then settle.
	if (window.gsap && root.querySelectorAll('.alify-plan-card').length) {
		window.gsap.fromTo(
			root.querySelectorAll('.alify-plans__cards .alify-plan-card'),
			{ autoAlpha: 0, y: 30 },
			{
				autoAlpha: 1,
				y: 0,
				duration: 0.7,
				ease: 'power3.out',
				stagger: 0.1,
				scrollTrigger: { trigger: root, start: 'top 78%', once: true },
			}
		);
	}
})();
