<?php
/**
 * Template Name: About Page
 */
get_header(); ?>

<!-- About Hero -->
<section class="page-hero">
    <div class="container">
        <h1 class="page-hero-title"><?php _e('About Media Nirvana', 'media-nirvana'); ?></h1>
        <p class="page-hero-subtitle"><?php _e('Growth & Performance Marketing for brands that are serious about results.', 'media-nirvana'); ?></p>
    </div>
</section>

<!-- Who We Are (from WP editor content) -->
<section class="about-content section">
    <div class="container">
        <div class="about-intro-block">
            <h2 class="section-title" style="text-align:left;"><?php _e('Who We Are', 'media-nirvana'); ?></h2>
            <?php
            // Pull content from the WordPress page editor
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</section>

<!-- Our Promise -->
<section class="promise-section section">
    <div class="container">
        <div class="promise-card">
            <h2 class="section-title"><?php _e('Our Promise', 'media-nirvana'); ?></h2>
            <p class="promise-tagline"><?php _e("We don't bluff — we measure.", 'media-nirvana'); ?></p>
            <p class="promise-text">
                <?php _e('Every move is backed by data, strategy, and intent. Every campaign we build is designed to maximize ROI, lower acquisition costs, and drive long-term, sustainable growth for our clients.', 'media-nirvana'); ?>
            </p>
        </div>
    </div>
</section>

<!-- Founders (Dynamic from Team CPT) -->
<section class="founders-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php _e('Meet the Founders', 'media-nirvana'); ?></h2>
        </div>
        <div class="founders-grid">
            <?php
            $founders_query = new WP_Query(array(
                'post_type'      => 'team',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ));

            if ($founders_query->have_posts()) :
                while ($founders_query->have_posts()) : $founders_query->the_post();
                    $role       = get_post_meta(get_the_ID(), '_team_role', true);
                    $email      = get_post_meta(get_the_ID(), '_team_email', true);
                    $highlights = get_post_meta(get_the_ID(), '_team_highlights', true);
                    $initials   = get_post_meta(get_the_ID(), '_team_initials', true);
                    ?>
                    <div class="founder-card">
                        <div class="founder-avatar">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail', array('class' => 'founder-photo')); ?>
                            <?php else : ?>
                                <span class="founder-initials"><?php echo esc_html($initials ?: mb_substr(get_the_title(), 0, 2)); ?></span>
                            <?php endif; ?>
                        </div>
                        <h3 class="founder-name"><?php the_title(); ?></h3>
                        <?php if ($role) : ?>
                            <p class="founder-role"><?php echo esc_html($role); ?></p>
                        <?php endif; ?>
                        <?php if ($email) : ?>
                            <a href="mailto:<?php echo esc_attr($email); ?>" class="founder-email"><?php echo esc_html($email); ?></a>
                        <?php endif; ?>
                        <p class="founder-bio"><?php echo esc_html(wp_trim_words(get_the_content(), 40)); ?></p>
                        <?php if ($highlights) : ?>
                            <ul class="founder-highlights">
                                <?php foreach (explode("\n", $highlights) as $h) :
                                    $h = trim($h);
                                    if ($h) : ?>
                                        <li><?php echo esc_html($h); ?></li>
                                    <?php endif;
                                endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback static founders when no team members published yet
                $static_founders = array(
                    array(
                        'name'       => 'Sravan Kumar Kaparaboina',
                        'initials'   => 'SK',
                        'role'       => 'Founder & Performance Director',
                        'email'      => 'sravan@medianirvana.in',
                        'bio'        => 'A growth-focused digital marketer and strategist with 20+ years of combined experience leading B2B, SaaS, and eCommerce marketing across global markets. Deep expertise in AI Tools, Google Ads, SEO, and conversion tracking.',
                        'highlights' => array('20+ Years of Digital Marketing Experience', 'AI Tools, Google Ads & SEO Expert', 'Trusted Partner Across India, UAE, UK & U.S.', 'Performance-First, Automation-Driven Approach'),
                        'linkedin'   => 'https://www.linkedin.com/in/sravan-kumar-kaparaboina-79254246',
                    ),
                    array(
                        'name'       => 'Akash Thrunahari',
                        'initials'   => 'AT',
                        'role'       => 'Co-Founder & Growth Strategist',
                        'email'      => 'akash@medianirvana.in',
                        'bio'        => 'Dynamic and results-driven sales and marketing leader with 6+ years scaling interior, design, and lifestyle brands. Achieved up to 75% reduction in CPL through strategic growth frameworks and digital transformation.',
                        'highlights' => array('Times Business Award 2023 Recipient', '75% CPL Reduction Track Record', 'B2B & B2C Sales Leadership', 'Conversion Funnel Optimization Expert'),
                        'linkedin'   => 'https://www.linkedin.com/in/akashthrunahari',
                    ),
                );
                foreach ($static_founders as $founder) : ?>
                    <div class="founder-card">
                        <div class="founder-avatar">
                            <span class="founder-initials"><?php echo esc_html($founder['initials']); ?></span>
                        </div>
                        <h3 class="founder-name"><?php echo esc_html($founder['name']); ?></h3>
                        <p class="founder-role"><?php echo esc_html($founder['role']); ?></p>
                        <a href="mailto:<?php echo esc_attr($founder['email']); ?>" class="founder-email"><?php echo esc_html($founder['email']); ?></a>
                        <p class="founder-bio"><?php echo esc_html($founder['bio']); ?></p>
                        <ul class="founder-highlights">
                            <?php foreach ($founder['highlights'] as $h) : ?>
                                <li><?php echo esc_html($h); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo esc_url($founder['linkedin']); ?>" target="_blank" rel="noopener noreferrer" class="founder-linkedin">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            Connect on LinkedIn
                        </a>
                    </div>
                <?php endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Our Vision -->
<section class="vision-section section">
    <div class="container">
        <div class="vision-block">
            <h2 class="section-title"><?php _e('Our Vision', 'media-nirvana'); ?></h2>
            <blockquote class="vision-quote">
                <?php _e('"To be the most trusted digital growth partner for ambitious brands — blending creativity, data, and human insight to drive performance that lasts."', 'media-nirvana'); ?>
            </blockquote>
            <p class="vision-intro"><?php _e('At Media Nirvana, our vision is to:', 'media-nirvana'); ?></p>
            <ul class="vision-list">
                <li><?php _e('Empower brands with transparent, ROI-focused marketing', 'media-nirvana'); ?></li>
                <li><?php _e('Build long-term partnerships that go beyond campaigns', 'media-nirvana'); ?></li>
                <li><?php _e('Use technology and storytelling to connect brands with people in meaningful ways', 'media-nirvana'); ?></li>
                <li><?php _e('Make digital growth accessible to every business — no matter its size or budget', 'media-nirvana'); ?></li>
            </ul>
        </div>
    </div>
</section>

<!-- Built For Section -->
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