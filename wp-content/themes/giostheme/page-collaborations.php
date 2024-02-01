<?php
/*
Template Name: Collaborations
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

        <div class="collab-content">
            <h2><?php echo esc_html( get_field( 'collab_title' ) ); ?></h2>
            <p><?php echo esc_html( get_field( 'collab_description' ) ); ?></p>
        </div>
        <?php the_content(); ?>
    </div>
</article>

<?php endwhile; endif; ?>

<?php get_footer(); ?>