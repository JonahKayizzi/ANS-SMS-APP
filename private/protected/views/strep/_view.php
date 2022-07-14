<tr  style="border-bottom: 1px #ccc solid;" class="sms_tr" >
	<td style="border-bottom: 1px #ccc solid; padding:5px 0px;"><input type="checkbox" name="id[]" value="<?php echo $data->id ?>"></td>
	<td style="border-bottom: 1px #ccc solid; padding:5px 0px;"><?php echo CHtml::link(CHtml::encode($data->id), array('index#')); ?></td>
	<td style="border-bottom: 1px #ccc solid; padding:5px 0px;"><?php echo CHtml::link(CHtml::encode($data->number), array('view', 'id'=>$data->id)); ?></td>
	<td style="border-bottom: 1px #ccc solid; padding:5px 0px;"><?php echo CHtml::encode($data->occurrence); ?></td>
	<td style="border-bottom: 1px #ccc solid; padding:5px 0px;"><?php echo CHtml::encode($data->place); ?></td>
	<!-- <td><?php /* echo CHtml::encode($data->time); */ ?></td> -->
	<!-- <td><?php /* echo CHtml::encode($data->aircraft_registration); */ ?></td> -->
	<!-- <td><?php /* echo CHtml::encode($data->operator); */ ?></td> -->
	<!-- <td><?php /* echo CHtml::encode($data->departure_point); */ ?></td> -->
	<!-- <td><?php /* echo CHtml::encode($data->persons_on_board); */ ?></td> -->
	<!-- <td><?php /* echo CHtml::encode($data->date); */ ?></td> -->

	<td style="border-bottom: 1px #ccc solid; padding:5px 0px;"><?php echo CHtml::encode($data->reported_by); ?></td>
	<td style="border-bottom: 1px #ccc solid; padding:5px 0px;"><?php echo CHtml::encode($data->modified); ?></td>
	<td style="border-bottom: 1px #ccc solid; padding:5px 0px;">
		<?php echo CHtml::encode($data->main_category); ?>
	</td>
	<td style="border-bottom: 1px #ccc solid; padding:5px 0px;">
		<?php echo CHtml::encode($data->category); ?>
	</td>
	<td style="border-bottom: 1px #ccc solid; padding:5px 0px;">
		<?php echo CHtml::encode($data->status0->name); ?>
	</td>
</tr>