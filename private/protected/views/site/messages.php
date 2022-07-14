<div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Messages</h3>
			  
			  <?php
				$limit_step = 10;
				$limit = 0;
				if(isset($_GET['direction'])){
					$direction = $_GET['direction'];
					if($direction == 'next'){
						if(isset($_GET['limit'])){
							$limit = $_GET['limit'];
							$limit = $limit + $limit_step;
						}else{
							$limit = 0;
						}		
					}
					if($direction == 'back'){
						if(isset($_GET['limit'])){
							$limit = $_GET['limit'];
							$limit = $limit - $limit_step;
							if($limit < 0){$limit = 0;}
						}else{
							$limit = 0;
						}		
					}
				}
				
				
			  ?>
			  <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><?php echo CHtml::link('«', array('site/dashboard', 'limit'=>$limit, 'direction'=>'back')); ?></li>
                  <li><?php echo CHtml::link('»', array('site/dashboard', 'limit'=>$limit, 'direction'=>'next')); ?></li>
                </ul>
              </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="todo-list">
				<?php
					$my_id = Yii::app()->user->id;
					
					$messages = @Notifications::model()->findAll("user = {$my_id} or status = 'sent' order by id desc limit {$limit}, {$limit_step}");
					foreach($messages as $message){
				?>
					<li>
					 
					  <span class="text"><?php echo $message->date_created; ?> </span> <?php echo substr($message->subject, 0, 90); ?>
					  
					 <!-- <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small> -->
					  
					  <div class="tools">
						<?php echo CHtml::link('<i class="fa fa-eye"></i>', array('notifications/view', 'id'=>$message->id)); ?>
					  </div>
					</li>
				<?php
					}
				?>
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>