<style>

				table {
					border-collapse: collapse;
				   width:100%;
				margin:auto;
				}

				table, th, td {
					border: 1px solid black;
				}
						table th {
					background: #BCDAE6;
					padding:5px;
					text-align: left;
				   
				}
				textarea{
					width: 98%;
				}

				.number{
				width:40px;
				}
				table tr{
				border: 1px solid grey;
				}
				table td{
				padding:5px;
				border: 1px solid grey;
				}
				table .question{
							width:400px;
						}
				table .level{
							width:300px;
						}
					</style>
				<table style="border-bottom:none;">
				<tr><th><center>SAFETY MANAGEMENT SYSTEM GAP ANALYSIS</center></th></tr>
				<tr><td style="background:#C8E6BC;"><center><b>Safety Risk Management</b></center></td></tr>
				<tr><td ><center><b>ASSESSMENT CHECKLIST — AIR OPERATORS</b></center></td></tr>
				</table>
				<table cellspacing="0">
				   <tr><th class='number'>No</th><th class='question'>Organization risk parameter</th>

					<th>Answer</th><th>Status of implementation</th><th>Action Required</th></tr>        
				<?php foreach($questions as $qn ){ 
				include "sections.php";
					?>

				 <tr>
				   <td><?php echo $qn->question_no; ?></td>
				   <td><?php echo $qn->question; ?></td>

				   <?php 
				$answers = @QuestionnaireQuestionAnswers::model()->findAll("questionnaire_id ='{$model->questionnaire_id}' and question_id = '{$qn->question_id}'");
				   ?>
				<?php if(!empty($answers)){ 
				foreach($answers as $answer){ ?>

				<td>
					<?php echo $answer->answer; ?>
				   </td>
				   <td>
					 <?php echo $answer->status_of_implementation; ?>
				   </td>
				<td>
					 <?php $audit_form_info = @AuditForm::model()->findByAttributes(array('questionnaire'=>$model->questionnaire_id, 'questionnaire_sub_element'=>$qn->question_id)); echo @$audit_form_info->suggested_corrective_action.'<br />'; ?>
					 <?php echo $answer->action_required; ?>
				   </td>
				   

				<?php } }else{ ?>

				<?php } ?>   
				 </tr>
				<?php } ?>

				</table>
				<br/>
				<br/>
				<table style="width:40%">
				<tr>
					<th colspan="2">Summary</th>
				</tr>

				<tr>
					<td></td>
					<td><b>Subtotal</b></td>
				</tr>
				<?php
				$total = null;
				foreach ($summary as $item ) {
					?>
					<tr>
				<td><?php
				echo $item['answer'];
				?></td>
				<td><?php
				echo $item['count'];
				?>
				</td>
				</tr>
					<?php
					$total+=$item['count'];

				}
				?>
				<tr>
				<td>Total number of questions</td>
				<td><?php echo $total ?></td>
				</tr>
				</table>