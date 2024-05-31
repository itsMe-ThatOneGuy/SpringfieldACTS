<?php
get_header()
?>
<div class="main-container">
    <div class="hero">
        <div class="hero-title-container">
            <h1 class="hero-title">Springfield ACTS</h1>
            <h2 class="hero-sub-title">Area Churches Together in Service</h2>
            <div class="hero-icon-container">
                <a href="#card-list"><img src="<?php echo get_template_directory_uri(); ?>/assest/icons/down-arrow.png"></a>
            </div>
        </div>

    </div>

    <?php
    $array = [];
    foreach (get_categories() as $category) :
        $array[] = $category;
    endforeach;
    ?>

    <div class="content main-content">
        <div class="card-list-container" id="card-list">
            <div class="card">
                <div class="card-image-container">
                    <img src="<?php echo esc_url(get_image_url_by_title('events')) ?>" />
                </div>
                <div class="card-content-container">
                    <div class="card-title">
                        <h2><?php echo esc_html(get_field('card_1_title')); ?></h2>
                    </div>
                    <div class="card-paragraph">
                        <p><?php echo esc_html(get_field('card_1_paragraph')); ?></p>
                    </div>
                    <div class="card-button">
                        <a href="/index.php/events/">
                            <button><?php echo esc_html(get_field('card_1_button')); ?></button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card card-flip">
                <div class="card-image-container">
                    <img src="<?php echo esc_url(get_image_url_by_title('resources')) ?>" />
                </div>
                <div class="card-content-container">
                    <div class="card-title">
                        <h2><?php echo esc_html(get_field('card_2_title')); ?></h2>
                    </div>
                    <div class="card-paragraph">
                        <p><?php echo esc_html(get_field('card_2_paragraph')); ?></p>
                    </div>
                    <div class="card-button">
                        <a href="<?php echo get_category_link(get_cat_ID('resources')); ?>">
                            <button><?php echo esc_html(get_field('card_2_button')); ?></button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-image-container">
                    <img src="<?php echo esc_url(get_image_url_by_title('service')) ?>" />
                </div>
                <div class="card-content-container">
                    <div class="card-title">
                        <h2><?php echo esc_html(get_field('card_3_title')); ?></h2>
                    </div>
                    <div class="card-paragraph">
                        <p><?php echo esc_html(get_field('card_3_paragraph')); ?></p>
                    </div>
                    <div class="card-button">
                        <a href="<?php echo get_category_link(get_cat_ID('service')); ?>">
                            <button><?php echo esc_html(get_field('card_3_button')); ?></button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card card-flip">
                <div class="card-image-container">
                    <img src="<?php echo esc_url(get_image_url_by_title('churches')) ?>" />
                </div>
                <div class="card-content-container">
                    <div class="card-title">
                        <h2><?php echo esc_html(get_field('card_4_title')); ?></h2>
                    </div>
                    <div class="card-paragraph">
                        <p><?php echo esc_html(get_field('card_4_paragraph')); ?></p>
                    </div>
                    <div class="card-button">
                        <a href="<?php echo get_category_link(get_cat_ID('churches')); ?>">
                            <button><?php echo esc_html(get_field('card_4_button')); ?></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-main">
            <div class="contact-container">
                <div class="contact-title-container contact-title-container-homepage">
                    <h1 class="contact-title">Contact Us</h1>
                </div>
                <div class="contact-content-container">
                    <p><?php echo the_content() ?></p>
                </div>
            </div>
        </div>


    </div>
</div>

<?php get_footer() ?>