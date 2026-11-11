/**
 * Section: Home Services — hover image swap + scroll reveal (GSAP).
 */
(function () {
	'use strict';

	if (typeof gsap === 'undefined') {
		return;
	}

	var rows = document.querySelectorAll('.alify-service-row');
	var preview = document.querySelector('.alify-services__preview img');

	if (rows.length && preview) {
		rows.forEach(function (row) {
			row.addEventListener('mouseenter', function () {
				var img = row.getAttribute('data-image');

				rows.forEach(function (r) {
					r.classList.remove('is-active');
				});
				row.classList.add('is-active');

				if (img && preview.getAttribute('src') !== img) {
					gsap.to(preview, {
						opacity: 0,
						duration: 0.18,
						onComplete: function () {
							preview.setAttribute('src', img);
							gsap.to(preview, { opacity: 1, duration: 0.28 });
						}
					});
				}
			});
		});
	}

	if (typeof ScrollTrigger !== 'undefined') {
		gsap.from('.alify-service-row', {
			scrollTrigger: {
				trigger: '.alify-services',
				start: 'top 78%'
			},
			y: 32,
			opacity: 0,
			duration: 0.7,
			stagger: 0.1,
			ease: 'power2.out'
		});

		gsap.from('.alify-services__preview', {
			scrollTrigger: {
				trigger: '.alify-services',
				start: 'top 78%'
			},
			y: 40,
			opacity: 0,
			duration: 0.9,
			ease: 'power2.out'
		});
	}
})();
