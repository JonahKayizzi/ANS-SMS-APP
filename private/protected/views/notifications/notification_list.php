                             <div class="list-group">
                    <?php
                    foreach ($notifications as $item ) {
                  
                       ?>

                        <a href="#notification_<?php echo $item->id ?>" id="<?php echo $item->id ?>" data-toggle="modal" data-target="#notification_<?php echo $item->id ?>" class="message-link list-group-item <?php echo $class ?>">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">
                                </label>
                            </div>
                            <?php
                            if($item->urgent==1){
                                ?>
                                                            <span class="glyphicon glyphicon-star yellow-text"></span>
                                <?php
                            }else{

                                ?>
                                                            <span class="glyphicon glyphicon-star-empty"></span>

                                <?php



                            }

                            ?>



                            <span class="name" style="min-width: 120px;
                                display: inline-block;"><?php echo $item->user_from_relation->name ?></span> <span class=""><?php echo $item->subject ? $item->subject:strip_tags($item->description)  ?></span>
                            <span class="text-muted" style="font-size: 11px;"><?php echo strip_tags($item->description) ?></span> <span
                                class="badge">
<?php echo Yii::app()->dateFormatter->format("dd MMM yyyy", $item->date_created)?>
                            </span>
                            <!--      <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                </span></span> -->
                            </a>
                       
<!-- Modal -->
<div class="modal fade" id="notification_<?php echo $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $item->subject ? $item->subject:strip_tags($item->description)  ?></h4>
      </div>
      <div class="modal-body">
     <?php echo $item->description ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

                       <?php
                    }
                    ?>
               </div>