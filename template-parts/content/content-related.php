<h1 class="page-title text-white fw-bolder">Random Games for <?php the_title(); ?></h1>

<div class="row row-cols-1 row-cols-md-5 g-4">
        <?php
        // Get the tags of the current post
        $current_post_tags = get_the_tags();


        if ($current_post_tags) {
            $tag_ids = array();
            foreach ($current_post_tags as $tag) {
                $tag_ids[] = $tag->term_id;
            }

            $args = array(
                'post_type' => 'post', // Adjust the post type if necessary
                'posts_per_page' => 15, // Display all related posts
                'tag__in' => $tag_ids,
                'post__not_in' => array(get_the_ID()), // Exclude the current post
                'orderby' => 'rand' // Order the related posts randomly
            );

            $related_posts_query = new WP_Query($args);
            
            if ($related_posts_query->have_posts()) {
                while ($related_posts_query->have_posts()) {
                    $related_posts_query->the_post();
                    get_template_part( 'template-parts/component/card');
                }
                wp_reset_postdata();
            } else {
                echo 'No related posts found.';
            }
        } else {
            echo 'No tags found for this post.';
        }
        ?>
</div>

