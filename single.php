<?php
/** 
 * The single post template file is used to render a single post. WordPress uses the following path:

 * single-{post-type}-{slug}.php – (Since 4.4) First, WordPress looks for a template for the specific post. For example, if post type is product and the post slug is dmc-12, WordPress would look for single-product-dmc-12.php.
 * single-{post-type}.php – If the post type is product, WordPress would look for single-product.php.
 * single.php – WordPress then falls back to single.php.
 * singular.php – Then it falls back to singular.php.
 * index.php – Finally, as mentioned above, WordPress ultimately falls back to index.php.
*/
get_header();


while ( have_posts() ) :
	the_post();
?>
<div class="bg-body-tertiary">
	<div class="container py-5 mb-4">
        <h1 class="page-title text-white mb-4 fw-bolder"><?php the_title(); ?></h1>
		<div class="row mb-3">
			<div class="col-md-2">
				<img width="100%" height="auto" class="card-responsive" src="<?php if (get_the_post_thumbnail_url()) { echo get_the_post_thumbnail_url(); } ?>" alt=""/>
			</div>
			<div class="col-md-10">
				<div class="text-white"><?php the_content(); ?></div>
			</div>
		</div>
		
		<?php get_template_part( 'template-parts/component/tags' ); ?>
	</div>
</div>
<div class="container text-white">
  <div class="row">
	<div class="col-md-12">
		<?php get_template_part( 'template-parts/content/content-related' ); ?>
	</div>
  </div>
</div>

	<?php 


endwhile; 

get_footer();
