<?php
$post_id = get_the_ID(); // Replace with your post ID or use a variable to hold the post ID dynamically
$permalink = get_permalink($post_id);
?>
<div class="col ">
    <div class="card h-100 rounded-0 bg-body-tertiary border-0">
    <div class="card-body border-white border-bottom">
    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-0 link-body-emphasis text-decoration-none" href="<?php echo $permalink; ?>">
                <img width="100%" height="auto" src="<?php if (get_the_post_thumbnail_url()) { echo get_the_post_thumbnail_url(); } ?>" alt=""/>
                    <div class="col-lg-8">
                  <h6 class="mb-0"><?php the_title(); ?></h6>
                </div>
              </a>
        <p class="card-text text-white"><?php the_excerpt(); ?></p>
    </div>
    <?php get_template_part( 'template-parts/component/tags-related-post' ); ?>
    </div>
</div>