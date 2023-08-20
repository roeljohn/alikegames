<?php
/**
 * This file is for
 * tag.php
 * Rules
 * If tag.php does not exist, WordPress will look for a generic archive template, archive.php.
 */

get_header();

// Get the current tag
$tag = get_queried_object();
// Get the number of posts per page from the admin settings
$posts_per_page = get_option('posts_per_page');

// Get the current page number
$current_page = max(1, get_query_var('paged'));

// Calculate the offset for the query
$offset = ($current_page - 1) * $posts_per_page;

// Set up the query arguments
$query_args = array(
    'tag_id' => $tag->term_id,
    'posts_per_page' => $posts_per_page,
    'offset' => $offset
);

// Create a new instance of WP_Query
$query = new WP_Query($query_args);

if ( $query->have_posts() ) { ?>
<div class="bg-body-tertiary">
	<div class="container py-5 mb-4">
		<?php
			the_archive_title( '<h1 class="page-title text-white mb-4 fw-bolder">', '</h1>' );
			the_archive_description( '<p class="text-white">', '</p>' );
		?>
	</div>
</div>
<div class="container">
	<div class="row row-cols-1 row-cols-md-5 g-4">
		<?php
			while ($query->have_posts()) {
				$query->the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'template-parts/component/card');
				}
    // Calculate the total number of pages
    $total_pages = ceil($query->found_posts / $posts_per_page);

    // Output the pagination links
    echo '<nav aria-label="Page navigation example" class="w-100">';
	echo '<ul class="pagination justify-content-end">';
	// Output the pagination links
    if ($total_pages > 1) {
		if ($current_page > 1) {
			echo '<li class="page-item"><a href="' . get_pagenum_link($current_page - 1) . '" class="page-link border-white text-white rounded-0 prev">&laquo; Previous</a></li>';
		}
	
		for ($i = 1; $i <= $total_pages; $i++) {
			$class = ($i == $current_page) ? ' border-white active bg-body-tertiary' : '';
			echo '<li class="page-item"><a href="' . get_pagenum_link($i) . '" class="page-link border-white text-white rounded-0' . $class . '">' . $i . '</a></li>';
		}
	
		if ($current_page < $total_pages) {
			echo '<li class="page-item"><a href="' . get_pagenum_link($current_page + 1) . '" class="page-link border-white text-white rounded-0 next">Next &raquo;</a></li>';
		}
	}


    echo '</ul>';
	echo '</nav>';


    // Restore original post data
    wp_reset_postdata();
				// Previous/next page navigation.
		} else {
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content-none' );
		}
		?>
	</div>
</div>
<?php get_footer();
