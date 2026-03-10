<?php
/**
 * Media Nirvana Theme Functions
 *
 * Merged: new frontend features (Team meta boxes, carousel meta, updated CPTs)
 * with existing AI/CRM integration (MN_AI_Wrapper, LeadService).
 */

// Theme Setup
function media_nirvana_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'media-nirvana'),
        'footer' => __('Footer Menu', 'media-nirvana'),
    ));
}
add_action('after_setup_theme', 'media_nirvana_setup');

// Enqueue Styles and Scripts
function media_nirvana_scripts() {
    $version = time(); // Force bypass all Hostinger/LiteSpeed cache

    // Styles
    wp_enqueue_style('media-nirvana-style', get_stylesheet_uri(), array(), $version);
    wp_enqueue_style('media-nirvana-main', get_template_directory_uri() . '/css/main.css', array(), $version);

    // Scripts
    wp_enqueue_script('media-nirvana-main', get_template_directory_uri() . '/js/main.js', array('jquery'), $version, true);

    // Localize script for AJAX
    wp_localize_script('media-nirvana-main', 'mediaNirvana', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('media_nirvana_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'media_nirvana_scripts');

// Register Custom Post Types
function media_nirvana_custom_post_types() {
    // Services Post Type
    register_post_type('service', array(
        'labels' => array(
            'name' => __('Services', 'media-nirvana'),
            'singular_name' => __('Service', 'media-nirvana'),
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'service'),
    ));

    // Portfolio/Case Studies Post Type
    register_post_type('case_study', array(
        'labels' => array(
            'name' => __('Case Studies', 'media-nirvana'),
            'singular_name' => __('Case Study', 'media-nirvana'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-analytics',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'portfolio'),
    ));

    // Team Members Post Type
    register_post_type('team', array(
        'labels' => array(
            'name' => __('Team Members', 'media-nirvana'),
            'singular_name' => __('Team Member', 'media-nirvana'),
        ),
        'public' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    ));
}
add_action('init', 'media_nirvana_custom_post_types');

// Add Custom Fields for Services
function media_nirvana_service_meta_boxes() {
    add_meta_box(
        'service_details',
        __('Service Details', 'media-nirvana'),
        'media_nirvana_service_meta_callback',
        'service',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'media_nirvana_service_meta_boxes');

function media_nirvana_service_meta_callback($post) {
    wp_nonce_field('media_nirvana_service_meta', 'media_nirvana_service_nonce');

    $icon = get_post_meta($post->ID, '_service_icon', true);
    $features = get_post_meta($post->ID, '_service_features', true);
    $benefits = get_post_meta($post->ID, '_service_benefits', true);
    ?>
    <p>
        <label for="service_icon"><?php _e('Icon (target, search, share, monitor):', 'media-nirvana'); ?></label><br>
        <input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($icon); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="service_features"><?php _e('Features (one per line):', 'media-nirvana'); ?></label><br>
        <textarea id="service_features" name="service_features" rows="5" style="width: 100%;"><?php echo esc_textarea($features); ?></textarea>
    </p>
    <p>
        <label for="service_benefits"><?php _e('Benefits (one per line):', 'media-nirvana'); ?></label><br>
        <textarea id="service_benefits" name="service_benefits" rows="5" style="width: 100%;"><?php echo esc_textarea($benefits); ?></textarea>
    </p>
    <?php
}

function media_nirvana_save_service_meta($post_id) {
    if (!isset($_POST['media_nirvana_service_nonce']) ||
        !wp_verify_nonce($_POST['media_nirvana_service_nonce'], 'media_nirvana_service_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['service_icon'])) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
    }

    if (isset($_POST['service_features'])) {
        update_post_meta($post_id, '_service_features', sanitize_textarea_field($_POST['service_features']));
    }

    if (isset($_POST['service_benefits'])) {
        update_post_meta($post_id, '_service_benefits', sanitize_textarea_field($_POST['service_benefits']));
    }
}
add_action('save_post_service', 'media_nirvana_save_service_meta');

// Add Custom Fields for Case Studies
function media_nirvana_case_study_meta_boxes() {
    add_meta_box(
        'case_study_details',
        __('Case Study Details', 'media-nirvana'),
        'media_nirvana_case_study_meta_callback',
        'case_study',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'media_nirvana_case_study_meta_boxes');

function media_nirvana_case_study_meta_callback($post) {
    wp_nonce_field('media_nirvana_case_study_meta', 'media_nirvana_case_study_nonce');

    $client = get_post_meta($post->ID, '_case_study_client', true);
    $industry = get_post_meta($post->ID, '_case_study_industry', true);
    $challenge = get_post_meta($post->ID, '_case_study_challenge', true);
    $solution = get_post_meta($post->ID, '_case_study_solution', true);
    $results = get_post_meta($post->ID, '_case_study_results', true);
    ?>
    <p>
        <label for="case_study_client"><?php _e('Client Name:', 'media-nirvana'); ?></label><br>
        <input type="text" id="case_study_client" name="case_study_client" value="<?php echo esc_attr($client); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="case_study_industry"><?php _e('Industry:', 'media-nirvana'); ?></label><br>
        <input type="text" id="case_study_industry" name="case_study_industry" value="<?php echo esc_attr($industry); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="case_study_challenge"><?php _e('Challenge:', 'media-nirvana'); ?></label><br>
        <textarea id="case_study_challenge" name="case_study_challenge" rows="3" style="width: 100%;"><?php echo esc_textarea($challenge); ?></textarea>
    </p>
    <p>
        <label for="case_study_solution"><?php _e('Solution:', 'media-nirvana'); ?></label><br>
        <textarea id="case_study_solution" name="case_study_solution" rows="3" style="width: 100%;"><?php echo esc_textarea($solution); ?></textarea>
    </p>
    <p>
        <label for="case_study_results"><?php _e('Results (format: Metric Name | Value, one per line):', 'media-nirvana'); ?></label><br>
        <textarea id="case_study_results" name="case_study_results" rows="4" style="width: 100%;"><?php echo esc_textarea($results); ?></textarea>
        <small>Example: Lead Volume | 400% increase</small>
    </p>
    <?php
}

function media_nirvana_save_case_study_meta($post_id) {
    if (!isset($_POST['media_nirvana_case_study_nonce']) ||
        !wp_verify_nonce($_POST['media_nirvana_case_study_nonce'], 'media_nirvana_case_study_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    $fields = array('client', 'industry', 'challenge', 'solution', 'results');

    foreach ($fields as $field) {
        if (isset($_POST['case_study_' . $field])) {
            update_post_meta($post_id, '_case_study_' . $field, sanitize_textarea_field($_POST['case_study_' . $field]));
        }
    }
}
add_action('save_post_case_study', 'media_nirvana_save_case_study_meta');

// Add Custom Fields for Team Members (NEW from intern's frontend)
function media_nirvana_team_meta_boxes() {
    add_meta_box('team_details', __('Team Member Details', 'media-nirvana'), 'media_nirvana_team_meta_callback', 'team', 'normal', 'high');
}
add_action('add_meta_boxes', 'media_nirvana_team_meta_boxes');

function media_nirvana_team_meta_callback($post) {
    wp_nonce_field('media_nirvana_team_meta', 'media_nirvana_team_nonce');
    $role       = get_post_meta($post->ID, '_team_role', true);
    $email      = get_post_meta($post->ID, '_team_email', true);
    $initials   = get_post_meta($post->ID, '_team_initials', true);
    $highlights = get_post_meta($post->ID, '_team_highlights', true);
    ?>
    <p>
        <label for="team_role"><strong><?php _e('Role / Title:', 'media-nirvana'); ?></strong></label><br>
        <input type="text" id="team_role" name="team_role" value="<?php echo esc_attr($role); ?>" style="width: 100%;" placeholder="e.g. Co-Founder & Growth Strategist">
    </p>
    <p>
        <label for="team_email"><strong><?php _e('Email:', 'media-nirvana'); ?></strong></label><br>
        <input type="email" id="team_email" name="team_email" value="<?php echo esc_attr($email); ?>" style="width: 100%;" placeholder="e.g. name@medianirvana.com">
    </p>
    <p>
        <label for="team_initials"><strong><?php _e('Initials (shown if no photo):', 'media-nirvana'); ?></strong></label><br>
        <input type="text" id="team_initials" name="team_initials" value="<?php echo esc_attr($initials); ?>" style="width: 100px;" placeholder="e.g. SK" maxlength="3">
    </p>
    <p>
        <label for="team_highlights"><strong><?php _e('Key Highlights (one per line):', 'media-nirvana'); ?></strong></label><br>
        <textarea id="team_highlights" name="team_highlights" rows="5" style="width: 100%;" placeholder="One highlight per line"><?php echo esc_textarea($highlights); ?></textarea>
    </p>
    <?php
}

function media_nirvana_save_team_meta($post_id) {
    if (!isset($_POST['media_nirvana_team_nonce']) || !wp_verify_nonce($_POST['media_nirvana_team_nonce'], 'media_nirvana_team_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    $fields = array('team_role' => '_team_role', 'team_email' => '_team_email', 'team_initials' => '_team_initials', 'team_highlights' => '_team_highlights');
    foreach ($fields as $input => $meta_key) {
        if (isset($_POST[$input])) {
            $val = ($input === 'team_highlights') ? sanitize_textarea_field($_POST[$input]) : sanitize_text_field($_POST[$input]);
            update_post_meta($post_id, $meta_key, $val);
        }
    }
}
add_action('save_post_team', 'media_nirvana_save_team_meta');

// Add Stat & Tag fields to Case Study (NEW — carousel card settings)
function media_nirvana_case_study_carousel_meta() {
    add_meta_box('cs_carousel_details', __('Carousel Card Settings', 'media-nirvana'), 'media_nirvana_cs_carousel_callback', 'case_study', 'side', 'default');
}
add_action('add_meta_boxes', 'media_nirvana_case_study_carousel_meta');

function media_nirvana_cs_carousel_callback($post) {
    $stat = get_post_meta($post->ID, '_case_study_stat', true);
    $tag  = get_post_meta($post->ID, '_case_study_tag', true);
    ?>
    <p>
        <label for="cs_stat"><strong><?php _e('Headline Stat:', 'media-nirvana'); ?></strong></label><br>
        <input type="text" id="cs_stat" name="cs_stat" value="<?php echo esc_attr($stat); ?>" style="width: 100%;" placeholder="e.g. -30% CPL">
    </p>
    <p>
        <label for="cs_tag"><strong><?php _e('Category Tag:', 'media-nirvana'); ?></strong></label><br>
        <input type="text" id="cs_tag" name="cs_tag" value="<?php echo esc_attr($tag); ?>" style="width: 100%;" placeholder="e.g. Google Ads + Meta">
    </p>
    <?php
}

function media_nirvana_save_cs_carousel_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['cs_stat'])) update_post_meta($post_id, '_case_study_stat', sanitize_text_field($_POST['cs_stat']));
    if (isset($_POST['cs_tag'])) update_post_meta($post_id, '_case_study_tag', sanitize_text_field($_POST['cs_tag']));
}
add_action('save_post_case_study', 'media_nirvana_save_cs_carousel_meta');

// AJAX Handler for Contact Form — WITH AI/CRM integration (preserved from existing theme)
function media_nirvana_handle_contact_form() {
    check_ajax_referer('media_nirvana_nonce', 'nonce');

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $company = sanitize_text_field($_POST['company']);
    $message = sanitize_textarea_field($_POST['message']);

    // 1. AI Lead Intelligence — call MN_AI_Wrapper directly (no external service needed)
    $ai_notes = '';
    $ai_data = array();
    if (class_exists('MN_AI_Wrapper')) {
        $ai_wrapper = new MN_AI_Wrapper();
        $ai_data = $ai_wrapper->analyze_lead($message);
        if (!empty($ai_data['intent'])) {
            $ai_notes = "\n\n--- AI Analysis ---\n";
            $ai_notes .= "Intent: " . $ai_data['intent'] . "\n";
            $ai_notes .= "Service: " . $ai_data['matched_service'] . "\n";
            $ai_notes .= "Lead Score: " . $ai_data['lead_score'] . "\n";
            $ai_notes .= "Auto Reply: " . $ai_data['auto_reply'] . "\n";
        }
    }

    // 2. CRM Backend — call LeadService directly (no external service needed)
    $crm_payload = array(
        'name'  => $name . ($company ? " ($company)" : ""),
        'email' => $email,
        'phone' => $phone,
        'notes' => $message . $ai_notes
    );
    if (!empty($ai_data)) {
        $crm_payload = array_merge($crm_payload, $ai_data);
    }
    $crm_inserted = false;
    if (class_exists('MN_AI_Wrapper') && defined('MN_PLUGIN_PATH')) {
        try {
            $lead_service = new \App\Services\LeadService();
            $crm_result = $lead_service->ingest($crm_payload);
            $crm_inserted = isset($crm_result['id']);
        } catch (\Exception $e) {
            error_log('MN CRM LeadService error: ' . $e->getMessage());
        }

        // Fallback: if LeadService failed, insert directly via wpdb
        if (!$crm_inserted) {
            global $wpdb;
            $crm_table = $wpdb->prefix . 'mn_crm_leads';
            $wpdb->insert($crm_table, array(
                'source'            => 'wordpress_form',
                'email'             => $email,
                'phone'             => $phone,
                'name'              => $name . ($company ? " ($company)" : ""),
                'notes'             => $message . $ai_notes,
                'status'            => 'New',
                'raw_payload'       => json_encode($crm_payload),
                'normalized_fields' => json_encode(array('email' => $email, 'phone' => $phone)),
                'rule_outputs'      => json_encode(array(
                    'service'       => $ai_data['matched_service'] ?? 'General',
                    'urgency'       => $ai_data['intent'] ?? 'Medium',
                    'lead_score'    => $ai_data['lead_score'] ?? 50,
                    'tags'          => array_values(array_filter(array($ai_data['business_type'] ?? '', $ai_data['action'] ?? '')))
                )),
                'tags'              => json_encode(array_values(array_filter(array($ai_data['business_type'] ?? '', $ai_data['action'] ?? '')))),
            ));
            $crm_inserted = (bool) $wpdb->insert_id;
            if (!$crm_inserted) {
                error_log('MN CRM: Direct wpdb fallback INSERT also failed. wpdb error: ' . $wpdb->last_error);
            }
        }
    } else {
        error_log('MN CRM: Plugin not active — MN_AI_Wrapper class not found or MN_PLUGIN_PATH not defined. CRM integration skipped.');
    }

    // 3. Send admin notification email
    $to = get_option('admin_email');
    $from_address = 'hello@medianirvana.in'; // Domain-authenticated sender — avoids spam filters
    $subject = 'New Strategy Call Request - Media Nirvana';
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nCompany: $company\n\nMessage:\n$message" . $ai_notes;
    $admin_headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: Media Nirvana <' . $from_address . '>',
        "Reply-To: $name <$email>",
    );
    $sent = wp_mail($to, $subject, $body, $admin_headers);

    // 4. Send auto-reply email to the lead (multipart HTML + plain text to avoid spam)
    $reply_sent = false;
    if (!empty($email)) {
        $service_name  = esc_html($ai_data['matched_service'] ?? 'Performance Marketing');
        $business_name = esc_html($ai_data['business_type']   ?? 'Service');
        $outcome_name  = esc_html($ai_data['desired_outcome'] ?? 'Business Growth');
        $safe_name     = esc_html($name);

        $reply_subject = 'We received your enquiry – Media Nirvana';

        // Professional HTML email body
        $html_body = '<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"></head>
<body style="margin:0;padding:0;background:#f4f4f4;font-family:Arial,sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f4;padding:30px 0;">
    <tr><td align="center">
      <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:6px;overflow:hidden;">
        <tr><td style="background:#1a1a2e;padding:24px 32px;">
          <p style="margin:0;color:#ffffff;font-size:20px;font-weight:bold;">Media Nirvana</p>
        </td></tr>
        <tr><td style="padding:32px;">
          <p style="margin:0 0 16px;font-size:16px;color:#111111;">Hi ' . $safe_name . ',</p>
          <p style="margin:0 0 16px;font-size:15px;color:#333333;line-height:1.6;">
            Thank you for getting in touch. We have received your enquiry and a strategist will review it shortly.
          </p>
          <table width="100%" cellpadding="12" cellspacing="0" style="background:#f8f9fa;border-left:4px solid #e63946;border-radius:4px;margin:24px 0;">
            <tr><td>
              <p style="margin:0 0 8px;font-size:13px;color:#666666;text-transform:uppercase;letter-spacing:1px;">Your Enquiry Summary</p>
              <p style="margin:0 0 6px;font-size:14px;color:#111111;"><strong>Service Interest:</strong> ' . $service_name . '</p>
              <p style="margin:0 0 6px;font-size:14px;color:#111111;"><strong>Business Type:</strong> ' . $business_name . '</p>
              <p style="margin:0;font-size:14px;color:#111111;"><strong>Primary Goal:</strong> ' . $outcome_name . '</p>
            </td></tr>
          </table>
          <p style="margin:0 0 24px;font-size:15px;color:#333333;line-height:1.6;">
            We typically respond within <strong>1 business day</strong>. In the meantime, feel free to explore our case studies or call us directly.
          </p>
          <p style="margin:0;font-size:15px;color:#333333;">Warm regards,<br><strong>The Media Nirvana Team</strong></p>
        </td></tr>
        <tr><td style="background:#f0f0f0;padding:16px 32px;text-align:center;">
          <p style="margin:0;font-size:12px;color:#888888;">
            &copy; ' . date('Y') . ' Media Nirvana. You are receiving this because you submitted a contact form on our website.<br>
            <a href="https://medianirvana.in" style="color:#888888;">medianirvana.in</a>
          </p>
        </td></tr>
      </table>
    </td></tr>
  </table>
</body>
</html>';

        // Plain text version (required for multipart — greatly reduces spam score)
        $plain_body = "Hi $name,\n\n"
            . "Thank you for reaching out to Media Nirvana.\n\n"
            . "Service Interest: " . ($ai_data['matched_service'] ?? 'Performance Marketing') . "\n"
            . "Business Type: " . ($ai_data['business_type'] ?? 'Service') . "\n"
            . "Primary Goal: " . ($ai_data['desired_outcome'] ?? 'Business Growth') . "\n\n"
            . "A strategist will contact you within 1 business day.\n\n"
            . "Warm regards,\nThe Media Nirvana Team\nhttps://medianirvana.in";

        // Build multipart MIME (plain + HTML) — this is what keeps you out of spam
        $boundary = md5(uniqid('', true));
        $reply_headers = array(
            'From: Media Nirvana <' . $from_address . '>',
            'Reply-To: ' . $from_address,
            'Content-Type: multipart/alternative; boundary="' . $boundary . '"',
        );
        $reply_body  = "--$boundary\r\n";
        $reply_body .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
        $reply_body .= $plain_body . "\r\n\r\n";
        $reply_body .= "--$boundary\r\n";
        $reply_body .= "Content-Type: text/html; charset=UTF-8\r\n\r\n";
        $reply_body .= $html_body . "\r\n\r\n";
        $reply_body .= "--$boundary--";

        $reply_sent = wp_mail($email, $reply_subject, $reply_body, $reply_headers);
    }

    // 5. Save to local WP database (theme's own contacts table)
    global $wpdb;
    $table_name = $wpdb->prefix . 'media_nirvana_contacts';

    $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'company' => $company,
            'message' => $message,
            'submitted_at' => current_time('mysql')
        )
    );

    // Use AI auto-reply if available, else generic message
    $success_message = 'Thank you! We\'ll get back to you within 24 hours.';
    if (!empty($ai_data['auto_reply'])) {
        $success_message = $ai_data['auto_reply'];
    }

    // Succeed if either the email was sent OR the lead was saved (locally or in CRM)
    $db_inserted = (bool) $wpdb->insert_id;
    if ($sent || $crm_inserted || $db_inserted) {
        wp_send_json_success(array('message' => $success_message));
    } else {
        wp_send_json_error(array('message' => 'Sorry, we could not save your request. Please try again or email us directly.'));
    }
}
add_action('wp_ajax_media_nirvana_contact', 'media_nirvana_handle_contact_form');
add_action('wp_ajax_nopriv_media_nirvana_contact', 'media_nirvana_handle_contact_form');

// Create Database Table for Contacts
function media_nirvana_create_tables() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'media_nirvana_contacts';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phone varchar(50),
        company varchar(255),
        message text NOT NULL,
        submitted_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
// Themes cannot use register_activation_hook — use after_switch_theme instead.
// The init fallback runs once automatically if the table was never created (e.g. after FTP upload).
add_action('after_switch_theme', 'media_nirvana_create_tables');
add_action('init', function() {
    if (!get_option('mn_contacts_db_version')) {
        media_nirvana_create_tables();
        update_option('mn_contacts_db_version', '1.0');
    }
});

// Customizer Settings
function media_nirvana_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('media_nirvana_hero', array(
        'title' => __('Hero Section', 'media-nirvana'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default' => 'Data-Driven Growth for Brands That Mean Business',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'media-nirvana'),
        'section' => 'media_nirvana_hero',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Stop wasting money on vanity metrics. We deliver real leads, sales, and ROI.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'media-nirvana'),
        'section' => 'media_nirvana_hero',
        'type' => 'textarea',
    ));

    // Stats Section
    $wp_customize->add_section('media_nirvana_stats', array(
        'title' => __('Stats Section', 'media-nirvana'),
        'priority' => 31,
    ));

    $stats = array(
        'clients' => array('label' => 'Clients Served', 'default' => '150+'),
        'revenue' => array('label' => 'Revenue Generated', 'default' => '$45M+'),
        'roi' => array('label' => 'Average ROI', 'default' => '320%'),
        'campaigns' => array('label' => 'Campaigns Launched', 'default' => '500+'),
    );

    foreach ($stats as $key => $stat) {
        $wp_customize->add_setting('stat_' . $key, array(
            'default' => $stat['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('stat_' . $key, array(
            'label' => __($stat['label'], 'media-nirvana'),
            'section' => 'media_nirvana_stats',
            'type' => 'text',
        ));
    }
}
add_action('customize_register', 'media_nirvana_customize_register');

// Admin Menu for Contact Submissions
function media_nirvana_admin_menu() {
    add_menu_page(
        __('Contact Submissions', 'media-nirvana'),
        __('Contacts', 'media-nirvana'),
        'manage_options',
        'media-nirvana-contacts',
        'media_nirvana_contacts_page',
        'dashicons-email',
        25
    );
}
add_action('admin_menu', 'media_nirvana_admin_menu');

function media_nirvana_contacts_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'media_nirvana_contacts';
    $contacts = $wpdb->get_results("SELECT * FROM $table_name ORDER BY submitted_at DESC");
    ?>
    <div class="wrap">
        <h1><?php _e('Contact Form Submissions', 'media-nirvana'); ?></h1>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th><?php _e('Date', 'media-nirvana'); ?></th>
                    <th><?php _e('Name', 'media-nirvana'); ?></th>
                    <th><?php _e('Email', 'media-nirvana'); ?></th>
                    <th><?php _e('Phone', 'media-nirvana'); ?></th>
                    <th><?php _e('Company', 'media-nirvana'); ?></th>
                    <th><?php _e('Message', 'media-nirvana'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?php echo esc_html($contact->submitted_at); ?></td>
                    <td><?php echo esc_html($contact->name); ?></td>
                    <td><a href="mailto:<?php echo esc_attr($contact->email); ?>"><?php echo esc_html($contact->email); ?></a></td>
                    <td><?php echo esc_html($contact->phone); ?></td>
                    <td><?php echo esc_html($contact->company); ?></td>
                    <td><?php echo esc_html(wp_trim_words($contact->message, 20)); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}
?>