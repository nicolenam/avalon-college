<?php

get_header();

while(have_posts()){
    the_post(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg')?>)">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
            <p>replace later.</p>
        </div>

    </div>
</div>

<div class="container container--narrow page-section">

    <div class="generic-content">
        <p><?php the_content(); ?></p>
    </div>
    <?php
        $relatedPrograms = get_field('related_programs');

        if($relatedPrograms){
            
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">Subject(s) Taught</h2>';
                echo '<ul class="link-list min-list">';
                
                foreach($relatedPrograms as $pro) { ?>
    <li><a href=" <?php echo get_the_permalink($pro); ?>"><?php echo get_the_title($pro); ?></a></li>
    <?php }
            echo '</ul>';
        }
    ?>
</div>

<?php }

get_footer();
?>