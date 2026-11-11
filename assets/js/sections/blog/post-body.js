/**
 * ALIFY — Blog single: article body (copy link + content reveals).
 */
(function () {
	'use strict';

	var root = document.querySelector('.alify-post-body');
	if (!root) {
		return;
	}

	var copyBtn = root.querySelector('[data-copy-link]');
	var feedback = root.querySelector('[data-copy-feedback]');

	if (copyBtn) {
		copyBtn.addEventListener('click', function () {
			var done = function () {
				if (feedback) {
					feedback.textContent = 'Link copied!';
					window.setTimeout(function () {
						feedback.textContent = '';
					}, 2200);
				}
			};

			if (navigator.clipboard && navigator.clipboard.writeText) {
				navigator.clipboard.writeText(window.location.href).then(done, function () {});
			} else {
				var input = document.createElement('input');
				input.value = window.location.href;
				document.body.appendChild(input);
				input.select();
				try {
					document.execCommand('copy');
					done();
				} catch (err) {}
				document.body.removeChild(input);
			}
		});
	}

	// Content entrance reveal — once, then settles.
	if (window.gsap && typeof ScrollTrigger !== 'undefined') {
		var blocks = root.querySelectorAll('.alify-post-body__content > *');
		if (blocks.length) {
			window.gsap.fromTo(
				blocks,
				{ autoAlpha: 0, y: 22 },
				{
					autoAlpha: 1,
					y: 0,
					duration: 0.6,
					ease: 'power2.out',
					stagger: 0.05,
					scrollTrigger: { trigger: '.alify-post-body__content', start: 'top 82%', once: true },
				}
			);
		}
	}
})();
