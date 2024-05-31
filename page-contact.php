<?php get_header(); ?>
<div class="content-area main-content contact-main">
    <main id="main" class="site-main">
        <div class="contact-container">
            <div class="contact-title-container">
                <h1 class="contact-title"><?php echo the_title() ?></h1>
            </div>
            <div class="contact-content-container">
                <p><?php echo the_content() ?></p>
            </div>
        </div>
    </main>
</div>
<?php get_footer(); ?>