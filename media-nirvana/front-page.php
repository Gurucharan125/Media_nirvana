<?php
/**
 * Front Page Template
 *
 * This template is used when a static front page is set in Settings > Reading.
 * WordPress uses front-page.php as the highest priority template for the homepage.
 */
get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="bg-gradient-1"></div>
    <div class="bg-gradient-2"></div>
    <div class="container hero-content">
        <div class="hero-text fade-in">
            <h1 class="hero-title">
                <?php echo esc_html(get_theme_mod('hero_title', 'Data-driven growth & performance marketing for brands that want real leads, real sales and real ROI.')); ?>
            </h1>
            <p class="hero-subtitle">
                <?php echo esc_html(get_theme_mod('hero_subtitle', 'Stop wasting money on vanity metrics. We deliver results that matter.')); ?>
            </p>

            <ul class="hero-bullets">
                <li class="hero-bullet"><?php _e('Google & Meta Ads that convert', 'media-nirvana'); ?></li>
                <li class="hero-bullet"><?php _e('Full-funnel growth strategy', 'media-nirvana'); ?></li>
                <li class="hero-bullet"><?php _e('Clear reporting. Zero fluff.', 'media-nirvana'); ?></li>
            </ul>

            <div class="hero-cta">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn-primary">
                    <?php _e('Book a Free Growth Strategy Call', 'media-nirvana'); ?>
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M5 12h14m-7-7l7 7-7 7"/></svg>
                </a>
                <a href="<?php echo esc_url(home_url('/case-studies')); ?>" class="btn-secondary">
                    <?php _e('View Case Studies', 'media-nirvana'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card fade-in">
                <svg class="stat-icon" width="32" height="32" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                <div class="stat-value"><?php echo esc_html(get_theme_mod('stat_clients', '150+')); ?></div>
                <div class="stat-label"><?php _e('Clients Served', 'media-nirvana'); ?></div>
            </div>
            <div class="stat-card fade-in">
                <svg class="stat-icon" width="32" height="32" fill="currentColor" viewBox="0 0 24 24"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg>
                <div class="stat-value"><?php echo esc_html(get_theme_mod('stat_revenue', '$45M+')); ?></div>
                <div class="stat-label"><?php _e('Revenue Generated', 'media-nirvana'); ?></div>
            </div>
            <div class="stat-card fade-in">
                <svg class="stat-icon" width="32" height="32" fill="currentColor" viewBox="0 0 24 24"><path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/></svg>
                <div class="stat-value"><?php echo esc_html(get_theme_mod('stat_roi', '320%')); ?></div>
                <div class="stat-label"><?php _e('Average ROI', 'media-nirvana'); ?></div>
            </div>
            <div class="stat-card fade-in">
                <svg class="stat-icon" width="32" height="32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                <div class="stat-value"><?php echo esc_html(get_theme_mod('stat_campaigns', '500+')); ?></div>
                <div class="stat-label"><?php _e('Campaigns Launched', 'media-nirvana'); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- Outcomes Section -->
<section class="outcomes-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php _e("We don't sell services. We sell outcomes.", 'media-nirvana'); ?></h2>
        </div>
        <div class="outcomes-grid">
            <div class="outcome-card">
                <div class="outcome-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M15 10l-4 4l6 6l4-16l-18 7l4 2l2 6l3-4"/></svg>
                </div>
                <p class="outcome-text"><?php _e('Better targeting, sharper messaging and high intent funnels so your sales team speak to buyers, not browsers.', 'media-nirvana'); ?></p>
            </div>
            <div class="outcome-card">
                <div class="outcome-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6m6 0h6m-6 0V9a2 2 0 012-2h2a2 2 0 012 2v10m6 0v-4a2 2 0 00-2-2h-2a2 2 0 00-2 2v4"/></svg>
                </div>
                <p class="outcome-text"><?php _e('Every tracked from click to conversion so ROAS and CAC stay under control', 'media-nirvana'); ?></p>
            </div>
            <div class="outcome-card">
                <div class="outcome-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <p class="outcome-text"><?php _e('Campaigns are temporary. Systems are last. We build frameworks you can scale confidently', 'media-nirvana'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Services Cards Section -->
<section class="services-section section">
    <div class="container">
        <div class="services-cards-grid">
            <div class="service-card-new">
                <div class="service-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/></svg>
                </div>
                <h3 class="service-card-title"><?php _e('Performance Marketing', 'media-nirvana'); ?></h3>
                <p class="service-card-text"><?php _e('ROI focused advertising that drives consistent leads and sales, not just traffic', 'media-nirvana'); ?></p>
            </div>
            <div class="service-card-new">
                <div class="service-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                </div>
                <h3 class="service-card-title"><?php _e('SEO & Content', 'media-nirvana'); ?></h3>
                <p class="service-card-text"><?php _e('Be visible when people are actively searching for what you offer.', 'media-nirvana'); ?></p>
            </div>
            <div class="service-card-new">
                <div class="service-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                </div>
                <h3 class="service-card-title"><?php _e('Local Business Growth', 'media-nirvana'); ?></h3>
                <p class="service-card-text"><?php _e('Local business tired of referrals and ready for predictable growth systems.', 'media-nirvana'); ?></p>
            </div>
            <div class="service-card-new">
                <div class="service-card-icon">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/></svg>
                </div>
                <h3 class="service-card-title"><?php _e('Social Media', 'media-nirvana'); ?></h3>
                <p class="service-card-text"><?php _e('Build your brand presence and engage your audience with strategic social media.', 'media-nirvana'); ?></p>
            </div>
        </div>
        <div class="services-cta">
            <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn-primary">
                <?php _e('View All Services', 'media-nirvana'); ?>
            </a>
        </div>
    </div>
</section>

<!-- How We Work Section -->
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

<!-- Case Studies Carousel -->
<section class="carousel-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php _e('Our Work Speaks for Itself', 'media-nirvana'); ?></h2>
            <p class="section-subtitle"><?php _e('Real results from real brands.', 'media-nirvana'); ?></p>
        </div>
    </div>
    <div class="carousel-wrapper">
        <div class="carousel-track carousel-track-reverse" id="home-casestudies-carousel">
            <?php
            $cs_home_query = new WP_Query(array(
                'post_type'      => 'case_study',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'ASC',
            ));

            if ($cs_home_query->have_posts()) :
                for ($loop = 0; $loop < 2; $loop++) :
                    $cs_home_query->rewind_posts();
                    while ($cs_home_query->have_posts()) : $cs_home_query->the_post();
                        $stat      = get_post_meta(get_the_ID(), '_case_study_stat', true);
                        $tag       = get_post_meta(get_the_ID(), '_case_study_tag', true);
                        $client    = get_post_meta(get_the_ID(), '_case_study_client', true);
                        $industry  = get_post_meta(get_the_ID(), '_case_study_industry', true);
                        $challenge = get_post_meta(get_the_ID(), '_case_study_challenge', true);
                        $solution  = get_post_meta(get_the_ID(), '_case_study_solution', true);
                        $results   = get_post_meta(get_the_ID(), '_case_study_results', true);
                        $full_content = wp_strip_all_tags(get_the_content());
                        ?>
                        <div class="carousel-card cs-card cs-card-clickable"
                             data-title="<?php echo esc_attr(get_the_title()); ?>"
                             data-stat="<?php echo esc_attr($stat); ?>"
                             data-tag="<?php echo esc_attr($tag); ?>"
                             data-client="<?php echo esc_attr($client); ?>"
                             data-industry="<?php echo esc_attr($industry); ?>"
                             data-challenge="<?php echo esc_attr($challenge); ?>"
                             data-solution="<?php echo esc_attr($solution); ?>"
                             data-results="<?php echo esc_attr($results); ?>"
                             data-content="<?php echo esc_attr($full_content); ?>">
                            <?php if ($stat) : ?>
                                <div class="cs-card-stat"><?php echo esc_html($stat); ?></div>
                            <?php endif; ?>
                            <h3 class="carousel-card-title"><?php the_title(); ?></h3>
                            <p class="carousel-card-text"><?php echo esc_html(wp_trim_words(get_the_content(), 25)); ?></p>
                            <?php if ($tag) : ?>
                                <span class="cs-card-tag tag-pill"><?php echo esc_html($tag); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php
                    endwhile;
                endfor;
                wp_reset_postdata();
            else :
                $placeholders = array(
                    array('stat' => '10x ROAS', 'title' => 'E-Commerce Brand Growth', 'text' => 'Scaled a D2C fashion brand from zero to 10x return on ad spend within 90 days using Meta & Google Ads.', 'tag' => 'Performance Marketing', 'client' => 'D2C Fashion Brand', 'industry' => 'E-Commerce', 'challenge' => 'The brand was spending on ads with zero tracking and no return. Campaigns lacked structure and audience targeting was broad.', 'solution' => 'Rebuilt the entire ad account with structured campaigns, pixel-based audiences, and a full-funnel approach across Meta & Google.', 'results' => 'ROAS | 10x\nRevenue Growth | 400%\nCPA Reduction | 65%'),
                    array('stat' => '300% More Leads', 'title' => 'Real Estate Lead Gen', 'text' => 'Generated 300% more qualified leads for a premium real estate developer through targeted funnel optimization.', 'tag' => 'Lead Generation', 'client' => 'Premium Real Estate Developer', 'industry' => 'Real Estate', 'challenge' => 'The developer was relying on walk-ins and referrals. Digital presence was minimal with no lead capture system.', 'solution' => 'Built targeted Google & Meta campaigns with dedicated landing pages, lead scoring, and automated follow-up sequences.', 'results' => 'Qualified Leads | 300% increase\nCost Per Lead | 45% reduction\nConversion Rate | 12%'),
                    array('stat' => '#1 on Google', 'title' => 'Healthcare SEO Domination', 'text' => 'Took a multi-location healthcare brand to page 1 for 50+ high-intent keywords in under 6 months.', 'tag' => 'SEO & Content', 'client' => 'Multi-Location Healthcare Brand', 'industry' => 'Healthcare', 'challenge' => 'The brand had no organic visibility and was entirely dependent on paid ads for patient acquisition.', 'solution' => 'Comprehensive SEO strategy covering technical fixes, local SEO, content clusters, and authority building through backlinks.', 'results' => 'Keywords on Page 1 | 50+\nOrganic Traffic | 500% increase\nPatient Enquiries | 200% increase'),
                    array('stat' => '5x Revenue', 'title' => 'EdTech Scaling Success', 'text' => 'Helped an online education platform 5x their monthly revenue with performance marketing and CRO.', 'tag' => 'Growth Strategy', 'client' => 'Online Education Platform', 'industry' => 'EdTech', 'challenge' => 'The platform had high traffic but extremely low conversion rates. The funnel was leaking at every stage.', 'solution' => 'End-to-end CRO audit followed by landing page redesigns, A/B testing, and performance marketing optimization.', 'results' => 'Monthly Revenue | 5x growth\nConversion Rate | 3.2x improvement\nCAC | 40% reduction'),
                    array('stat' => '60% Lower CAC', 'title' => 'SaaS Customer Acquisition', 'text' => 'Reduced customer acquisition cost by 60% for a B2B SaaS company through data-driven campaign optimization.', 'tag' => 'Analytics & Optimization', 'client' => 'B2B SaaS Company', 'industry' => 'SaaS / Technology', 'challenge' => 'High customer acquisition costs were eating into margins. Campaigns were broad and lacked proper attribution.', 'solution' => 'Data-driven campaign restructuring with proper attribution, audience segmentation, and creative testing frameworks.', 'results' => 'CAC | 60% reduction\nTrial-to-Paid | 2.5x improvement\nPipeline Value | 180% increase'),
                );
                for ($loop = 0; $loop < 2; $loop++) :
                    foreach ($placeholders as $card) : ?>
                        <div class="carousel-card cs-card cs-card-clickable"
                             data-title="<?php echo esc_attr($card['title']); ?>"
                             data-stat="<?php echo esc_attr($card['stat']); ?>"
                             data-tag="<?php echo esc_attr($card['tag']); ?>"
                             data-client="<?php echo esc_attr($card['client']); ?>"
                             data-industry="<?php echo esc_attr($card['industry']); ?>"
                             data-challenge="<?php echo esc_attr($card['challenge']); ?>"
                             data-solution="<?php echo esc_attr($card['solution']); ?>"
                             data-results="<?php echo esc_attr($card['results']); ?>"
                             data-content="<?php echo esc_attr($card['text']); ?>">
                            <div class="cs-card-stat"><?php echo esc_html($card['stat']); ?></div>
                            <h3 class="carousel-card-title"><?php echo esc_html($card['title']); ?></h3>
                            <p class="carousel-card-text"><?php echo esc_html($card['text']); ?></p>
                            <span class="cs-card-tag tag-pill"><?php echo esc_html($card['tag']); ?></span>
                        </div>
                    <?php endforeach;
                endfor;
            endif;
            ?>
        </div>
    </div>
    <div class="container" style="text-align: center; margin-top: 40px;">
        <a href="<?php echo esc_url(home_url('/case-studies')); ?>" class="btn-primary">
            <?php _e('View All Case Studies', 'media-nirvana'); ?>
        </a>
    </div>
</section>

<!-- Target Audience Section -->
<section class="audience-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php _e('Media Nirvana is built for brands that are serious about growth', 'media-nirvana'); ?></h2>
        </div>
        <div class="audience-grid">
            <div class="audience-card white-card">
                <div class="audience-card-icon"></div>
                <p class="audience-card-text"><?php _e('Interiors, Real Estate, Healthcare, Education, Agencies looking for consistent client flow', 'media-nirvana'); ?></p>
            </div>
            <div class="audience-card white-card">
                <div class="audience-card-icon"></div>
                <p class="audience-card-text"><?php _e('Brands ready to scale profitably with data-driven performance marketing', 'media-nirvana'); ?></p>
            </div>
            <div class="audience-card white-card">
                <div class="audience-card-icon"></div>
                <p class="audience-card-text"><?php _e('Local business tired of referrals and ready for predictable growth systems.', 'media-nirvana'); ?></p>
            </div>
        </div>
        <p class="audience-tagline"><?php _e("If growth is a priority - you're our kind of people", 'media-nirvana'); ?></p>
    </div>
</section>

<!-- CTA Section -->
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