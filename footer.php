<footer class="site-footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <h3><?php bloginfo('name'); ?></h3>
                    <?php endif; ?>
                    <p><?php bloginfo('description'); ?></p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="icon-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="icon-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="icon-linkedin"></i></a>
                    </div>
                </div>
                
                <div class="footer-services">
                    <h4>Our Services</h4>
                    <?php
                    $services = new WP_Query(array(
                        'post_type'      => 'eye_services',
                        'posts_per_page' => 5,
                    ));
                    if ($services->have_posts()) : ?>
                        <ul>
                            <?php while ($services->have_posts()) : $services->the_post(); ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; wp_reset_postdata(); ?>
                </div>
                
                <div class="footer-contact">
                    <h4>Contact Us</h4>
                    <p><i class="icon-location"></i> <?php echo nl2br(esc_html(get_theme_mod('practice_address', '123 Vision Street'))); ?></p>
                    <p><i class="icon-phone"></i> <?php echo esc_html(get_theme_mod('practice_phone', '(555) 123-4567')); ?></p>
                    <p><i class="icon-clock"></i> <?php echo esc_html(get_theme_mod('practice_hours', 'Mon-Fri: 9AM - 6PM')); ?></p>
                </div>
                
                <div class="footer-hours">
                    <h4>Opening Hours</h4>
                    <ul class="hours-list">
                        <li><span>Monday - Friday</span> <span>9:00 AM - 6:00 PM</span></li>
                        <li><span>Saturday</span> <span>9:00 AM - 2:00 PM</span></li>
                        <li><span>Sunday</span> <span>Closed</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
