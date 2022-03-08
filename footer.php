    <footer class="footer d-flex flex-column align-items-center justify-content-center">
        <div class="foooter__box text-center">
            <?php echo the_custom_logo(); ?>
            <?php
            if(is_active_sidebar('footer_area_one')){
                dynamic_sidebar('footer_area_one');
            }
            ?>
        </div>
        <div class="footer__copyright">
           <p class="txt-small">Copyright © <?php echo do_shortcode("[date format='Y']"); ?> <?php echo get_theme_mod( 'footer_copyright_text_block'); ?></p>
        </div>
    </footer>


</div>

<?php wp_footer(); ?>

</body>

</html>