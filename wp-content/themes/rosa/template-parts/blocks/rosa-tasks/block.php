<?php

$title = get_field('title') ?: '';
$description = get_field('description') ?: '';

?>

<section class="rosa-block rosa-tasks container mb-lg-5 mb-3">
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
    <div class="row block-tasks-row">
        <?php if( have_rows('card') ): ?>
            <?php while( have_rows('card') ): the_row(); 
                $is_task_done = get_sub_field('is_task_done') ?: false;
                $number_1 = get_sub_field('number_1') ?: '';
                $number_2 = get_sub_field('number_2') ?: '';
                $title = get_sub_field('title') ?: '';
                $content = get_sub_field('content') ?: '';
            ?>
                <div class="col-md-4 col-12 task-box mb-3 <?= $is_task_done ? 'task-done' : 'task-pending'; ?>">
                    <div class="card">
                        <div class="card-numbers mb-lg-4 mb-3">
                            <p class="number-1"><?= esc_html($number_1); ?></p>
                            <?= $is_task_done ? '<div class="check"></div>' : '<p class="number-2">'.esc_html($number_2).'</p>' ?>
                        </div>
                        <div class="row">
                            <h3 class="card-title mb-lg-4 mb-3"><?= esc_html($title); ?></h3>
                            <div class="card-content">
                                <?= wp_kses_post($content); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No tasks found.</p>
        <?php endif; ?>
    </div>
</section>