<?php
/*
Template Name: Contact Page
*/
get_header();
?>

<div class="page-content">
    <!-- Contact Section - Two Column Layout -->
    <section class="contact-page-section">
        <div class="container">
            <div class="contact-layout">
                <!-- Left: Contact Form -->
                <div class="contact-form-col">
                    <h1 class="contact-form-title"><?php _e('Book Your Free Strategy Call', 'media-nirvana'); ?></h1>
                    <p class="contact-form-subtitle"><?php _e("Fill out the form below and we'll get back to you within 24 hours.", 'media-nirvana'); ?></p>

                    <form id="contact-form" method="post">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact-name"><?php _e('Full Name *', 'media-nirvana'); ?></label>
                                <input type="text" id="contact-name" name="name" required placeholder="John Doe">
                            </div>
                            <div class="form-group">
                                <label for="contact-email"><?php _e('Email Address *', 'media-nirvana'); ?></label>
                                <input type="email" id="contact-email" name="email" required placeholder="john@company.com">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact-phone"><?php _e('Phone Number', 'media-nirvana'); ?></label>
                                <input type="tel" id="contact-phone" name="phone" placeholder="+1 (555) 123-4567">
                            </div>
                            <div class="form-group">
                                <label for="contact-company"><?php _e('Company Name', 'media-nirvana'); ?></label>
                                <input type="text" id="contact-company" name="company" placeholder="Your Company">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact-message"><?php _e('Tell Us About Your Goals *', 'media-nirvana'); ?></label>
                            <textarea id="contact-message" name="message" rows="5" required placeholder="What are you looking to achieve? What challenges are you facing?"></textarea>
                        </div>

                        <button type="submit" class="btn-primary contact-submit-btn">
                            <?php _e('Book Strategy Call', 'media-nirvana'); ?> &rarr;
                        </button>

                        <div id="form-message" style="display: none; margin-top: 20px;"></div>
                    </form>
                </div>

                <!-- Right: Get In Touch Sidebar -->
                <div class="contact-sidebar">
                    <h2 class="sidebar-title"><?php _e('Get In Touch', 'media-nirvana'); ?></h2>
                    <p class="sidebar-desc"><?php _e('Have questions? Want to discuss your project? We\'re here to help!', 'media-nirvana'); ?></p>

                    <div class="sidebar-contact-list">
                        <div class="sidebar-contact-item">
                            <span class="sidebar-label"><?php _e('EMAIL', 'media-nirvana'); ?></span>
                            <div class="sidebar-contact-row">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="var(--accent-blue)" stroke-width="2"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <a href="mailto:sravan.medianirvana@gmail.com">sravan.medianirvana@gmail.com</a>
                            </div>
                        </div>

                        <div class="sidebar-contact-item">
                            <span class="sidebar-label"><?php _e('PHONE', 'media-nirvana'); ?></span>
                            <div class="sidebar-contact-row">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="var(--accent-blue)" stroke-width="2"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <a href="tel:+15551234567">+1 (555) 123-4567</a>
                            </div>
                        </div>

                        <div class="sidebar-contact-item">
                            <span class="sidebar-label"><?php _e('OFFICE', 'media-nirvana'); ?></span>
                            <div class="sidebar-contact-row">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="var(--accent-blue)" stroke-width="2"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Hyderabad, India</span>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-expect">
                        <h3 class="sidebar-expect-title"><?php _e('What to Expect', 'media-nirvana'); ?></h3>
                        <ul class="sidebar-expect-list">
                            <li>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-blue)"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                                <?php _e("We'll respond within 24 Hours", 'media-nirvana'); ?>
                            </li>
                            <li>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-blue)"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                                <?php _e('30 minute discovery call', 'media-nirvana'); ?>
                            </li>
                            <li>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-blue)"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                                <?php _e('Custom growth roadmap', 'media-nirvana'); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>