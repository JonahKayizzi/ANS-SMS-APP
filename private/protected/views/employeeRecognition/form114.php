<style> .workshop_cls td{border: 1px #000 solid; padding: 2px;} .workshop_td_cls {border-bottom: 1px #000 solid;}</style>
		<table style="width: 100%;">
			<tr>
				<td align="right"><b>SMS FORM 114</b></td>
			</tr>
			<tr>
				<td align="left"><b>EMPLOYEE SMS RECOGNITION NOMINATION</b></td>
			</tr>
		</table>
		
		<table style="width: 100%; margin: 10px 0px 10px 0px;" class="workshop_cls" cellspacing="0px" >
			<tr>
				<td><b>Nominator's Name:</b> <?php echo $model->nominator_name; ?><br /> <b>Signature:</b> ______________________ <b>Date:</b> <?php echo $model->date; ?></td>
				<td><b>Department /Section</b>: <?php echo $model->nominator_department; ?></td>
			</tr>
			<tr>
				<td><b>Nominee's Name:</b> <?php echo $model->nominee_name; ?></td>
				<td><b>Nominee's Department: </b> <?php echo $model->nominee_department; ?></td>
			</tr>
			<tr>
				<td><b>Nominee's Supervisor's Name:</b> <?php echo $model->nominee_supervisor_name; ?></td>
				<td><b>Supervisor's Signature:</b> ______________________</td>
			</tr>
		</table>
		
		<table style="width: 100%; margin: 10px 0px 10px 0px;" class="workshop_cls" cellspacing="0px" >
			<tr>
				<td><b>Description of action(s) worthy of recognition:</b><br /><?php echo $model->description_of_actions; ?></td>
			</tr>
			<tr>
				<td><b>Date and place observed:</b><br /><?php echo $model->date_observed; ?>, <?php echo $model->place_observed; ?></td>
			</tr>
		</table>
		
		<table style="width: 100%; margin: 10px 0px 10px 0px;" class="workshop_cls" cellspacing="0px" >
			<tr style="background-color: #ccc;" >
				<td><b>To be completed by the Safety Review Committee:</b></td>
			</tr>
		</table>
		
		<table style="width: 100%; margin: 10px 0px 10px 0px;" class="workshop_cls" cellspacing="0px" >
			<tr>
				<td><b>Date received:</b> <?php echo $model->date_received; ?></td>
				<td><b>Date reviewed:</b> <?php echo $model->date_reviewed; ?></td>
			</tr>
		</table>
		
		<table style="width: 100%; margin: 10px 0px 10px 0px;" class="workshop_cls" cellspacing="0px" >
			<tr style="" >
				<td><b>Additional information:</b><br /><?php echo $model->additional_information; ?></td>
			</tr>
		</table>
		
		<table style="width: 100%; margin: 10px 0px 10px 0px;" class="workshop_cls" cellspacing="0px" >
			<tr style="" >
				<td><b>Nomination Accepted:</b> <?php echo $model->nomination_accepted; ?></td>
				<td><b>Date:</b> <?php echo $model->accepted_date; ?></td>
				<td><b>Comments: </b><br /> <?php echo $model->accepted_comments; ?></td>
			</tr>
			<tr style="" >
				<td><b>Award Level Granted:</b> <?php echo $model->award_granted; ?></td>
				<td><b>Date:</b> <?php echo $model->award_granted_date; ?></td>
				<td><b>Comments: </b><br /> <?php echo $model->award_granted_comments; ?></td>
			</tr>
			<tr style="" >
				<td><b>Chairperson's Approval</b> <?php echo $model->chaiperson_approval; ?></td>
				<td><b>Date:</b> <?php echo $model->chaiperson_approval_date; ?></td>
				<td><b>Signature: </b> ______________________ </td>
			</tr>
		</table>