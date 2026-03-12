<?php
/*
Template Name: Home Page
*/
get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero-section" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hero-bg.jpg');">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title"><?php echo esc_html(get_theme_mod('hero_title', 'Clear Vision for Life')); ?></h1>
                <p class="hero-subtitle"><?php echo esc_html(get_theme_mod('hero_subtitle', 'Expert eye care for your entire family')); ?></p>
                <div class="hero-cta">
                    <a href="#appointment" class="btn btn-primary">Schedule Exam</a>
                    <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-secondary">Our Services</a>
                </div>
            </div>
        </div>
        <div class="hero-scroll">
            <a href="#services" class="scroll-down">
                <span>Scroll Down</span>
                <i class="icon-arrow-down"></i>
            </a>
        </div>
    </section>

    <!-- Services Preview -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="section-header">
                <span class="section-label">Our Expertise</span>
                <h2>Comprehensive Eye Care Services</h2>
                <p>From routine eye exams to advanced treatments, we provide complete vision care for all ages</p>
            </div>
            
            <div class="services-grid">
                <?php
                $services = new WP_Query(array(
                    'post_type'      => 'eye_services',
                    'posts_per_page' => 6,
                ));
                
                if ($services->have_posts()) : 
                    while ($services->have_posts()) : $services->the_post(); ?>
                        <article class="service-card">
                            <div class="service-icon">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <i class="icon-eye"></i>
                                <?php endif; ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="read-more">Learn More <i class="icon-arrow-right"></i></a>
                        </article>
                    <?php endwhile;
                endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="features-section">
        <div class="container">
            <div class="features-grid">
                <div class="feature-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/clinic-interior.jpg" alt="Modern Eye Clinic">
                </div>
                <div class="feature-content">
                    <span class="section-label">Why Choose Us</span>
                    <h2>Advanced Technology, Personalized Care</h2>
                    <ul class="feature-list">
                        <li>
                            <i class="icon-check"></i>
                            <div>
                                <h4>State-of-the-Art Equipment</h4>
                                <p>Digital retinal imaging, OCT scans, and automated refractors</p>
                            </div>
                        </li>
                        <li>
                            <i class="icon-check"></i>
                            <div>
                                <h4>Experienced Optometrists</h4>
                                <p>Board-certified doctors with 20+ years combined experience</p>
                            </div>
                        </li>
                        <li>
                            <i class="icon-check"></i>
                            <div>
                                <h4>Same-Day Appointments</h4>
                                <p>Urgent eye care available with minimal wait times</p>
                            </div>
                        </li>
                        <li>
                            <i class="icon-check"></i>
                            <div>
                                <h4>Insurance Accepted</h4>
                                <p>We work with all major vision and medical insurance plans</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Section -->
    <section id="appointment" class="appointment-section">
        <div class="container">
            <div class="appointment-wrapper">
                <div class="appointment-info">
                    <h2>Ready to Schedule Your Eye Exam?</h2>
                    <p>Take the first step towards clearer vision. Our online booking system makes it easy to find an appointment that fits your schedule.</p>
                    <div class="contact-info-box">
                        <div class="info-item">
                            <i class="icon-phone"></i>
                            <div>
                                <span>Call Us</span>
                                <strong><?php echo esc_html(get_theme_mod('practice_phone', '(555) 123-4567')); ?></strong>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="icon-location"></i>
                            <div>
                                <span>Visit Us</span>
                                <strong><?php echo esc_html(get_theme_mod('practice_address', '123 Vision Street')); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="appointment-form-wrapper">
                    <!-- You can integrate with a booking plugin here -->
                    <h3>Book Online</h3>
                    <form class="appointment-form">
                        <div class="form-row">
                            <input type="text" placeholder="Full Name" required>
                            <input type="tel" placeholder="Phone Number" required>
                        </div>
                        <input type="email" placeholder="Email Address" required>
                        <select required>
                            <option value="">Select Service</option>
                            <option value="exam">Comprehensive Eye Exam</option>
                            <option value="contact">Contact Lens Fitting</option>
                            <option value="emergency">Urgent Eye Care</option>
                            <option value="pediatric">Pediatric Eye Exam</option>
                        </select>
                        <input type="date" placeholder="Preferred Date" required>
                        <textarea placeholder="Additional Notes (optional)" rows="3"></textarea>
                        <button type="submit" class="btn btn-primary btn-full">Request Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-label">Patient Reviews</span>
                <h2>What Our Patients Say</h2>
            </div>
            <div class="testimonials-slider">
                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p>"Dr. Smith and the team were incredibly thorough. They explained everything about my eye health and helped me choose the perfect frames. Best eye exam I've ever had!"</p>
                    <div class="testimonial-author">
                        <strong>Sarah Johnson</strong>
                        <span>Patient since 2019</span>
                    </div>
                </div>
                <!-- Add more testimonials -->
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
