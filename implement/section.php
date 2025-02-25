<?php

class section {
// Nous déclarons une méthode dont le seul but est d'afficher un texte.
    public function afficherSection($info)
    {
        if(!empty((array)$info) && !empty($info->name)) {
            if(
                !empty((array)$info->list) || 
                !empty($info->text)) {
        ?>
        <!-- Section -->
        <section>
            <h2><?= $info->name ?></h2>
            <?php if(!empty($info->text)) { ?>
                <p class="content">
                    <?php echo $info->text; ?>
                </p>
            <?php } ?>
            <?php if(!empty($info->list)) { ?>
                <ul class="content">
                    <?php
                    foreach ($info->list as $list) {
                        ?>
                        <li><?php echo $list; ?></li>
                        <?php
                    }
                    ?>
                </ul>
            <?php } ?>
        </section>
        <?php 
        }}
    }
    public function afficherSectionEducation($info)
    {
        if(!empty((array)$info) && !empty($info->name)) {
            if(
                !empty((array)$info->list) || 
                !empty($info->text)) {
        ?>
        <!-- Section -->
        <section class="education">
            <h2 class="title"><?= $info->name ?></h2>
            <div class="article_list">
                <?php if(!empty($info->text)) { ?>
                    <p class="content">
                        <?php echo $info->text; ?>
                    </p>
                <?php } ?>
                <?php if(!empty($info->list)) { 
                    foreach ($info->list as $list) {
                ?>
                <article class="content">
                    <div class="date"><?= $list->date ?> - <?= $list->date ?></div>
                    <div class="infos">
                        <h3><?= $list->level ?> | <?= $list->spe ?></h3>
                        <p><?= $list->university ?> - <?= $list->city ?></p>
                    </div>
                </article>
                <?php }} ?>
            </div>
        </section>
        <?php 
        }}
    }
}
