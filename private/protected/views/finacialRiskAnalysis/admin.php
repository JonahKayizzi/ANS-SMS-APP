
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Finacial Risk Analysis</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Finacial Risk Analysis</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-9">

              <div class="box">
                
				
                <div class="box-body">
				<table class="table" >
					<tr>
						<td>
						<?php 
						$items = @FinacialRiskAnalysis::model()->findAll("status = 1");
						$x = array();
						$y = array();
						foreach($items as $item){
							array_push($x, $item->hazzard_no);
							array_push($y, intval($item->cost));
						}
						
						
						
						$this->Widget('ext.highcharts.HighchartsWidget', array(
						   'options'=>array(
							  'title' => array('text' => 'Finacial Risk Analysis'),
							  'xAxis' => array(
								 'categories' => $x
							  ),
							  'yAxis' => array(
								 'title' => array('text' => 'Cost')
							  ),
							  'series' => array(
								 array('name' => 'Data', 'data' => $y),
							  )
						   )
						));
						?>
						</td>
					</tr>
				</table>
				
				
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'finacial-risk-analysis-grid',
					'dataProvider'=>$model->search(),
					//'filter'=>$model,
					'columns'=>array(
						'id',
						/* 'hazzard_no', */
						/* array('header' => 'Hazard #', 'value' => '@$data->hazard->occurrence'), */
						array('header' => 'Account', 'value' => 'CHtml::link(@$data->hazard->occurrence, Yii::app()->createUrl("incidents/view",array("id"=>$data->hazzard_no)))', 'type'=>'raw'),
						'date',
						'action',
						'cost',
						'warranty',
						/*
						'approved_by',
						'date_modified',
						*/
						array(
							'class'=>'CButtonColumn',
							'template'=>'<td>{view}</td><td>{update}</td><td>{delete}</td>',
							'buttons'=>array(
								'view'=>array(
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/1463413137_icon-111-search.png',
								),
								'update'=>array(
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/1463413089_icon-136-document-edit.png',
								),
								'delete'=>array(
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/1463413186_delete_unapprove_discard_remove_x_red.png',
								),
							),
						),
					),
				)); ?>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			<div class="col-xs-3">
				<div class="box box-default">
					<div class="box-header with-border">
					  <!-- <i class="fa fa-warning"></i> -->
					  <h3 class="box-title">Operations</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
					  <ul>
						<li><?php echo CHtml::link('All Entries', array('/'.Yii::app()->getController()->getId().'/admin')); ?></li>
						<li><?php echo CHtml::link('New Entry', array('/'.Yii::app()->getController()->getId().'/create')); ?></li>
					  </ul>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				  
				  
			</div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

