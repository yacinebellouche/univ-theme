<?php
get_header();

pageBanner();
?>
<div class="container container--narrow page-section">
    <?php
    ?>
    <div class="generic-content">
        <div class="row group">
            <div class="one-third">
                <?php the_post_thumbnail('professorportrait') ?>

            </div>
            <div class="two-thirds">
                <?php $likeCount = new WP_Query(array(
                    'post_type' => 'like',
                    'meta_query' => array(
                        array(
                            'key' => 'liked_professor_id',
                            'compare' => '=',
                            'value' => get_the_ID()
                        )
                    )
                ));
                $existStatus = 'no';
                if (is_user_logged_in()) {
                    $existQuery = new WP_Query(array(
                        'author' => get_current_user_id(),
                        'post_type' => 'like',
                        'meta_query' => array(
                            array(
                                'key' => 'liked_professor_id',
                                'compare' => '=',
                                'value' => get_the_ID()
                            )
                        )
                    ));
                    if ($existQuery->found_posts) {
                        $existStatus = 'yes';
                    }
                }

                ?>
                <span class="like-box" data-like="<?php if (isset($existQuery->posts[0]->ID)) echo $existQuery->posts[0]->ID; ?>" data-exists=<?= $existStatus ?> data-id=<?= get_the_ID() ?>>
                    <i class="fa fa-heart-o" aria-hidden="true"> </i>
                    <i class="fa fa-heart" aria-hidden="true"> </i>
                    <span class="like-count"><?= $likeCount->found_posts; ?></span>
                </span>
                <?php the_content() ?>
            </div>
        </div>
    </div>
    <?php
    $relatedPrograms = get_field('related_program');
    if ($relatedPrograms) {
        echo '<hr class ="section-break">';
        echo '<h2 class="headline headline--medium"> Subject(s) Taught </h2>';
        echo "<ul class='link-list min-list'>";
        foreach ($relatedPrograms as $program) { ?>
            <li><a href="<?= get_the_permalink($program) ?>"> <?= get_the_title($program) ?> </a></li>

    <?php
        }
        echo '</ul>';
    }
    ?>


</div>
<?php

get_footer();
?>