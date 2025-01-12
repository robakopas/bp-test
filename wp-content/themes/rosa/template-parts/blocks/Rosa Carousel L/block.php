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
                <button id="prev-2" class="custom-prev disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <button id="next-2" class="custom-next">
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
    <div id="carousel-2" class="slider-l owl-carousel">
        <?php if( have_rows('carousel') ): ?>
            <?php while( have_rows('carousel') ): the_row(); 
                $number_1 = get_sub_field('number_1') ?: '';
                $number_2 = get_sub_field('number_2') ?: '';
                $title = get_sub_field('title') ?: '';
                $text = get_sub_field('text') ?: '';
                $image = get_sub_field('image') ?: '';
            ?>
                <div class="carousel-item-large task-box mb-3">
                    <div class="card">
                        <div class="row justify-content-between">
                            <div class="col-sm-6 card-l-left mb-5 mb-sm-0">
                                <di class="mb-3">
                                    <h3 class="card-title mb-lg-4 mb-3"><?= esc_html($title); ?></h3>
                                    <p><?=  wp_trim_words(esc_html($text), 13, '...'); ?></p>
                                </di>
                                <div class="card-earn">
                                    <p class="earn-text">Earn</p>
                                    <p class="number-2"><?= esc_html($number_2) ?></p>
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6 card-l-right">
                                <p class="number-1"><?= esc_html($number_1); ?></p>
                                <img src="<?= esc_html($image) ?>" alt="image">
                            </div>           
                        </div>           
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>