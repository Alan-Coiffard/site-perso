<?php

class arrowDown {

    public function arrowDown($link) {
        ?>
            <div class="hovicon effect-1 sub-a">
                <i onClick="document.getElementById('<?= $link ?>').scrollIntoView();" class="fa fa-angle-down arrow-down"></i>
            </div>
        <?php
    }
}