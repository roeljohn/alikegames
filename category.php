<?php
/**
 * Rendering category archive index pages uses the following path in WordPress:

 * category-{slug}.php – If the category’s slug is news, WordPress will look for category-news.php.
 * category-{id}.php – If the category’s ID is 6, WordPress will look for category-6.php.
 * category.php
 * archive.php
 * index.php
 */

get_header();

if ( have_posts() ) {
	?>

<?php } ?>
<div class="container">
<?php
the_archive_title( '<h1 class="page-title">', '</h1>' );
			?>
	<?php get_template_part( 'template-parts/component/tags-related-category' ); ?>
</div>
<?php
get_footer();
