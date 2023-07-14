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

<div class="container container--narrow page-section">

    <?php

    while(have_posts()){
    the_post()?>

    <div class="alumni-container">
        <img src="" class="alumni-image">
        <div class="alumni-description">
            <p><?php the_content(); ?></p>
        </div>

    </div>

    <?php
    }
    ?>


</div>


<?php get_footer(); ?>