<?php get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg')?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">All Events</h1>
        <div class="page-banner__intro">
            <p>See what is going on in our world.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <div class="search--container">
        <svg class="search--icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path
                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
        </svg>
        <input class="search--bar" type="text" placeholder="Search Events...">
    </div>
    <?php
    // $today = date('Ymd');
    // $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    // $args = array(
    //     'post_type' => 'event',
    //     'posts_per_page' => 1,
    //     'meta_key' => 'event_date',
    //     'orderby' => 'meta_value_num',
    //     'order' => 'ASC',
    //     'meta_query' => array(
    //         array(
    //             'key' => 'event_date',
    //             'compare' => '>',
    //             'value'=> $today,
    //             'type' => 'numeric'
    //         )
    //     ),
    //     'paged' => $paged
    // );

    // $query = new WP_Query($args);

    while (have_posts()) {
        the_post();
        ?>

    <div class="event-summary">
        <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
            <span class="event-summary__month">
                <?php
                    $eventDate = new DateTime(get_field('event_date'));
                    echo $eventDate->format('M');
                    ?>
            </span>
            <span class="event-summary__day">
                <?php echo $eventDate->format('d'); ?>
            </span>
        </a>
        <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h5>
            <p>
                <?php echo wp_trim_words(get_the_content(), 18); ?>
                <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
            </p>
        </div>
    </div>

    <?php }

    // Pagination
    // echo paginate_links(array(
    //     'total' => $query->max_num_pages,
    //     'current' => $paged,
    // ));

    wp_reset_postdata();
    ?>

    <hr class="section-break">
    <p>Looking for a recap of past events?
        <a href="<?php echo site_url('/past-events'); ?>">Check out our past events archive</a>
    </p>
</div>

<?php get_footer(); ?>