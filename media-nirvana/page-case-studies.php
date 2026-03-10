<?php
/**
 * Template Name: Case Studies Page
 */
get_header(); ?>

<!-- Case Studies Hero -->
<section class="page-hero">
    <div class="container">
        <h1 class="page-hero-title"><?php _e('Case Studies', 'media-nirvana'); ?></h1>
        <p class="page-hero-subtitle"><?php _e('Real results from real brands. See how we deliver measurable ROI.', 'media-nirvana'); ?></p>
    </div>
</section>

<!-- Case Studies Infinite Carousel (Dynamic from CPT) -->
<section class="carousel-section section">
    <div class="carousel-wrapper">
        <div class="carousel-track carousel-track-reverse" id="casestudies-carousel">
            <?php
            $cs_query = new WP_Query(array(
                'post_type'      => 'case_study',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'ASC',
            ));

            if ($cs_query->have_posts()) :
                // Render dynamic cards twice for infinite scroll effect
                for ($loop = 0; $loop < 2; $loop++) :
                    $cs_query->rewind_posts();
                    while ($cs_query->have_posts()) : $cs_query->the_post();
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
                // Fallback placeholder cards when no case studies are published yet
                $placeholders = array(
                    array('stat' => '10x ROAS', 'title' => 'E-Commerce Brand Growth', 'text' => 'Scaled a D2C fashion brand from zero to 10x return on ad spend within 90 days using Meta & Google Ads.', 'tag' => 'Performance Marketing', 'client' => 'D2C Fashion Brand', 'industry' => 'E-Commerce', 'challenge' => 'The brand was spending on ads with zero tracking and no return. Campaigns lacked structure and audience targeting was broad.', 'solution' => 'Rebuilt the entire ad account with structured campaigns, pixel-based audiences, and a full-funnel approach across Meta & Google.', 'results' => 'ROAS | 10x\nRevenue Growth | 400%\nCPA Reduction | 65%'),
                    array('stat' => '300% More Leads', 'title' => 'Real Estate Lead Gen', 'text' => 'Generated 300% more qualified leads for a premium real estate developer through targeted funnel optimization.', 'tag' => 'Lead Generation', 'client' => 'Premium Real Estate Developer', 'industry' => 'Real Estate', 'challenge' => 'The developer was relying on walk-ins and referrals. Digital presence was minimal with no lead capture system.', 'solution' => 'Built targeted Google & Meta campaigns with dedicated landing pages, lead scoring, and automated follow-up sequences.', 'results' => 'Qualified Leads | 300% increase\nCost Per Lead | 45% reduction\nConversion Rate | 12%'),
                    array('stat' => '#1 on Google', 'title' => 'Healthcare SEO Domination', 'text' => 'Took a multi-location healthcare brand to page 1 for 50+ high-intent keywords in under 6 months.', 'tag' => 'SEO & Content', 'client' => 'Multi-Location Healthcare Brand', 'industry' => 'Healthcare', 'challenge' => 'The brand had no organic visibility and was entirely dependent on paid ads for patient acquisition.', 'solution' => 'Comprehensive SEO strategy covering technical fixes, local SEO, content clusters, and authority building through backlinks.', 'results' => 'Keywords on Page 1 | 50+\nOrganic Traffic | 500% increase\nPatient Enquiries | 200% increase'),
                    array('stat' => '5x Revenue', 'title' => 'EdTech Scaling Success', 'text' => 'Helped an online education platform 5x their monthly revenue with performance marketing and CRO.', 'tag' => 'Growth Strategy', 'client' => 'Online Education Platform', 'industry' => 'EdTech', 'challenge' => 'The platform had high traffic but extremely low conversion rates. The funnel was leaking at every stage.', 'solution' => 'End-to-end CRO audit followed by landing page redesigns, A/B testing, and performance marketing optimization.', 'results' => 'Monthly Revenue | 5x growth\nConversion Rate | 3.2x improvement\nCAC | 40% reduction'),
                    array('stat' => '60% Lower CAC', 'title' => 'SaaS Customer Acquisition', 'text' => 'Reduced customer acquisition cost by 60% for a B2B SaaS company through data-driven campaign optimization.', 'tag' => 'Analytics & Optimization', 'client' => 'B2B SaaS Company', 'industry' => 'SaaS / Technology', 'challenge' => 'High customer acquisition costs were eating into margins. Campaigns were broad and lacked proper attribution.', 'solution' => 'Data-driven campaign restructuring with proper attribution, audience segmentation, and creative testing frameworks.', 'results' => 'CAC | 60% reduction\nTrial-to-Paid | 2.5x improvement\nPipeline Value | 180% increase'),
                );
                // Render placeholders twice for infinite scroll
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
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container cta-content">
        <h2 class="cta-title"><?php _e('Ready to be our next success story?', 'media-nirvana'); ?></h2>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn-primary btn-lg">
            <?php _e('Book a Free Strategy Call', 'media-nirvana'); ?>
        </a>
    </div>
</section>

<?php get_footer(); ?>