<?php get_header(); ?>
<div class="page-main">
    <div class="page-container">
        <div class="page-title-container">
            <h1 class="page-title"><?php echo the_title() ?></h1>
        </div>
        <div class="page-content-container">
            <p><?php echo the_content() ?></p>
        </div>
    </div>
</div>
<?php get_footer(); ?>