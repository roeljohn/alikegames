<?php
/**
 * Likewise, 404 template files are called in this order:
 *
 * 404.php
 * index.php
 */

get_header();
?>

<div class="bg-body-tertiary py-3 text-white">
	<div class="container">
		<div class="row">
			<h1 class="page-title">
				Post Not Found
			</h1>
            <?php get_search_form(); ?>
		</div>
	</div>
</div>
<div class="bg-body-tertiary py-3 mb-3 text-white">
	<div class="container">
		<div class="row">
			<h1 class="page-title text-center display-1 fw-bolder">
				404
			</h1>
		</div>
	</div>
</div>
<div class="container">
		<h1 class="page-title text-white">
			Suggestions
		</h1>
		<div class="row row-cols-1 row-cols-md-5 g-4">
			<?php get_template_part('template-parts/component/random-post'); ?>
		</div>
</div>
<?php
get_footer();
