<div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">To Do List</h3>
			  
			 <!-- <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">«</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div> -->

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="todo-list">
				<?php
					$my_id = Yii::app()->user->id;
					$incidents = @Incidents::model()->findAll("current_user_id = {$my_id} or investigator_id = {$my_id}");
					foreach($incidents as $incident){
				?>
					<li>
					 
					  <span class="text"><?php echo $incident->number; ?> </span> <?php echo substr($incident->occurrence, 0, 60); ?>
					  
					 <!-- <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small> -->
					  
					  <div class="tools">
						<?php echo CHtml::link('<i class="fa fa-eye"></i>', array('incidents/view', 'id'=>$incident->id)); ?>
					  </div>
					</li>
				<?php
					}
				?>
				<?php
					$caps = @AuditForm::model()->findAll("current_user_id = {$my_id}");
					foreach($caps as $cap){
				?>
					<li>
					 
					  <span class="text">CAP #<?php echo $cap->issue_no; ?></span> <?php echo substr(@$cap->auditPlan->title, 0, 60); ?>
					  
					  <!-- <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small> -->
					  
					  <div class="tools">
						<?php echo CHtml::link('<i class="fa fa-eye"></i>', array('auditForm/view', 'id'=>$cap->issue_no)); ?>
					  </div>
					</li>
				<?php
					}
				?>
				<?php
					$srs = @SafetyRecommendations::model()->findAll("current_user_id = {$my_id}");
					foreach($srs as $sr){
				?>
					<li>
					 
					  <span class="text">SAFETY REQUIREMENT #<?php echo $sr->id; ?> <?php echo $sr->source; ?></span> <?php echo substr($sr->source_category, 0, 60); ?>
					  
					  <!-- <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small> -->
					  
					  <div class="tools">
						<?php echo CHtml::link('<i class="fa fa-eye"></i>', array('safetyRecommendations/view', 'id'=>$sr->id)); ?>
					  </div>
					</li>
				<?php
					}
				?>
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>