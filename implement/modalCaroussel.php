<?php
// Nous créons une classe « Personnage ».
class modalCaroussel 
{

  public function afficherModalCaroussel($parsed){

    ?>
    <!-- Modal -->
    <div class="modal fade" id="ModalCaroussel" tabindex="-1" aria-labelledby="ModalCarousselLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
          <?php 
          $caroussel->afficherCaroussel($parsed);
          ?>
          </div>
        </div>
      </div>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCaroussel">
      Launch demo modal
    </button>
    <?php 

  }

}