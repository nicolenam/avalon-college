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

<div class="alumni-container">
    <?php
while(have_posts()){
    the_post();
    $awards = get_field('achievements_and_awards');
    $thumbnail = get_field('thumbnail');
    ?>


    <a class="alumni-link" href="<?php the_permalink(); ?>">
        <div class="alumni-card">
            <div class="alumni-image">
                <img src="<?php echo  $thumbnail['url']; ?>" alt="">
            </div>
            <p class=" alumni-title"><?php the_title(); ?></p>
            <?php
                if($awards !== false && $awards !== 'N/A'){ ?>
            <div class="alumni-description">
                <span class="dashicons dashicons-awards"></span>
                <?php echo $awards; ?>
            </div>
            <?php
            }else{ ?>
            <?php
            }
            ?>

        </div>

    </a>

    <?php } ?>
</div>

<?php get_footer(); ?>