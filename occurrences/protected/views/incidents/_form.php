		
		<div class="container">
			
			<div class="row" >

					<div class="col-lg-12" style="text-align: center;" >
					<H4><i>
							<?php 


							$incident=$_GET['category'];
							if($_GET['category'] == 'Incident'){
								$cat = "INCIDENT";
								$m_cat = "INC";
								$category_array = array('Accident'=>'Accident', 'Minor'=>'Minor', 'Serious'=>'Serious', 'Other'=>'Other');
								echo "REPORT {$cat}";
							}elseif($_GET['category'] == 'Hazard'){
								$cat = "HAZARD";
								$m_cat = "HZD";
								$category_array = array('OSHE'=>'OSHE', 'Aviation'=>'Aviation');
								echo "REPORT {$cat}";
							}elseif($_GET['category'] == 'SITREP'){
								$cat = "SITREP";
								$m_cat = "INC";
								$category_array = array('SITREP'=>'SITREP');
								echo "{$cat}";
							}elseif($_GET['category'] == 'Issue'){
								$cat = "ISSUE";
								$m_cat = "INC";
								$category_array = array('Issue'=>'Issue');
								echo "REPORT {$cat}";
							}else{
								$cat = "OCCURRENCE";
								$m_cat = "INC";
								$category_array = array('Occurrence'=>'Occurrence');
								echo "REPORT {$cat}";
							}
							
							?>
						</i></H4>
					</div>
			</div>
			
			<div class="row" style="border-bottom: 1px #ccc solid;" >
				
					<div class="menu <?php if($_GET['category']=='Issue'){echo "menu1-select";}else{echo "menu1";} ?>"  >
						<?php echo CHtml::link("Issue", array('create', 'category'=>'Issue'), array('title'=>'Report an Issue','style'=>'color: #000;')); ?>
					</div>
					<div class="menu <?php if($_GET['category']=='Incident'){echo "menu1-select";}else{echo "menu1";} ?>" >
						<?php echo CHtml::link("Incident", array('create', 'category'=>'Incident'),array('title'=>'Report an Incident' , 'style'=>'color: #000;')); ?>
					</div>
					<div class="menu <?php if($_GET['category']=='Hazard'){echo "menu1-select";}else{echo "menu1";} ?>"  >
						<?php echo CHtml::link("Hazard", array('create', 'category'=>'Hazard'),array('title'=>'Report a Hazard', 'style'=>'color: #000;')); ?>
					</div>
