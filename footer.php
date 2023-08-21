<?php
/**
 * Similarly, footer.php in a file in the WordPress page hierarchy is used to build 
 * the footer section of a WordPress theme and called in the footer section of all the template files. 
 * The footer.php generally contains the copyright information, calls to JS files, widget areas that 
 * commonly have site navigation.
 */

?>
<div class="py-3 bg-body-tertiary mt-3">
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-baseline">
            <div class="col-md-6 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-white">© 2023 Game Identities/span>
            </div>
            <?php get_template_part( 'template-parts/component/footer-right' ); ?>
        </footer>
    </div>
</div>		
<?php wp_footer(); ?>

</body>
</html>