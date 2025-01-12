<?php

$title = get_field('title') ?: '';
$description = get_field('description') ?: '';

?>

<section class="rosa-block rosa-card container mb-lg-5 mb-3">
    <div class="row block-main-row mb-lg-5 mb-3">
        <div class="col-lg-2 col-md-4 col-auto mb-2">
            <h2 class="subheading"><?= esc_html($title) ?></h2>
        </div>
        <div class="col-lg-9 notations mb-2">
            <?= esc_html($description) ?>
        </div>
        <div class="col-12">
            <div class="underline"></div>
        </div>
    </div>
    <?php
    $card = get_field('card');
    if( $card ): ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="card-content col-xxl-6 col-xl-5 col-12">
                        <h3 class="card-heading"><?= $card['title'] ?></h3>
                        <div class="content mb-lg-5 mb-3">
                            <?= $card['content'] ?>
                        </div>
                        <div class="button-row">
                            <a url="<?= $card['button']['url'] ?>" class="button card-button"><?= $card['button']['title'] ?></a>
                            <div class="card-number"><?= $card['number'] ?></div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-7 d-none d-xl-block">
                        <div class="card-image" style="background: url('<?= $card['background']['url'] ?>')" ></div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>