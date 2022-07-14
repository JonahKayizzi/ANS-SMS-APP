<tr>
	<td><?php echo CHtml::encode($data->serial_no); ?></td>
	<td><?php echo CHtml::encode($data->description); ?></td>
	<td><?php 
		foreach ($data->rmConsequences as $item) {
			# code...
			echo CHtml::encode($item->details)."<br/>";
			}
	 ?></td>
	 <td><?php 
		foreach ($data->rmCurrentDefences as $item) {
			# code...
			echo CHtml::encode($item->details)."<br/>";
			}
	 ?></td>

	<td><?php echo CHtml::encode($data->current_risk_index); ?></td>
		 <td><?php 
		foreach ($data->rmTechnicalDefences as $item) {
			# code...
			echo CHtml::encode($item->details)."<br/>";
			}
	 ?></td>

	<td><?php echo CHtml::encode($data->theoretical_risk_index); ?></td>
	<td><?php echo CHtml::encode($data->risk_owner); ?></td>
	<td><?php echo CHtml::encode($data->actual_risk_index); ?></td>
</tr>