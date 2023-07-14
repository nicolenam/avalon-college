<?php get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg')?>)">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Alumni Community</h1>
        <div class="page-banner__intro">
            <p>Alumni Events and News</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section alumni-grid">
    <?php
while(have_posts()){
    the_post();
    $awards = get_field('achievements_and_awards');
    ?>

    <div class="alumni-container">
        <div class="alumni-image">
            <?php the_post_thumbnail('alumni-image-size'); ?>
        </div>
        <p class="alumni-title"><?php the_title(); ?></p>
        <div class="alumni-description">
            <span class="dashicons dashicons-awards"></span>
            <?php echo $awards; ?>
        </div>
    </div>

    <?php } ?>
</div>

<?php get_footer(); ?>