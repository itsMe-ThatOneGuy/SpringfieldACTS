<?php get_header() ?>

<div class="main-content content-area">
    <main id="main" class="site-main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <!-- <div class="category-title-container">
                        <?php
                        $categories_list = get_the_category_list(', ');
                        if ($categories_list) {
                            printf('<h1 class="category-title">' . __('%1$s', 'springfieldacts') . '</h1>', $categories_list); // WPCS: XSS OK.
                        }
                        ?>
                    </div> -->
                    <div class="single-container">
                        <div class="single-title-container">
                            <h1 class="single-title"><?php the_title(); ?></h1>
                        </div>
                        <div class="single-featured-img-container">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('large', array('class' => 'featured-image'));
                            }
                            ?>
                        </div>
                        <div class="single-content-container">
                            <?php echo get_the_content(); ?>
                        </div>
                        <div class="single-meta-container">
                            <p>
                                <?php echo 'Posted on ';
                                the_date();
                                echo ' by ';
                                the_author()
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="single-controls">
                        <?php $category = get_the_category();
                        if (!empty($category)) {
                            $category_link = get_category_link($category[0]->term_id);
                            echo '<a href="' . esc_url($category_link) . '" class="back-to-category">' . __('Back', 'springfiledacts') . '</a>';
                        }
                        ?>
                    </div>
                </div>


    </main>
</div>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ?>