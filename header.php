<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>

</head>

<body <?php body_class('class-name'); ?>>

<div class="container-fluid">

    <?php
    global $post;

    /*
     * Disable the WordPress visual editor on pages or posts with a specific page template
     */
    $page_template = get_post_meta($post->ID, '_wp_page_template', true);
    if ($page_template == 'front-page.php'):
    ?>
        <section class="hero"
                 style="background-image: url(
                    <?php if (get_field('background_image')) : ?>
                         <?php the_field('background_image'); ?>
                    <?php endif ?>
                    );">

    <?php endif; ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-transparent navbar-header">
        <?php echo the_custom_logo(); ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            if (has_nav_menu('main-menu')) {
                wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="navbar-nav navbar-header-nav ms-auto %2$s">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new bootstrap_5_wp_nav_menu_walker()
                    )
                );
            }
            ?>
        </div>
    </nav>

    <?php  if ($page_template == 'front-page.php'): ?>
        <div class="row">
            <div class="col-xl-6 col-12">
                <div class="hero-left-col d-flex justify-content-center">
                    <div class="hero-left-col__wrapper">
                        <h1><?php the_field('heading'); ?></h1>
                        <p class="hero-left-col__txt"><?php the_field('text'); ?></p>
                        <?php $button_link = get_field('button_link'); ?>
                        <?php if ($button_link) : ?>
                            <a class="hero-left-col__btn btn-normal" href="<?php echo esc_url($button_link['url']); ?>"
                               target="<?php echo esc_attr($button_link['target']); ?>"><?php echo esc_html($button_link['title']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="hero-right-col d-flex justify-content-end">
                    <?php $hero_image = get_field( 'hero_image' ); ?>
                    <?php if ( $hero_image ) : ?>
                        <img class="hero-right-col__img img-fluid" src="<?php echo esc_url( $hero_image['url'] ); ?>" alt="<?php echo esc_attr( $hero_image['alt'] ); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div>

        </section>
    <?php endif; ?>
