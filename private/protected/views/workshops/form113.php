<style> .workshop_cls td{border: 1px #000 solid; padding: 2px;} .workshop_td_cls {border-bottom: 1px #000 solid;}</style>
		<table style="width: 100%;">
			<tr>
				<td ><b>SMS FORM 113</b></td>
			</tr>
			<tr>
				<td align="left"><b>WORKSHOP/SEMINAR ATTENDANCE RECORD</b></td>
			</tr>
		</table>
		
		<table style="width: 100%;">
			<tr>
				<td ><b>Subject</b></td>
				<td class="workshop_td_cls"><?php echo $model->subject; ?></td>
				<td ><b>Hours</b></td>
				<td class="workshop_td_cls"><?php echo $model->hours; ?></td>
			</tr>
		</table>
		
		<table style="width: 100%;">
			<tr>
				<td ><b>Dates</b></td>
				<td class="workshop_td_cls"><?php echo $model->from_date; ?></td>
				<td ><b>To</b></td>
				<td class="workshop_td_cls"><?php echo $model->to_date; ?></td>
				<td ><b>Venue</b></td>
				<td class="workshop_td_cls"><?php echo $model->venue; ?></td>
			</tr>
		</table>
		<?php
			$items = @WorkshopAttendance::model()->findAll("status = 1");
			if(!empty($items)){
		?>
		<table style="width: 100%; margin: 10px 0px 10px 0px;" class="workshop_cls" cellspacing="0px" >
			<tr>
				<td><b>EMP.#</b></td>
				<td><b>NAME</b></td>
				<td><b>POSITION</b></td>
				<td><b>E-MAIL</b></td>
				<td><b>PHONE</b></td>
				<td><b>SIGNATURE</b></td>
			</tr>
			<?php  
				foreach($items as $item){
			?>
			<tr>
				<td><?php echo $item->employee_no; ?></td>
				<td><?php echo $item->name; ?></td>
				<td><?php echo $item->position; ?></td>
				<td><?php echo $item->email; ?></td>
				<td><?php echo $item->phone; ?></td>
				<td><?php echo $item->signature; ?></td>
			</tr>
			<?php  
				}
			?>
		</table>
		<?php
			}
		?>
		<h3>FACILITATOR(S)</h3>
		
		<?php
			$items = @WorkshopFacilitators::model()->findAll("status = 1");
			if(!empty($items)){
		?>
		<table style="width: 100%;" cellspacing="2px">
			<tr>
				<td></td>
				<td><b>Print Name</b></td>
				<td><b>Signature</b></td>
				<td><b>Organization</b></td>
			</tr>
			<?php  
				$k = 1;
				foreach($items as $item){
			?>
			<tr>
				<td><?php echo $k; ?></td>
				<td class="workshop_td_cls"><?php echo $item->print_name; ?></td>
				<td class="workshop_td_cls"></td>
				<td class="workshop_td_cls"><?php echo $item->organization; ?></td>
			</tr>
			<?php 
				$k++;
				}
			?>
		</table>
		<?php
			}
		?>