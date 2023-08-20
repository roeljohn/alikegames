<?php
/**
 * This file is for
 * author.php
 * category.php
 * taxonomy.php
 * date.php
 * tag.php
 * archive.php
 * Rules
 * If category.php does not exist, WordPress will look for a generic archive template, archive.php.
 */

get_header();

if ( have_posts() ) { ?>
	<?php
		the_archive_title( '<h1 class="page-title">This is archive.php ', '</h1>' );
	?>

	<?php
		while ( have_posts() ) {
			the_post();

			/*
			* Include the Post-Format-specific template for the content.
			* If you want to override this in a child theme, then include a file
			* called content-___.php (where ___ is the Post Format name) and that will be used instead.
			*/
			get_template_part( 'template-parts/content/content-excerpt', get_post_format() );
		}

		// Previous/next page navigation.
} else {
	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );
}

get_footer();
