<?php

class arrowUp {

    public function arrowUp($link) {
        ?>
            <div class="hovicon-up effect-1 sub-a">
                <i onClick="document.getElementById('<?= $link ?>').scrollIntoView();" class="fa fa-angle-up"></i>
            </div>
        <?php
    }
}