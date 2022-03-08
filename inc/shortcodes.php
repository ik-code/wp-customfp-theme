<?php

/**
 * Shortcodes
 */


add_shortcode('date','customfp_date');
/**
 * Add the shortcode [date format='F j, Y']
 */
function customfp_date($atts, $content = null) {
    extract( shortcode_atts( array(
        'format' => ''
    ), $atts ) );

    if ($atts['format'] == '') {
        $date_time = date(get_option('date_format'));
    }  else {
        $date_time = date($atts['format']);
    }
    return $date_time;
}




add_shortcode( 'contact-form', 'display_contact_form' );
/**
 * Add the shortcode [contact-form]
 * This function displays the validation messages, the success message, the container of the validation messages, and the
 * contact form.
 */
function display_contact_form() {

    $validation_messages = [];
    $success_message = '';



    if (
            isset( $_POST['contact_form'] )
            && ! empty( $_POST[ '_wpnonce' ] )
            && wp_verify_nonce( $_POST[ '_wpnonce' ], 'true_update' )
    ) {

        //Sanitize the data
        $full_name = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
        $email     = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
        $message   = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

        //Validate the data
        if ( strlen( $full_name ) === 0 ) {
            $validation_messages[] = esc_html__( 'Please enter a valid name.', 'customfp' );
        }

        if ( strlen( $email ) === 0 or
            ! is_email( $email ) ) {
            $validation_messages[] = esc_html__( 'Please enter a valid email address.', 'customfp' );
        }

        if ( strlen( $message ) === 0 ) {
            $validation_messages[] = esc_html__( 'Please enter a valid message.', 'customfp' );
        }

        //Send an email to the WordPress administrator if there are no validation errors
        if ( empty( $validation_messages ) ) {

            $mail    = get_option( 'admin_email' );
            $subject = 'New message from ' . $full_name;
            $message = $message . ' - The email address of the customer is: ' . $mail;

            wp_mail( $mail, $subject, $message );

            $success_message = esc_html__( 'Your message has been successfully sent.', 'customfp' );

        }

    }

    ?>

    <div class="form-wrapper d-flex justify-content-xxxl-start justify-content-center">
        <form id="contact_form" class="form contact__form" action="<?php echo esc_url( get_permalink() ); ?>" method="post">
            <div id="validation-messages-container">
            <?php
            //Display the validation errors
            if ( ! empty( $validation_messages ) ) {
                foreach ( $validation_messages as $validation_message ) {
                    echo '<div class="validation-message">' . esc_html( $validation_message ) . '</div>';
                }
            }

            //Display the success message
            if ( strlen( $success_message ) > 0 ) {
                echo '<div class="success-message">' . esc_html( $success_message ) . '</div>';
            }
            ?>
            </div>
            <input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce( 'true_update' ); ?>" />
            <input type="hidden" name="contact_form">
            <div class="form__control-wrapper">
                <input id="full_name" name="full_name" type="text" class="form__control" placeholder="Name">
            </div>
            <div class="form__control-wrapper">
                <input id="email" name="email" type="text" class="form__control" placeholder="Email">
            </div>
            <div class="form__control-wrapper">
                <textarea id="message" name="message" class="form__control" placeholder="Write something..."></textarea>
            </div>
            <button id="contact-form-submit" class="btn-normal" type="submit" >
                <?php if ( get_field( 'contact_form_button_icon_svg' ) ) : ?>
                    <img src="<?php the_field( 'contact_form_button_icon_svg' ); ?>" />
                <?php endif ?>
                Submit Message
            </button>
        </form>
    </div>

    <?php

}
