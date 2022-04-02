<li role="listitem" class="<?php if($i == 0){ echo 'uk-open'; } ?>">
    <a class="uk-accordion-title" href="#"><?= $title; ?></a>
    <div class="uk-accordion-content">
        <?php accessibilityFormater($text); ?>
    </div>
</li>