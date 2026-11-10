/**
 * Section: Site Header — sticky state on scroll + mobile menu toggle.
 */
(function () {
	'use strict';

	var header = document.getElementById('site-header');
	var toggle = document.getElementById('menu-toggle');
	var mobile = document.getElementById('mobile-menu');

	if (header) {
		var onScroll = function () {
			if (window.scrollY > 40) {
				header.classList.add('is-sticky');
			} else {
				header.classList.remove('is-sticky');
			}
		};
		onScroll();
		window.addEventListener('scroll', onScroll, { passive: true });
	}

	if (toggle && mobile) {
		toggle.addEventListener('click', function () {
			var isOpen = toggle.getAttribute('aria-expanded') === 'true';
			toggle.setAttribute('aria-expanded', String(!isOpen));
			mobile.hidden = isOpen;
			document.body.classList.toggle('menu-open', !isOpen);

			var icon = toggle.querySelector('i');
			if (icon) {
				icon.className = isOpen ? 'fa-solid fa-bars' : 'fa-solid fa-xmark';
			}
		});

		mobile.querySelectorAll('a').forEach(function (link) {
			link.addEventListener('click', function () {
				toggle.setAttribute('aria-expanded', 'false');
				mobile.hidden = true;
				document.body.classList.remove('menu-open');
				var icon = toggle.querySelector('i');
				if (icon) {
					icon.className = 'fa-solid fa-bars';
				}
			});
		});
	}
})();
