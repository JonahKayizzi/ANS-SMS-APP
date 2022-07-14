<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Incident Investigation</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'investigation-form',
										// Please note: When you enable ajax validation, make sure the corresponding
										// controller action is handling ajax validation correctly.
										// There is a call to performAjaxValidation() commented in generated controller code.
										// See class documentation of CActiveForm for details on this.
										'enableAjaxValidation'=>false,
									)); ?>
									<table class="table table-striped">
										<tr valign="top">
											<td ></td>
											<td width="70%">
												<input type="hidden" name="incident_id" value="<?php echo $model->id; ?>" />
											</td>
										</tr>
										<tr valign="top">
											<td >Aircraft Involved</td>
											<td ><input type="text" name="aircraft_involved" style="width: 99%;" class="form-control" /></td>
										</tr>
										
										<tr valign="top">
											<td >Form of Notification</td>
											<td >
											<select name="form_of_notification" class="form-control">
												<option value="Voluntary">Voluntary</option>
												<option value="Mandatory">Mandatory</option>
												<option value="Other">Other</option>
											</select>
											</td>
										</tr>
										<tr valign="top">
											<td >Level of Investigation</td>
											<td >
											<select name="level_of_investigation" class="form-control">
												<option value="Full">Full</option>
												<option value="Brief">Brief</option>
											</select>
											</td>
										</tr>
										<tr valign="top">
											<td >Terms of Reference</td>
											<td >
											<?php
											Yii::import('ext.krichtexteditor.KRichTextEditor');
											Yii::import('ext.tinymce.SladekTinyMce.php');
											?>
											<?php
											$this->widget('KRichTextEditor', array(
											  
												'name' => 'tor',
												'htmlOptions' => array( 'class'=>"form-control", 'style'=>"height: 200px; width: 100%;"),
												'options' => array(
													'theme_advanced_resizing' => 'true',
													'theme_advanced_statusbar_location' => 'bottom',
													'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
													'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
													'theme_advanced_buttons3' => '',
												),
											));
											?>
											</td>
										</tr>
										<tr valign="top">
											<td >Deadline</td>
											<td >
											<?php 
											$this->widget('zii.widgets.jui.CJuiDatePicker',array(
												'name'=>'deadline',
												// additional javascript options for the date picker plugin
											   
												'options'=>array(
															'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
															'showButtonPanel'=>true,
															'dateFormat'=>'yy-mm-dd',
																	),
												'htmlOptions'=>array(
													'class'=>'form-control',
													'placeholder'=>'YYYY-MM-DD',
												),
											));
											?>
											</td>
										</tr>
										<tr valign="top">
											<td >Investigator</td>
											<td >
											<?php
												echo CHtml::dropDownList('investigator', '',Users::model()->getInvestigators(),array('class'=>'form-control', ));
											?>
											</td>
										</tr>
										<tr valign="top">
											<td ></td>
											<td><input type="submit" value="Save" class="form-control" style="width: 99%;" /></td>
										</tr>
									</table>
									<?php $this->endWidget(); ?>
								</div><!-- /.col -->
								
							  </div><!-- /.row -->
							</div><!-- /.box-body -->
						  </div><!-- /.box -->
					</div>
				</div>