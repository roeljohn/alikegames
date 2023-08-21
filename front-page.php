<?php
/**
 * A front-page is a static homepage
 * Wordpress call this first instead of index.php or home.php
 * 
 * By default, WordPress sets your site’s home page to display your latest blog posts. This page
 * is called the blog posts index. You can also set your blog posts to display on a separate static
 * page. The template file home.php is used to render the blog posts index, whether it is being
 * used as the front page or on separate static page. If home.php does not exist, WordPress will
 * use index.php.
 * 
 * If front-page.php exists, it will override the home.php template
 * 
 * index.php last one to be called if home.php and front-page.php can find in wp
 */

get_header(); ?>

<div class="bg-body-tertiary">
    <div class="container">
        <header class="py-5 mb-4">
            <div class="text-white my-5">
                <h1 class="fw-bolder">Welcome to Game Identities!</h1>
                <p class="lead mb-0">Unlock Boundless Adventures: Navigate Similar Games with Our Tags</p>
            </div>
            <?php get_search_form(); ?>
        </header>
    </div>
</div>
<div class="container">
    <div class="row text-white ">
    <?php get_template_part( 'template-parts/component/site_description' ); ?>
    </div>
</div>
<div class="container pb-4">
    <h1 class="border-bottom mb-4 fw-bolder text-white">Tags</h1>
    <?php get_template_part( 'template-parts/component/tags-sort-by-count' ); ?>
</div>
<?php get_footer(); ?>