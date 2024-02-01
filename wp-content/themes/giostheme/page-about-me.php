<?php
/*
Template Name: About Me
*/

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content" itemprop="mainContentOfPage">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="banner">
                    <?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?>
                </div>
            <?php endif; ?>

            <div class="about-me-content">
                <div class="column">
                    <h2><?php echo esc_html( get_field( 'title_about' ) ); ?></h2>
                    <p><?php echo esc_html( get_field( 'text_about_me' ) ); ?></p>
                    <h2><?php echo esc_html( get_field( 'title_goal' ) ); ?></h2>
                    <p><?php echo esc_html( get_field( 'text_my_goal' ) ); ?></p>
                </div>

                <div class="column">
                    <h2><?php echo esc_html( get_field( 'title_background' ) ); ?></h2>
                    <p><?php echo esc_html( get_field( 'text_background' ) ); ?></p>
                    <h2><?php echo esc_html( get_field( 'title_why' ) ); ?></h2>
                    <p><?php echo esc_html( get_field( 'text_why' ) ); ?></p>
                </div>
            </div>

            <?php the_content(); ?>

            <div class="entry-links"><?php wp_link_pages(); ?></div>
        </div>
    </article>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
