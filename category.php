<?php get_header(); ?>

<div class="content-area main-content">
    <main id="main" class="site-main">

        <?php if (have_posts()) : ?>

            <div class="page-header">
                <h1 class="page-title"><?php single_cat_title(); ?></h1>
                <?php if (category_description()) : ?>
                    <p class="category-description"><?php echo category_description(); ?></p>
                <?php endif; ?>
            </div>

            <!-- Tag Filter and Sorting Form -->
            <div class="category-content">
                <div class="controller-top">
                    <form method="GET" id="filter-sort-form">
                        <div class="form-input">
                            <label for="tag-filter">Filter</label>
                            <select name="tag" id="tag-filter">
                                <option value="">All</option>
                                <?php
                                // Get the current category ID
                                $category = get_queried_object();
                                $category_id = $category->term_id;

                                // Get tags related to the posts in the current category
                                $tags = get_tags_by_category($category_id);

                                // Output tags as options
                                foreach ($tags as $tag) {
                                    $selected = (isset($_GET['tag']) && $_GET['tag'] === $tag->slug) ? ' selected="selected"' : '';
                                    echo '<option value="' . esc_attr($tag->slug) . '"' . $selected . '>' . esc_html($tag->name) . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-input">
                            <label for="sort-by">Sort</label>
                            <select name="sort" id="sort-by">
                                <option value="date" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'date') ? 'selected' : ''; ?>>Date</option>
                                <option value="title" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'title') ? 'selected' : ''; ?>>Title</option>
                            </select>
                        </div>

                        <button class="form-input button" type="button" id="reset-button">Reset</button>
                    </form>
                </div>

                <script>
                    document.getElementById('tag-filter').addEventListener('change', function() {
                        document.getElementById('filter-sort-form').submit();
                    });

                    document.getElementById('sort-by').addEventListener('change', function() {
                        document.getElementById('filter-sort-form').submit();
                    });
                    document.getElementById('reset-button').addEventListener('click', function() {
                        document.getElementById('tag-filter').value = '';
                        document.getElementById('sort-by').value = 'date';
                        document.getElementById('filter-sort-form').submit();
                    });
                </script>

                <?php
                /* Modify the query to filter by tag and sort if a tag or sorting option is selected */
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'category_name' => single_cat_title('', false),
                    'posts_per_page' => 4,
                    'paged' => $paged,
                );

                if (isset($_GET['tag']) && !empty($_GET['tag'])) {
                    $args['tag'] = sanitize_text_field($_GET['tag']);
                }

                if (isset($_GET['sort']) && !empty($_GET['sort'])) {
                    $sort = sanitize_text_field($_GET['sort']);
                    if ($sort === 'title') {
                        $args['orderby'] = 'title';
                        $args['order'] = 'ASC';
                    } elseif ($sort === 'comment_count') {
                        $args['orderby'] = 'comment_count';
                        $args['order'] = 'DESC';
                    } else {
                        $args['orderby'] = 'date';
                        $args['order'] = 'DESC';
                    }
                } else {
                    $args['orderby'] = 'date';
                    $args['order'] = 'DESC';
                }

                $query = new WP_Query($args);
                ?>

                <div class="post-list">
                    <?php
                    /* Start the Loop */
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            $first_image_url = get_first_image_url();
                    ?>

                            <div class="post-card">
                                <div class="post-image-container">
                                    <?php if ($first_image_url) {
                                        echo '<img src="' . esc_url($first_image_url) . '" alt="First image">';
                                    } else {
                                        echo '<img src="' . esc_url(get_image_url_by_title('default')) . '" alt="Default Image">';
                                    } ?>
                                </div>
                                <div class="post-content-container">
                                    <div class="post-card-title">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                                    </div>
                                    <div class="post-card-paragraph">
                                        <p><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>

                                    </div>
                                    <div class="post-controls">
                                        <a href=" <?php the_permalink(); ?>">Continue Reading</a>
                                    </div>
                                </div>

                                <div class="post-date-container">
                                    <p><?php the_date() ?></p>
                                </div>
                            </div>

                        <?php endwhile; ?>
                </div>

                <div class="controller-bottom">
                    <?php
                        $pagination_args = array(
                            'total' => $query->max_num_pages,
                            'current' => $paged,
                            'format' => '?paged=%#%',
                            'add_args' => array(
                                'tag' => isset($_GET['tag']) ? sanitize_text_field($_GET['tag']) : '',
                                'sort' => isset($_GET['sort']) ? sanitize_text_field($_GET['sort']) : '',
                            ),
                        );
                        echo paginate_links($pagination_args); ?>
                </div>

            <?php
                    endif;
                    wp_reset_postdata();
            ?>
        <?php else : ?>

            <p>No posts found in this category.</p>

        <?php endif; ?>
            </div>
    </main>
</div>

<?php get_footer(); ?>