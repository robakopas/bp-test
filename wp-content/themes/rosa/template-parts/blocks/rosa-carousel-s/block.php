<?php

$title = get_field('title') ?: '';

?>

<section class="rosa-block rosa-card container mb-lg-5 mb-3">
    <div class="row block-main-row block-carousel-main-row mb-lg-5 mb-3">
        <div class="col-lg-2 col-md-4 col-auto mb-2">
            <h2 class="subheading"><?= esc_html($title) ?></h2>
        </div>
        <div class="col-auto notations mb-2">
            <div class="custom-nav">
                <button id="prev-1" class="custom-prev disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <button id="next-1" class="custom-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
        <div class="col-12">
            <div class="underline"></div>
        </div>
    </div>
    <div id="carousel-1" class="owl-carousel">
        <?php if( have_rows('carousel') ): ?>
            <?php while( have_rows('carousel') ): the_row(); 
                $is_complete = get_sub_field('is_complete') ?: false;
                $number_1 = get_sub_field('number_1') ?: '';
                $number_2 = get_sub_field('number_2') ?: '';
                $text = get_sub_field('text') ?: '';
            ?>
                <div class="carousel-item-small task-box mb-3 <?= $is_complete ? 'task-done' : 'task-pending'; ?>">
                    <div class="card">
                        <div class="card-numbers mb-lg-4 mb-3">
                            <p class="number-1"><?= esc_html($number_1); ?></p>
                            <?= $is_complete ? '<div class="check"></div>' : '<p class="number-2">'.esc_html($number_2).'</p>' ?>
                        </div>
                        <div class="row">
                            <h3 class="card-title mb-lg-4 mb-3"><?= esc_html($text); ?></h3>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>