<?php
if(Yii::app()->user->role=="Other DANS Staff" or Yii::app()->user->role=="System Admin" or  Yii::app()->user->role=="SMS Admin"){
?>
					<div class="menu <?php if($_GET['category']=='SITREP'){echo "menu1-select";}else{echo "menu1";} ?>"  >
						<?php echo CHtml::link("SITREP", array('create', 'category'=>'SITREP'), array('title'=>'Report an SITREP','style'=>'color: #000;')); ?>
					</div>
<?php
}
?>

					<div class="menu menu1-logout"  >
						<?php echo CHtml::link('Logout', array('/site/logout'), array('title'=>'Logout' , 'style'=>'color: #000; ')); ?>
					</div>
			</div>
			<div class="row" >
					<div class="col-lg-12" style="border-bottom: 1px #ccc solid; padding: 5px;" >
						<b><i>Available Information</i></b>
					</div>
			</div>
			<?php
				if(isset($_GET['save'])){echo "<div class='row' >
					<div class='col-lg-12' style='padding: 5px; background-color: #17e821; color: #fff; margin-top: 7px;' >
						The $incident has been noted successfully.
					</div>
			</div>";}
			?>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'incidents-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>
			
			<div class="row" >
					<div class="col-lg-1" style="padding: 3px;">
						<?php echo $cat; ?>
						<?php echo $form->hiddenField($model, 'risk_index', array('value'=>'1A')); ?>
						<?php echo $form->hiddenField($model, 'number', array('value'=>'N/A')); ?>
						<?php echo $form->hiddenField($model, 'aircraft_registration', array('value'=>'N/A')); ?>
						<?php echo $form->hiddenField($model, 'type_of_operation', array('value'=>'N/A')); ?>
						<?php echo $form->hiddenField($model, 'person_responsible', array('value'=>'N/A')); ?>
						<?php echo $form->hiddenField($model, 'other_cause_details', array('value'=>'N/A')); ?>		
						<?php echo $form->hiddenField($model, 'reported', array('value'=>'N/A')); ?>
<?php echo $form->hiddenField($model, 'operator', array('value'=>'N/A')); ?>
<?php echo $form->hiddenField($model, 'departure_point', array('value'=>'N/A')); ?>	
<?php echo $form->hiddenField($model, 'persons_on_board', array('value'=>'N/A')); ?>					
					</div>
					<div class="col-lg-11" style="padding: 3px;" >
						<?php echo $form->textField($model,'occurrence',array('style'=>'width: 100%; border: 1px #ccc solid;')); ?>
						<?php echo $form->error($model,'occurrence', array('style'=>'color: red;')); ?>
					</div>
					
					<div class="col-lg-1" style="padding: 3px;">
						Category
					</div>
					<div class="col-lg-11" style="padding: 3px;" >
						<?php echo $form->dropDownList($model,'category',$category_array,array('style'=>'width: 100%;')); ?>
						<?php echo $form->error($model,'category', array('style'=>'color: red;')); ?>
					</div>
					<?php if($_GET['category'] == 'Incident'){ ?>
					<div class="col-lg-1" style="padding: 3px;">
						Sub-Category
					</div>
					<div class="col-lg-11" style="padding: 3px;" >
						<?php echo $form->dropDownList($model,'incident_category',array('Workplace'=>'Workplace', 'Aircraft'=>'Aircraft'),array('style'=>'width: 100%;')); ?>
						<?php echo $form->error($model,'incident_category', array('style'=>'color: red;')); ?>
					</div>
					<?php }else{ ?>
						<?php echo $form->hiddenField($model,'incident_category',array('value'=>'')); ?>
					<?php } ?>
					
					<div class="col-lg-1" style="padding: 3px;">
						Place/Position
					</div>
					<div class="col-lg-5" style="padding: 3px;" >
						<?php echo $form->textField($model,'place',array('style'=>'width: 100%; border: 1px #ccc solid;')); ?>
						<?php /* echo $form->dropDownList($model,'place', @Places::getPlaceOptions(),array('style'=>'width: 100%; border: 1px #ccc solid;')); */ ?>
						<?php echo $form->error($model,'place', array('style'=>'color: red;')); ?>
					</div>
					
					<div class="col-lg-1" style="padding: 3px;">
						Date
					</div>
					<div class="col-lg-5" style="padding: 3px;" >
						<?php
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'Incidents[date]',
							'value'=>date('Y-m-d'),     
							'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
							),
							'htmlOptions'=>array(
								'style'=>'width: 100%; border: 1px #ccc solid;'
							),
						));
						?>
						<?php echo $form->error($model,'date', array('style'=>'color: red;')); ?>
					</div>
					
					<div class="col-lg-1" style="padding: 3px;">
						Time
					</div>
					<div class="col-lg-5" style="padding: 3px;" >
						
						<select name="Incidents[time_hr]" style="border: 1px #ccc solid;" >
							<option value="HOUR" >HOUR</option>
							<option value="00" >00</option>
							<option value="01" >01</option>
							<option value="02" >02</option>
							<option value="03" >03</option>
							<option value="04" >04</option>
							<option value="05" >05</option>
							<option value="06" >06</option>
							<option value="07" >07</option>
							<option value="08" >08</option>
							<option value="09" >09</option>
							<option value="10" >10</option>
							<option value="11" >11</option>
							<option value="12" >12</option>
							<option value="13" >13</option>
							<option value="14" >14</option>
							<option value="15" >15</option>
							<option value="16" >16</option>
							<option value="17" >17</option>
							<option value="18" >18</option>
							<option value="19" >19</option>
							<option value="20" >20</option>
							<option value="21" >21</option>
							<option value="22" >22</option>
							<option value="23" >23</option>
						</select>
						 : 
						 <select name="Incidents[time_min]" ><option value='MINUTE' >MINUTE</option><option value='00' >00</option><option value='01' >01</option><option value='02' >02</option><option value='03' >03</option><option value='04' >04</option><option value='05' >05</option><option value='06' >06</option><option value='07' >07</option><option value='08' >08</option><option value='09' >09</option><option value='10' >10</option><option value='11' >11</option><option value='12' >12</option><option value='13' >13</option><option value='14' >14</option><option value='15' >15</option><option value='16' >16</option><option value='17' >17</option><option value='18' >18</option><option value='19' >19</option><option value='20' >20</option><option value='21' >21</option><option value='22' >22</option><option value='23' >23</option><option value='24' >24</option><option value='25' >25</option><option value='26' >26</option><option value='27' >27</option><option value='28' >28</option><option value='29' >29</option><option value='30' >30</option><option value='31' >31</option><option value='32' >32</option><option value='33' >33</option><option value='34' >34</option><option value='35' >35</option><option value='36' >36</option><option value='37' >37</option><option value='38' >38</option><option value='39' >39</option><option value='40' >40</option><option value='41' >41</option><option value='42' >42</option><option value='43' >43</option><option value='44' >44</option><option value='45' >45</option><option value='46' >46</option><option value='47' >47</option><option value='48' >48</option><option value='49' >49</option><option value='50' >50</option><option value='51' >51</option><option value='52' >52</option><option value='53' >53</option><option value='54' >54</option><option value='55' >55</option><option value='56' >56</option><option value='57' >57</option><option value='58' >58</option><option value='59' >59</option></select> e.g 12:54 HOURS
						
						<?php /* echo $form->textField($model,'time',array('style'=>'width: 100%; border: 1px #ccc solid;')); */ ?>
						<?php 
							/* $this->widget('application.extensions.timepicker.timepicker', array(
								'id'=>'incident_time',
								'model'=>$model,
								'name'=>'time',
								'select'=> 'time',
								'options' => array(
								'showOn'=>'focus',
									'timeFormat'=>'hh:mm',
									//'hourMin'=> (int) $hourMin,
									//'hourMax'=> (int) $hourMax,
									'hourGrid'=>2,
									'minuteGrid'=>10,
								),
							)); */
						?>
						<?php echo $form->error($model,'time', array('style'=>'color: red;')); ?>
					</div>
					<div class="col-lg-1" style="padding: 3px;">
						Reoccuring
					</div>
					<div class="col-lg-5" style="padding: 3px;" >
						
						<select name="Incidents[reoccuring]" style="border: 1px #ccc solid;" >
							<option value="0" >NO</option>
							<option value="1" >YES</option>
						</select>
						
						
						<?php /* echo $form->textField($model,'time',array('style'=>'width: 100%; border: 1px #ccc solid;')); */ ?>
						<?php 
							/* $this->widget('application.extensions.timepicker.timepicker', array(
								'id'=>'incident_time',
								'model'=>$model,
								'name'=>'time',
								'select'=> 'time',
								'options' => array(
								'showOn'=>'focus',
									'timeFormat'=>'hh:mm',
									//'hourMin'=> (int) $hourMin,
									//'hourMax'=> (int) $hourMax,
									'hourGrid'=>2,
									'minuteGrid'=>10,
								),
							)); */
						?>
						<?php echo $form->error($model,'time', array('style'=>'color: red;')); ?>
					</div>
					<?php if($_GET['category'] == 'SITREP'){ ?>
					<!-- <div class="col-lg-2" style="padding: 3px;">
						Type of Aircraft
					</div>
					<div class="col-lg-4" style="padding: 3px;" >
						<?php /* ECHO $FORM->TEXTFIELD($MODEL,'TYPE_OF_AIRCRAFT',ARRAY('STYLE'=>'WIDTH: 100%; BORDER: 1PX #CCC SOLID;')); */ ?>
						<?php //echo $form->dropDownList($model,'type_of_aircraft', @AircraftTypes::getAircraftTypeOptions(),array('style'=>'width: 100%; border: 1px #ccc solid;')); ?>
						<?php echo $form->error($model,'type_of_aircraft', array('style'=>'color: red;')); ?>
					</div> -->
					
					<div class="col-lg-2" style="padding: 3px;">
						Aircraft Registration
					</div>
					<div class="col-lg-4" style="padding: 3px;" >
						<?php echo $form->textField($model,'aircraft_registration',array('style'=>'width: 100%; border: 1px #ccc solid;')); ?>
						<?php echo $form->error($model,'aircraft_registration', array('style'=>'color: red;')); ?>
					</div>
					<!--
					<div class="col-lg-1" style="padding: 3px;">
						Nationality
					</div>
					<div class="col-lg-5" style="padding: 3px;" >
						<?php /* echo $form->textField($model,'nationality',array('style'=>'width: 100%; border: 1px #ccc solid;')); */ ?>
						<?php /* echo $form->dropDownList($model,'nationality', @Nationalities::getNationalityOptions(),array('style'=>'width: 100%; border: 1px #ccc solid;')); */ ?>
						<?php /*echo $form->error($model,'nationality', array('style'=>'color: red;')); */ ?>
					</div>
-->
					
					<div class="col-lg-1" style="padding: 3px;">
						Operator
					</div>
					<div class="col-lg-5" style="padding: 3px;" >	
						<?php /* echo $form->textField($model,'operator',array('style'=>'width: 100%; border: 1px #ccc solid;')); */ ?>
						<?php echo $form->textField($model,'operator',array('style'=>'width: 100%; border: 1px #ccc solid;')); ?>
						<?php echo $form->error($model,'operator', array('style'=>'color: red;')); ?>
					</div>
					<!--
					<div class="col-lg-1" style="padding: 3px;">
						Owner
					</div>
					<div class="col-lg-5" style="padding: 3px;" >
						<?php /* echo $form->textField($model,'owner',array('style'=>'width: 100%; border: 1px #ccc solid;')); */ ?>
						<?php /* echo $form->dropDownList($model,'owner', @Owners::getOwnerOptions(),array('style'=>'width: 100%; border: 1px #ccc solid;'));*/ ?>
						<?php /* echo $form->error($model,'owner', array('style'=>'color: red;')); */ ?>
					</div>
-->
					
					<div class="col-lg-2" style="padding: 3px;">
						Departure Point
					</div>
					<div class="col-lg-4" style="padding: 3px;" >
						<?php /* echo $form->textField($model,'departure_point',array('style'=>'width: 100%; border: 1px #ccc solid;')); */ ?>
						<?php echo $form->textField($model,'departure_point',array('style'=>'width: 100%; border: 1px #ccc solid;')); ?>
						<?php echo $form->error($model,'departure_point', array('style'=>'color: red;')); ?>
					</div>
					<!--
					<div class="col-lg-1" style="padding: 3px;">
						Destination
					</div>
					<div class="col-lg-5" style="padding: 3px;" >
						<?php /* echo $form->textField($model,'destination',array('style'=>'width: 100%; border: 1px #ccc solid;')); */ ?>
						<?php /* echo $form->dropDownList($model,'destination', @Destinations::getDestinationOptions(),array('style'=>'width: 100%; border: 1px #ccc solid;')); */?>
						<?php /*echo $form->error($model,'destination', array('style'=>'color: red;')); */?>
					</div>
-->
					
					<div class="col-lg-2" style="padding: 3px;">
						Persons on Board
					</div>
					<div class="col-lg-4" style="padding: 3px;" >
						<?php echo $form->textField($model,'persons_on_board',array('style'=>'width: 100%; border: 1px #ccc solid;')); ?>
						<?php echo $form->error($model,'persons_on_board', array('style'=>'color: red;')); ?>
					</div>
				<!--
					<div class="col-lg-1" style="padding: 3px;">
						Injuries
					</div>

					<div class="col-lg-5" style="padding: 3px;" >
						<?php /*$form->textField($model,'injuries',array('style'=>'width: 100%; border: 1px #ccc solid;'));*/ ?>
						<?php  /* $form->error($model,'injuries', array('style'=>'color: red;'));*/ ?>
					</div>
-->
					<?php } ?>
					<div class="col-lg-12" style="padding: 3px;">
						Description
					</div>
					<div class="col-lg-12" style="padding: 3px;" >
						<?php /* echo $form->textField($model,'brief_notes',array('style'=>'width: 100%; border: 1px #ccc solid;')); */ ?>
						<?php echo $form->textArea($model, 'brief_notes', array('maxlength' => 7000, 'style' => 'width: 100%; border: 1px #ccc solid;')); ?>
						<?php echo $form->error($model,'brief_notes', array('style'=>'color: red;')); ?>
					</div>
					<div class="col-lg-12" style="padding: 3px;">
						Your recommendation on fixing the problem
					</div>
					<div class="col-lg-12" style="padding: 3px;" >
						<?php /* echo $form->textField($model,'recommendations',array('style'=>'width: 100%; border: 1px #ccc solid;')); */ ?>
						<?php echo $form->textArea($model, 'recommendations', array('maxlength' => 7000, 'style' => 'width: 100%; border: 1px #ccc solid;')); ?>
						<?php echo $form->error($model,'recommendations', array('style'=>'color: red;')); ?>
					</div>
					
					<div class="col-lg-12" style="padding: 3px;" >
						<?php if(!Yii::app()->user->isGuest){ $reported_by = Yii::app()->user->name; }else {$reported_by = "guest";} ?>
						<?php echo $form->hiddenField($model,'reported_by',array('value'=>$reported_by)); ?>
						<?php echo $form->error($model,'reported_by', array('style'=>'color: red;')); ?>
					</div>
					<div class="col-lg-12" style="padding: 3px;" >
						<?php echo $form->hiddenField($model,'main_category',array('value'=>$_GET['category'])); ?>
						<?php echo $form->error($model,'main_category', array('style'=>'color: red;')); ?>
					</div>
					
					
			</div>
			<div class="row" >
					<div class="col-lg-12" style="border-bottom: 1px #ccc solid; padding: 5px;" >
						<b><i>Personal Information
						
						<?php 
						//get feedback ----added by Kraiba
						if($reported_by == "guest"){
								echo '(If you want to get Feedback)'; 
						} ?> </i></b>
						<?php $reported_by_info = @Users::model()->find("username='{$reported_by}'"); ?>
					</div>
			</div>
			<div class="row" >
					<div class="col-lg-1" style="padding: 3px;">
						Name
					</div>
					<div class="col-lg-5" style="padding: 3px;" >
						<?php if($reported_by == "guest"){ ?>
						<?php echo $form->textField($model,'reported_by_name',array('style'=>'width: 100%; border: 1px #ccc solid;')); ?>
						<?php }else{ ?>
						<b><?php echo $reported_by_info->username; ?></b>
						<?php echo $form->hiddenField($model,'reported_by_name',array('value'=>$reported_by_info->username)); ?>
						<?php } ?>
						<?php echo $form->error($model,'reported_by_name', array('style'=>'color: red;')); ?>
					</div>
					<div class="col-lg-2" style="padding: 3px;">
						Department/Section
					</div>
					<div class="col-lg-4" style="padding: 3px;" >
						<?php if($reported_by == "guest"){ ?>
						<?php echo $form->textField($model,'reported_by_department',array('style'=>'width: 100%; border: 1px #ccc solid;')); ?>
						<?php }else{ ?>
						<b><?php echo $reported_by_info->position; ?></b>
						<?php echo $form->hiddenField($model,'reported_by_department',array('value'=>$reported_by_info->position)); ?>
						<?php } ?>
						<?php echo $form->error($model,'reported_by_department', array('style'=>'color: red;')); ?>
					</div>
					<div class="col-lg-1" style="padding: 3px;">
						Telephone
					</div>
					<div class="col-lg-5" style="padding: 3px;" >
						<?php if($reported_by == "guest"){ ?>
						<?php echo $form->textField($model,'reported_by_tel',array('style'=>'width: 100%; border: 1px #ccc solid;')); ?>
						<?php }else{ ?>
						<b><?php echo $reported_by_info->phone_number; ?></b>
						<?php echo $form->hiddenField($model,'reported_by_tel',array('value'=>$reported_by_info->phone_number)); ?>
						<?php } ?>
						<?php echo $form->error($model,'reported_by_tel', array('style'=>'color: red;')); ?>
					</div>
					<div class="col-lg-1" style="padding: 3px;">
						E-mail
					</div>
					<div class="col-lg-5" style="padding: 3px;" >
						<?php if($reported_by == "guest"){ ?>
						<?php echo $form->textField($model,'reported_by_email',array('style'=>'width: 100%; border: 1px #ccc solid;')); ?>
						<?php }else{ ?>
						<b><?php echo $reported_by_info->email; ?></b>
						<?php echo $form->hiddenField($model,'reported_by_email',array('value'=>$reported_by_info->email)); ?>
						<?php } ?>
						<?php echo $form->error($model,'reported_by_email', array('style'=>'color: red;')); ?>
					</div>
					<div class="col-lg-12" style="padding: 3px;" >
						<input type="submit" class="myButton" value="Submit" style="width: 15%; border: 1px #ccc solid;float: right;" />
					</div>
			</div>
			<?php $this->endWidget(); ?>
		</div>