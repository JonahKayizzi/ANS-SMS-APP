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
						echo $category_item->name; 
					?>
					</td> 
				<?php
				}
				?>
				<td>
				Total
				</td>
				<td>
				Target
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
						echo $cause_item->name; 
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
					<td style="<?php if($count_categories > $cause_item->target){echo "background-color: red; color: #fff;";}elseif($count_categories == $cause_item->target){echo "background-color: orange;";}else{echo "background-color: green; color: #fff;";} ?>">
						<b>
						<?php
							//echo SafetyLogsCauses::getLogCount($cause_item->id);
							echo $count_categories;
						?>
						</b>
					</td>
					<td>
						<?php echo number_format($cause_item->target); ?>
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