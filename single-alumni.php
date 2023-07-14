<?php
get_header();

while(have_posts()){
    the_post(); 
    $mentorship = get_field('mentorship');
    $awards = get_field('achievements_and_awards');
    
?>

<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg')?>)">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Meet: <?php the_title(); ?></h1>
        <div class="page-banner__intro">
            <p>replace later.</p>
        </div>

    </div>
</div>

<div class="container container--narrow page-section">
    <div class="alumni-content">
        <h2>Name: <?php the_title(); ?></h2>

        <?php if( $awards !== false AND $awards !== 'N/A'){ ?>
        <h3>Awards:</h3>
        <?php 
       echo $awards;
        }else{
        }
        ?>

        <h3>Calendar:</h3>

    </div>
</div>

<?php }
get_footer(); 
?>