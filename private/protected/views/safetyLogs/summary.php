

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Safety Logs Summary</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Safety Logs Summary</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
				
                <div class="box-body">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'name',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				)); ?>
				<table class="table">
					<tr>
						<td>From: </td>
						<td>
						<?php
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'start_date',
							'value'=>$start_date,     
							'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
							),
							'htmlOptions'=>array(
								'class'=>'form-control'
							),
						));
						?> 
						</td>
						<td>To: </td>
						<td>
						<?php
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'end_date',
							'value'=>$end_date,     
							'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
							),
							'htmlOptions'=>array(
								'class'=>'form-control'
							),
						));
						?> 
						</td>
						<td>
						<input type="submit" value="Search " class="btn btn-primary" /> 
						</td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>
		</div>
		<div class="row">
            <div class="col-xs-12">

              <div class="box">
                
				
                <div class="box-body">
				<div style="width: 100%;"><?php echo CHtml::link('Print', array('/safetyLogs/summaryPrint', 'start_date'=>$start_date, 'end_date'=>$end_date), array('class'=>'btn btn-primary', 'target'=>'_blank', 'style'=>'width: 100%;')); ?></div>
				</div>
			</div>
		</div>
		</div>
		<div class="row">
            <div class="col-xs-12">

              <div class="box">
                
				
                <div class="box-body">
				<table class="table table-hover">
				<thead>
				<tr>
				<td>
				</td>
				<td>
				
				</td>
				<?php
				foreach($categories as $category_item){
				?>
					<td>
					<?php 
						/* echo $category_item->name;  */ 
						echo CHtml::link($category_item->name, array('/safetyLogs/category', 'id'=>$category_item->id)); 
					?>
					</td> 
				<?php
				}
				?>
				<td>
				Total
				</td>
				<td>
				<!-- Target -->
				</td>
				</tr>
				</thead>
				<tbody>
				<?php
				$i=0;
				$count_causes = array();
				foreach($causes as $cause_item){
				?>
					<tr>
					<td><?php echo $i;?></td>
					<th>
					<?php 
						/* echo $cause_item->name; */ 
						echo CHtml::link($cause_item->name, array('/safetyLogs/cause', 'id'=>$cause_item->id)); 
					?>
					</th>
					<?php
					$count_categories = 0;
					
					$k = 0;
					foreach($categories as $category_item){
						$count=SafetyLogs::getCatCause($cause_item->id,$category_item->id, $start_date, $end_date);
						$count_categories = $count_categories + $count;
						$k++;
						echo "<td> {$count} </td>";
					}
					
					?>
					<td style="<?php /* if($count_categories > $cause_item->target){echo "background-color: red; color: #fff;";}elseif($count_categories == $cause_item->target){echo "background-color: orange;";}else{echo "background-color: green; color: #fff;";} */ ?>">
						<b>
						<?php
							//echo SafetyLogsCauses::getLogCount($cause_item->id);
							echo $count_categories;
						?>
						</b>
					</td>
					<td>
						<?php /* echo number_format($cause_item->target); */ ?>
					</td>
					</tr>
				<?php
				$i++;
				}
				?>

				<tr>
				<td colspan=2>

				</td>
				<?php
				foreach($categories as $category_item){
					/* $count=SafetyLogsCategories::getLogCount($category_item->id);
					echo "<td> <b>{$count}</b> </td>"; */
					$count = SafetyLogs::model()->getCatCount($category_item->id, $start_date, $end_date);
					echo "<td> <b>{$count}</b> </td>";
				}
				?>
				<td>
					<b>
					<?php
						echo SafetyLogs::getTotalCount($start_date, $end_date);
					?>
					</b>
				</td>
				<td>
				
				</td>
				</tr>
				</tbody>

				</table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->