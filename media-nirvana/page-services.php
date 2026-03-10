<?php
/**
 * Template Name: Services Page
 */
get_header(); ?>

<!-- Services Hero -->
<section class="page-hero">
    <div class="container">
        <h1 class="page-hero-title"><?php _e('Our Services', 'media-nirvana'); ?></h1>
        <p class="page-hero-subtitle"><?php _e("We don't sell services. We sell outcomes.", 'media-nirvana'); ?></p>
    </div>
</section>

<!-- Services Infinite Carousel -->
<section class="carousel-section section">
    <div class="carousel-wrapper">
        <div class="carousel-track" id="services-carousel">
            <!-- Original cards -->
            <div class="carousel-card">
                <div class="carousel-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M15 10l-4 4l6 6l4-16l-18 7l4 2l2 6l3-4"/></svg>
                </div>
                <h3 class="carousel-card-title"><?php _e('Performance Marketing', 'media-nirvana'); ?></h3>
                <p class="carousel-card-text"><?php _e('ROI focused advertising that drives consistent leads and sales, not just traffic. Better targeting, sharper messaging and high intent funnels.', 'media-nirvana'); ?></p>
            </div>
            <div class="carousel-card">
                <div class="carousel-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="carousel-card-title"><?php _e('SEO & Content', 'media-nirvana'); ?></h3>
                <p class="carousel-card-text"><?php _e('Be visible when people are actively searching for what you offer. Organic growth that compounds over time.', 'media-nirvana'); ?></p>
            </div>
            <div class="carousel-card">
                <div class="carousel-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6m6 0h6m-6 0V9a2 2 0 012-2h2a2 2 0 012 2v10m6 0v-4a2 2 0 00-2-2h-2a2 2 0 00-2 2v4"/></svg>
                </div>
                <h3 class="carousel-card-title"><?php _e('Social Media', 'media-nirvana'); ?></h3>
                <p class="carousel-card-text"><?php _e('Build your brand presence and engage your audience with strategic social media management across all platforms.', 'media-nirvana'); ?></p>
            </div>
            <div class="carousel-card">
                <div class="carousel-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M3 8l4-4l4 4M7 4v16M21 16l-4 4l-4-4m4 4V4"/></svg>
                </div>
                <h3 class="carousel-card-title"><?php _e('Web Development', 'media-nirvana'); ?></h3>
                <p class="carousel-card-text"><?php _e('High-converting landing pages, fast websites & funnels engineered for lead generation and seamless user experience.', 'media-nirvana'); ?></p>
            </div>
            <div class="carousel-card">
                <div class="carousel-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/><path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/></svg>
                </div>
                <h3 class="carousel-card-title"><?php _e('Analytics & Tracking', 'media-nirvana'); ?></h3>
                <p class="carousel-card-text"><?php _e('Full pixel setup, conversion tracking, dashboards. Every rupee tracked from click to conversion so ROAS stays under control.', 'media-nirvana'); ?></p>
            </div>
            <!-- Duplicate cards for infinite loop -->
            <div class="carousel-card">
                <div class="carousel-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M15 10l-4 4l6 6l4-16l-18 7l4 2l2 6l3-4"/></svg>
                </div>
                <h3 class="carousel-card-title"><?php _e('Performance Marketing', 'media-nirvana'); ?></h3>
                <p class="carousel-card-text"><?php _e('ROI focused advertising that drives consistent leads and sales, not just traffic. Better targeting, sharper messaging and high intent funnels.', 'media-nirvana'); ?></p>
            </div>
            <div class="carousel-card">
                <div class="carousel-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="carousel-card-title"><?php _e('SEO & Content', 'media-nirvana'); ?></h3>
                <p class="carousel-card-text"><?php _e('Be visible when people are actively searching for what you offer. Organic growth that compounds over time.', 'media-nirvana'); ?></p>
            </div>
            <div class="carousel-card">
                <div class="carousel-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6m6 0h6m-6 0V9a2 2 0 012-2h2a2 2 0 012 2v10m6 0v-4a2 2 0 00-2-2h-2a2 2 0 00-2 2v4"/></svg>
                </div>
                <h3 class="carousel-card-title"><?php _e('Social Media', 'media-nirvana'); ?></h3>
                <p class="carousel-card-text"><?php _e('Build your brand presence and engage your audience with strategic social media management across all platforms.', 'media-nirvana'); ?></p>
            </div>
            <div class="carousel-card">
                <div class="carousel-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M3 8l4-4l4 4M7 4v16M21 16l-4 4l-4-4m4 4V4"/></svg>
                </div>
                <h3 class="carousel-card-title"><?php _e('Web Development', 'media-nirvana'); ?></h3>
                <p class="carousel-card-text"><?php _e('High-converting landing pages, fast websites & funnels engineered for lead generation and seamless user experience.', 'media-nirvana'); ?></p>
            </div>
            <div class="carousel-card">
                <div class="carousel-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/><path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/></svg>
                </div>
                <h3 class="carousel-card-title"><?php _e('Analytics & Tracking', 'media-nirvana'); ?></h3>
                <p class="carousel-card-text"><?php _e('Full pixel setup, conversion tracking, dashboards. Every rupee tracked from click to conversion so ROAS stays under control.', 'media-nirvana'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- How We Work -->
<section class="how-we-work-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title hww-title"><?php _e('How We Work', 'media-nirvana'); ?></h2>
            <p class="section-subtitle hww-subtitle"><?php _e('Simple. Structured. Scaleable.', 'media-nirvana'); ?></p>
        </div>
        <div class="hww-grid">
            <div class="hww-card">
                <span class="hww-number">1</span>
                <h3 class="hww-card-title"><?php _e('Discover & Deep Dive', 'media-nirvana'); ?></h3>
                <p class="hww-card-text"><?php _e('We study your business, audience, funnel, and numbers.', 'media-nirvana'); ?></p>
            </div>
            <div class="hww-divider"></div>
            <div class="hww-card">
                <span class="hww-number">2</span>
                <h3 class="hww-card-title"><?php _e('Growth Blue Print', 'media-nirvana'); ?></h3>
                <p class="hww-card-text"><?php _e('Clear plan covering ads, messaging, budgets, funnels and tracking.', 'media-nirvana'); ?></p>
            </div>
            <div class="hww-divider"></div>
            <div class="hww-card">
                <span class="hww-number">3</span>
                <h3 class="hww-card-title"><?php _e('Launch & Testing', 'media-nirvana'); ?></h3>
                <p class="hww-card-text"><?php _e('Campaigns go live. Data decides what stays and what goes.', 'media-nirvana'); ?></p>
            </div>
        </div>
        <div class="hww-grid hww-grid-bottom">
            <div class="hww-card">
                <span class="hww-number">4</span>
                <h3 class="hww-card-title"><?php _e('Optimisation & Scaling', 'media-nirvana'); ?></h3>
                <p class="hww-card-text"><?php _e('Winning campaigns are scaled. Losers are killed fast.', 'media-nirvana'); ?></p>
            </div>
            <div class="hww-divider"></div>
            <div class="hww-card">
                <span class="hww-number">5</span>
                <h3 class="hww-card-title"><?php _e('Weekly Reviews', 'media-nirvana'); ?></h3>
                <p class="hww-card-text"><?php _e('Reporting, insights and next steps - every single week.', 'media-nirvana'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container cta-content">
        <h2 class="cta-title"><?php _e('Book a free 30 minute strategy call and get:', 'media-nirvana'); ?></h2>
        <ul class="cta-benefits">
            <li class="cta-benefit"><?php _e('Funnel Audit', 'media-nirvana'); ?></li>
            <li class="cta-benefit"><?php _e('3-5 Quick growth opportunities', 'media-nirvana'); ?></li>
            <li class="cta-benefit"><?php _e('90 action roadmap', 'media-nirvana'); ?></li>
        </ul>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn-primary btn-lg">
            <?php _e('Book a Free Strategy Call', 'media-nirvana'); ?>
        </a>
    </div>
</section>

<?php get_footer(); ?>