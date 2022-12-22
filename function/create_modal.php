<?php
/**
 * Created by PhpStorm.
 * User: amesa
 * Date: 4/15/17
 * Time: 11:59 AM
 */

function createModal($id,$header,$body,$footer) {
    $modal ='
    <!-- Modal -->
    <div id="myModal'.$id.'l" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">'.$header.'r</h4>
          </div>
          <div class="modal-body">
            '.$body.'
          </div>
          <div class="modal-footer">
            '.$footer.'
          </div>
        </div>
    
      </div>
    </div>
    
    ';
    return $modal;
}