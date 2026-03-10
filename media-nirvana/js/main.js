jQuery(document).ready(function ($) {
    'use strict';

    // Mobile Menu Toggle
    $('#mobile-menu-toggle').on('click', function () {
        $('body').toggleClass('menu-open');
        $(this).toggleClass('active');
        $('.main-navigation').toggleClass('active');
    });

    // Smooth Scroll for Anchor Links
    $('a[href*="#"]:not([href="#"])').on('click', function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
            location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800);
                return false;
            }
        }
    });

    // Sticky Header on Scroll
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });

    // ── Theme Toggle (Dark / Light Mode) ──
    var $toggle = $('#theme-toggle');
    var $body = $('body');

    // Restore saved preference on page load
    if (localStorage.getItem('mn_theme') === 'light') {
        $body.addClass('light-mode');
        $toggle.find('.moon-icon').hide();
        $toggle.find('.sun-icon').show();
    }

    $toggle.on('click', function () {
        $body.toggleClass('light-mode');
        var isLight = $body.hasClass('light-mode');

        // Swap icons
        $toggle.find('.moon-icon').toggle(!isLight);
        $toggle.find('.sun-icon').toggle(isLight);

        // Save preference
        localStorage.setItem('mn_theme', isLight ? 'light' : 'dark');
    });

    // Contact Form Submission
    $('#contact-form').on('submit', function (e) {
        e.preventDefault();

        var $form = $(this);
        var $button = $form.find('button[type=\"submit\"]');
        var $message = $('#form-message');

        // Disable button
        $button.prop('disabled', true).text('Sending...');

        $.ajax({
            url: mediaNirvana.ajaxurl,
            type: 'POST',
            data: {
                action: 'media_nirvana_contact',
                nonce: mediaNirvana.nonce,
                name: $('#contact-name').val(),
                email: $('#contact-email').val(),
                phone: $('#contact-phone').val(),
                company: $('#contact-company').val(),
                message: $('#contact-message').val()
            },
            success: function (response) {
                if (response.success) {
                    $message.html('<div class=\"success-message\">' + response.data.message + '</div>').fadeIn();
                    $form[0].reset();
                } else {
                    $message.html('<div class=\"error-message\">' + response.data.message + '</div>').fadeIn();
                }
            },
            error: function () {
                $message.html('<div class=\"error-message\">Sorry, there was an error. Please try again.</div>').fadeIn();
            },
            complete: function () {
                $button.prop('disabled', false).text('Book Strategy Call');
                setTimeout(function () {
                    $message.fadeOut();
                }, 5000);
            }
        });
    });

    // Fade-in Animation on Scroll
    function fadeInOnScroll() {
        $('.fade-in-scroll').each(function () {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('visible');
            }
        });
    }

    $(window).on('scroll resize', fadeInOnScroll);
    fadeInOnScroll();

    // ── Book-a-Call Popup (15-second timer, once per session) ──
    var $popupOverlay = $('#mn-popup-overlay');
    if ($popupOverlay.length && !sessionStorage.getItem('mn_popup_dismissed')) {
        setTimeout(function () {
            $popupOverlay.addClass('active');
        }, 15000);

        // Close handlers
        function closePopup() {
            $popupOverlay.removeClass('active');
            sessionStorage.setItem('mn_popup_dismissed', '1');
        }

        $('#mn-popup-close, #mn-popup-dismiss').on('click', closePopup);

        // Close on overlay click (but not the popup itself)
        $popupOverlay.on('click', function (e) {
            if (e.target === this) closePopup();
        });

        // Close on Escape key
        $(document).on('keydown', function (e) {
            if (e.key === 'Escape' && $popupOverlay.hasClass('active')) closePopup();
        });
    }

    // ── Case Study Detail Modal ──
    var $csOverlay = $('#cs-modal-overlay');
    if ($csOverlay.length) {
        // Clicking a carousel card
        $(document).on('click', '.cs-card-clickable', function (e) {
            e.preventDefault();
            e.stopPropagation();

            var $card = $(this);

            // Pause carousel animation while modal is open
            $card.closest('.carousel-track').css('animation-play-state', 'paused');

            // Populate modal fields
            var title = $card.data('title') || '';
            var stat = $card.data('stat') || '';
            var tag = $card.data('tag') || '';
            var client = $card.data('client') || '';
            var industry = $card.data('industry') || '';
            var challenge = $card.data('challenge') || '';
            var solution = $card.data('solution') || '';
            var results = $card.data('results') || '';
            var content = $card.data('content') || '';

            $('#cs-modal-title').text(title);
            $('#cs-modal-stat').text(stat).toggle(!!stat);
            $('#cs-modal-tag').text(tag).toggle(!!tag);

            // Client & Industry
            $('#cs-modal-client').text(client);
            $('#cs-modal-client-wrap').toggle(!!client);
            $('#cs-modal-industry').text(industry);
            $('#cs-modal-industry-wrap').toggle(!!industry);

            // Challenge
            var challengeText = challenge || content;
            $('#cs-modal-challenge').text(challengeText);
            $('#cs-modal-challenge-wrap').toggle(!!challengeText);

            // Solution
            $('#cs-modal-solution').text(solution);
            $('#cs-modal-solution-wrap').toggle(!!solution);

            // Results — parse "Metric | Value" lines
            var $resultsGrid = $('#cs-modal-results').empty();
            if (results) {
                var lines = String(results).split(/\\n|\n/);
                $.each(lines, function (_, line) {
                    line = $.trim(line);
                    if (!line) return;
                    var parts = line.split('|');
                    var metric = $.trim(parts[0] || '');
                    var value = $.trim(parts[1] || line);
                    $resultsGrid.append(
                        '<div class="cs-modal-result-item">' +
                        '<span class="cs-modal-result-metric">' + $('<span>').text(metric).html() + '</span>' +
                        '<span class="cs-modal-result-value">' + $('<span>').text(value).html() + '</span>' +
                        '</div>'
                    );
                });
            }
            $('#cs-modal-results-wrap').toggle(!!results);

            $csOverlay.addClass('active');
            $('body').css('overflow', 'hidden');
        });

        // Close modal
        function closeCsModal() {
            $csOverlay.removeClass('active');
            $('body').css('overflow', '');
            // Resume carousel animation
            $('.carousel-track').css('animation-play-state', 'running');
        }

        $('#cs-modal-close').on('click', closeCsModal);
        $csOverlay.on('click', function (e) {
            if (e.target === this) closeCsModal();
        });
        $(document).on('keydown', function (e) {
            if (e.key === 'Escape' && $csOverlay.hasClass('active')) closeCsModal();
        });
    }
});
