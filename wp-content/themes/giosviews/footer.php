</main>
<?php get_sidebar(); ?>
</div>

<footer id="footer" role="contentinfo">
    <?php get_template_part('reviews');?>
    <div class="plinth">
        <span class="photo-1"></span>
        <span class="photo-2"></span>
        <span class="photo-3"></span>
        <span class="photo-4"></span>
        <span class="photo-5"></span>
        <span class="photo-6"></span>
        <span class="photo-7"></span>
    </div>
    <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
        <?php wp_nav_menu([
            'theme_location' => 'main-menu',
            'orderby' => 'menu_order',
        ]); ?>
    </nav>
    <div class="social">
        <p class="connect">Connect</p>
        <div class="icons">
            <?php include TEMPLATEPATH.'/social-media-links.php'; ?>
        </div>
    </div>
    <div id="copyright">
        <p>© 2023 GIO'S VIEWS | ALL RIGHTS RESERVED |<br> MADE WITH
            <svg width="16" height="10" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0.23882 3.15413C1.87935 -1.20352 7.21106 0.744602 7.69809 2.92343C8.36455 0.616436 13.5681 -1.10099 15.1574 3.15413C16.9261 7.89627 8.31329 12.1514 7.69809 12.8435C7.08289 12.2796 -1.52987 7.81937 0.23882 3.15413Z"
                    fill="#F2F2F2" />
            </svg>
            BY <a href="https://missmarketing.es/">MISSMARKETING</a> | <span id="back-top">BACK TO TOP</span></p>
    </div>

</footer>
</div>
<?php wp_footer(); ?>
</body>
<script>
    jQuery(function ($) {
        $('.testimonial-carousel').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '.testimonial-prev',
            nextArrow: '.testimonial-next'
        });
    });
</script>

</html>