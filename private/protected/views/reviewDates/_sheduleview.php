<tr>
	<td><?php echo CHtml::encode($data->id); ?></td>
	<td><?php echo CHtml::encode($data->incident->occurrence); ?></td>
	<td><?php echo CHtml::encode($data->review_date); ?></td>
<td>
<?php
					
$investigators = @Investigators::model()->with('user_relation')->findAll("incident_id = '{$data->incident->id}' and t.status = 1");
					
					if(!empty($investigators)){
						foreach($investigators as $investigator){
							echo $investigator->user_relation->name."<br/>"; 
						}
					}
							?>

				</td>
						
</tr>