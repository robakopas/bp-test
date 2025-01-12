<?php

$player_avatar = get_field('player_avatar', 'option');

?>
<div class="player-card mb-3">
    <div class="player-inner"></div>
    <div class="container player-content">
        <div class="row player-about mb-4">
            <div class="col-auto pb-3 player-avatar">
                <img src="<?= $player_avatar ?: '' ?>" alt="Player avatar">
            </div>
            <div class="col-auto pb-3 player-info">
                <div class="player-username">
                    X @shroud
                </div>
                <div class="player-menu">
                    <ul>
                        <li><a href="#wallet">Wallet</a></li>
                        <li><a href="#other">Other</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="underline"></div>
            </div>
        </div>
        <div class="row player-points">
            <div class="col-12 player-points-title">
                TOTAL POINTS
            </div>
            <div class="col-12 player-points-counter" data-target="1250">
                0
            </div>
            <div class="col-12 player-level mt-4">
                <div class="experience-bar mb-2" data-progress="350">
                    <div class="experience-fill" style="width: 0;"></div>
                </div>
                <div class="experience-text">
                    <div class="experience-text-start">
                        LVL 1
                    </div>
                    <div class="experience-text-end">
                        LVL 2
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const experienceBar = document.querySelector('.experience-bar');
    const experienceFill = document.querySelector('.experience-fill');
    const experienceTextStart = document.querySelector('.experience-text-start');
    const experienceTextEnd = document.querySelector('.experience-text-end');
    const pointsCounter = document.querySelector('.player-points-counter');

    let target = parseFloat(experienceBar.getAttribute('data-progress'));
    target = target - 100;

    const pointsTarget = parseInt(pointsCounter.getAttribute('data-target'));
    
    let currentProgress = 0;
    let level = 1;
    const increment = 2; // Increment speed for the progress
    const speed = 10; // Speed of the animation in milliseconds

    function updateExperienceBar() {
      if (currentProgress <= target) {
        currentProgress += increment;

        experienceFill.style.width = `${(currentProgress % 100)}%`;

        const points = (currentProgress / target) * pointsTarget;
        if (points <= pointsTarget) {
            pointsCounter.textContent = Math.round(points);
        }

        if (currentProgress >= level * 100) {
          level++;
          experienceTextStart.textContent = `LVL ${level}`;
          experienceTextEnd.textContent = `LVL ${level + 1}`;
        }

        setTimeout(updateExperienceBar, speed);
      }
    }

    updateExperienceBar();
  });
</script>
