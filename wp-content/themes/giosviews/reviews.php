<div id="reviews">
    <div class="testimonial-slider">
        <?php
        $args = array(
            'post_type' => 'testimonials',
            'posts_per_page' => -1,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
        ?>

        <div class="testimonial-carousel">
            <?php
                while ($query->have_posts()) :
                    $query->the_post();
                ?>

            <div class="testimonial-slide">
                <div class="testimonial-content">
                    <h3 class="heading">
                        <?php echo get_field('heading'); ?>
                    </h3>

                    <?php the_content(); ?>
                </div>
                <h2 class="testimonial-title">
                    <?php the_title(); ?>
                </h2>
            </div>

            <?php
                endwhile;
                wp_reset_postdata();
                ?>
        </div>

        <div class="testimonial-navigation">
            <span class="testimonial-prev">PREV</span>
            <span class="testimonial-next">NEXT</span>
        </div>

        <?php
        else :
            echo '<p>No hay testimonios disponibles.</p>';
        endif;
        ?>
    </div>
</div>