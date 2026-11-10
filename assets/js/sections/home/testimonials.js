/**
 * Section: Home Testimonials — auto-play slider with arrows + reveal.
 */
(function () {
	'use strict';

	var viewport = document.querySelector('.alify-testimonials__viewport');
	var slides = document.querySelectorAll('.alify-testimonial');

	if (!viewport || slides.length < 2) {
		return;
	}

	var index = 0;
	var timer = null;

	var goTo = function (i) {
		index = (i + slides.length) % slides.length;
		viewport.scrollTo({ left: slides[index].offsetLeft - viewport.offsetLeft, behavior: 'smooth' });
	};

	var pause = function () {
		if (timer) {
			window.clearInterval(timer);
			timer = null;
		}
	};

	var play = function () {
		pause();
		timer = window.setInterval(function () {
			goTo(index + 1);
		}, 6000);
	};

	viewport.addEventListener('mouseenter', pause);
	viewport.addEventListener('mouseleave', play);

	var prev = document.querySelector('.alify-testimonials__prev');
	var next = document.querySelector('.alify-testimonials__next');

	if (prev) {
		prev.addEventListener('click', function () {
			pause();
			goTo(index - 1);
			play();
		});
	}

	if (next) {
		next.addEventListener('click', function () {
			pause();
			goTo(index + 1);
			play();
		});
	}

	play();

	if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
		gsap.from('.alify-testimonial', {
			scrollTrigger: {
				trigger: '.alify-testimonials',
				start: 'top 78%'
			},
			y: 32,
			opacity: 0,
			duration: 0.8,
			stagger: 0.12,
			ease: 'power2.out'
		});
	}
})();
