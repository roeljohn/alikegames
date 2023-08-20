<div class="bg-body-tertiary py-3 mb-3 text-white">
	<div class="container">
		<div class="row">
			<h1 class="page-title">
				<?php
					echo get_search_query();
				?>
                - We can't find post in your keyword. 
			</h1>
            <?php get_search_form(); ?>
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