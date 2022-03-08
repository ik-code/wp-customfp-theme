<?php
/* Template Name: Front Page */

get_header(); ?>

    <section class="box">
        <div class="box__wrapper" style="background: <?php the_field('box_background_color'); ?>;">
            <div class="row">
                <div class="col-xxxl-7 col-12">
                    <div class="box__left-col d-flex justify-content-center align-items-center">
                        <div class="box__left-col-wrapper">
                            <h2 class="box__left-col-heading"><?php the_field('box_heading'); ?></h2>
                            <p class="box__left-col-txt"><?php the_field('box_text'); ?></p>

                            <?php $box_button_link = get_field('box_button_link'); ?>
                            <?php if ($box_button_link) : ?>
                                <a class="box__left-col-btn btn-normal"
                                   href="<?php echo esc_url($box_button_link['url']); ?>"
                                   target="<?php echo esc_attr($box_button_link['target']); ?>"><?php echo esc_html($box_button_link['title']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-5 col-12">
                    <div class="box__right-col d-flex justify-content-end">
                        <div class="box__right-col__img-wrapper">
                            <?php $box_hero_image = get_field('box_hero_image'); ?>
                            <?php if ($box_hero_image) : ?>
                                <img class="box__right-col__img img-fluid"
                                     src="<?php echo esc_url($box_hero_image['url']); ?>"
                                     alt="<?php echo esc_attr($box_hero_image['alt']); ?>"/>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials" id="testimonials">

        <?php
        $posts = get_posts(array(
            'posts_per_page' => 3,
            'post_type' => 'testimonial'
        ));
        ?>


        <div class="row">
            <div class="col">
                <div class="wrap-slick">
                    <div class="heading-arrows-wrapper d-flex justify-content-between">
                        <div class="testimonials__heading">
                            <h2>
                                <span class="navbar-brand__first-item"
                                      style="color: <?php the_field('first_heading_part_color'); ?> "><?php the_field('first_heading_part_text'); ?></span>
                                <span class="navbar-brand__second-item"
                                      style="color: <?php the_field('second_heading_part_color'); ?> "><?php the_field('second_heading_part_text'); ?></span>
                            </h2>
                        </div>
                        <div class="slick-arrows"></div>
                    </div>

                    <div class="slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1}'>
                        <?php if ($posts): ?>

                            <?php foreach ($posts as $post):
                                setup_postdata($post); ?>

                                <div class="content-slick  d-flex">
                                    <div class="content-slick__video">
                                        <?php $image = get_field('image'); ?>
                                        <?php if ($image) : ?>
                                            <img class="img-fluid" src="<?php echo esc_url($image['url']); ?>"
                                                 alt="<?php echo esc_attr($image['alt']); ?>"/>
                                        <?php endif; ?>
                                    </div>
                                    <div class="content-slick__txt d-flex flex-column justify-content-center">
                                        <p class="txt-italic-large"><?php the_field('text'); ?></p>
                                        <p class="txt-bold"><?php the_field('author'); ?></p>
                                        <p class="txt"><?php the_field('position'); ?></p>
                                    </div>
                                </div>

                            <?php endforeach; ?>

                            <?php wp_reset_postdata(); ?>

                        <?php endif; ?>
                    </div>
                    <div class="slick-paging">
                        <span class="slick-paging__pagingInfo slick-paging__pagingInfo--left"></span>
                        <span class="slick-paging__pagingInfo slick-paging__pagingInfo--right"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact"
             style="background-image: url(
             <?php if (get_field('contact_background_image')) : ?>
                 <?php the_field('contact_background_image'); ?>
             <?php endif ?>
                     );">
        <div class="row">
            <div class="col-xxxl-6 col-12">

                <div class="contact__left-col d-flex flex-column justify-content-between align-items-center">
                    <div class="contact__left-col-wrapper d-flex flex-column justify-content-between align-items-xxxl-start align-items-center">
                        <h2 class="contact__left-col-heading"><?php the_field( 'contact_heading' ); ?></h2>
                        <div class="contact__left-col-info ">
                            <?php $contact_email_link = get_field( 'contact_email_link' ); ?>
                            <?php if ( $contact_email_link ) : ?>
                                <p><a href="<?php echo esc_url( $contact_email_link['url'] ); ?>" target="<?php echo esc_attr( $contact_email_link['target'] ); ?>"><?php echo esc_html( $contact_email_link['title'] ); ?></a></p>
                            <?php endif; ?>
                            <p><?php the_field( 'contact_address' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-6 col-12">
                <?php echo do_shortcode("[contact-form]"); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>