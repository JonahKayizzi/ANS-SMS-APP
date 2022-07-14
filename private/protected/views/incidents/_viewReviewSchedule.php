<?php if(isset($_GET['main_category'])){$main_category = $_GET['main_category'];}else{$main_category = "Occurrence";} ?>
<tr  style="background-color: <?php if($data->parent_occurrence != NULL){echo "orange";} ?>;" >
	<td ><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></td>
	<td ><?php echo CHtml::link(CHtml::encode($data->number), array('view', 'id'=>$data->id)); ?></td>
	<td ><?php echo CHtml::encode($data->occurrence); ?></td>
	<td ><?php echo CHtml::encode($data->place); ?></td>
	<td ><?php echo CHtml::encode($data->date); ?></td>
	<td >
		<?php echo CHtml::encode($data->main_category); ?>
	</td>
	<td >
		<?php echo CHtml::encode($data->category); ?>
	</td>
	<td >
		<?php echo CHtml::encode($data->reported_by); ?>
	</td>
	<td >
		<?php if($data->status0->name == 'CLOSED'){ ?> <span class="label label-success"><?php echo CHtml::encode($data->status0->name); ?></span> <?php } ?>
		<?php if($data->status0->name == 'PENDING'){ ?> <span class="label label-warning"><?php echo CHtml::encode($data->status0->name); ?></span> <?php } ?>
		<?php if($data->status0->name == 'INCOMING'){ ?> <span class="label label-primary"><?php echo CHtml::encode($data->status0->name); ?></span> <?php } ?>
		<?php if($data->status0->name == 'INITIATED'){ ?> <span class="label label-danger"><?php echo CHtml::encode($data->status0->name); ?></span> <?php } ?>
		<?php if($data->status0->name == 'MONITORED'){ ?> <span class="label label-default"><?php echo CHtml::encode($data->status0->name); ?></span> <?php } ?>
	</td>
</tr>