<?php
/**
 * The header.php contains the head section of a WordPress site, and it is commonly called at the start 
 * of all the template files. It usually contains the header information, analytics, calls to CSS files, 
 * site navigation, page titles, site logo, etc.
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> data-bs-theme="dark">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script async src="https://static.addtoany.com/menu/page.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
	      <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-WZQHS9PJY1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-WZQHS9PJY1');
    </script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<nav class="py-2 bg-body-tertiary">
    <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-2">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img width="150" height="auto" src="http://localhost/epithets/wp-content/uploads/2023/08/alikegameslogo.png" />
      </a>

      <?php get_search_form(); ?>
    </header>
  </div>
  </nav>


  <header class="py-3">
    <div class="container d-flex flex-wrap justify-content-center align-items-center align-medium">

        <?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<span class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none text-white">','</span>' );
}
?>
      <div class="align-middle text-white">
        <?php $tagline = get_bloginfo('description');
    echo $tagline; ?>
      </div>
    </div>
  </header>