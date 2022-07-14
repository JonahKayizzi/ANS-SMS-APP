<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<div style="width :900px;margin:auto">
	<div class="pull-right">
<h4>SMS FORM 122</h4>
	</div>
<div>
	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'date',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<table>
	<tr>
		<td>From </td>
		<td>
			<?php
			// $date = date('Y-m-d');
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'datepicker-showButtonPanel',
				'value'=>$st_dt,    
				'options'=>array(
					'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
					'showButtonPanel'=>true,
					'dateFormat'=>'yy-mm-dd',
				),
				'htmlOptions'=>array(
					'style'=>''
				),
			));
			?>
		</td>
		<td>To</td>
		<td>
			<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'datepicker-showButtonPanel2',
				'value'=>$end_dt,    
				'options'=>array(
					'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
					'showButtonPanel'=>true,
					'dateFormat'=>'yy-mm-dd',
				),
				'htmlOptions'=>array(
					'style'=>''
				),
			));
			?>
		</td>

		<td>
	
		</td>
		<td><input type="submit" value="Search " class="btn btn-primary" /></td>
		<td width="50%"></td>
	</tr>
</table>
<?php $this->endWidget(); ?>
<h4>HAZARD AND RISK MANAGEMENT REGISTER FOR ANS</h4>
	</div>
<table class="table table-bordered table-striped">
	<thead>
	<tr>
		<td rowspan="3">SN</td>
		<td rowspan="3">Description of hazard</td>
				<td rowspan="3">Description of consquences</td>
				<td colspan="5">Risk Assessment</td>
				<td>Evaluation</td>
		</tr>
		<tr >
			<td rowspan="2">Current Defences</td>
			<td rowspan="2">Current Risk Index</td>
			<td colspan="2">Further Actions to reduce the tisks</td>

			<td rowspan="2">Risk Owner</td>
			<td rowspan="2">Actual Risk Index</td>
		</tr>
		<tr>
			<td>Technical and Administrative Defences</td>
			<td>Technical Risk Index</td>
		</tr>
		</thead>
		<tbody>




		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$model,
			'itemView'=>'_122view',
		)); ?>



		</tbody>
</table>

<table class="table">
	<tr>
		<td>
			<b>Evaluated By:</b><br/><br/>
					Name:<br/><br/>
					Date:<br/><br/>


		</td>
		<td> Signiture</td>
	</tr>

		<tr>
		<td>
			<b>Approved By:</b><br/><br/>
					Name:<br/><br/>
					Date:<br/><br/>


		</td>
		<td> Signiture</td>
	</tr>
</table>
<table class="table">


		<tr><td><b>Next Evaluation Date</b><br/></td></tr>

				<tr><td><b>Next Review Date</b><br/></td></tr>
	</table>
</div>