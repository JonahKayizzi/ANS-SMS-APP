<div class="row">
					<div class="col-md-12">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Associated Risks</h3>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
								<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
							  </div>
							</div><!-- /.box-header -->
							<div class="box-body">
							  <div class="row">
								<div class="col-md-12">
									<table class="table table-striped">
										<?php 
											/* $effects = @Effects::model()->with(array('effectRiskManagements','consequence_relation'))->findAll("t.hazard_id = '{$model->id}'"); */
											
											$effects = @Effects::model()->findAll("hazard_id = '{$model->id}'");
											
											if(!empty($effects)){
										?>
											<tr valign="middle"  class=""  >
												<th style="">Effects</th>
												<th style="">Risk Indices</th>
												<th></th>
											</tr>
										<?php
												foreach($effects as $effect){
										?>
											<tr valign="middle"  class="" >
												<td style="text-align: left; vertical-align: middle;">
													<?php echo @$effect->consequence_relation->description; ?>
												</td>
												<td >
													<ul style="    margin: 0; padding: 0; list-style-type: none;">
													
														<li><b>Severity :</b><?php echo @$effect->severity->value; ?></li>
														<li>
															<b>Severity rationale :</b>
															<?php /* echo @$effect->severityRationale->description; */ ?>
															<?php
																$esRationales = @EffectsSeverityRationales::model()->findAll("status = 1 and effects_id = '{$effect->id}'");
																if(!empty($esRationales)){
																	echo "<ol>";
																	foreach($esRationales as $esRationale){
																		echo '<li>'.@$esRationale->severityRationale->name.'</li>';
																	}
																	echo "</ol>";
																}
																
															?>
														</li>
														<li><b>Likelihood: </b><?php echo $effect->likelihood_id; ?></li>
														<li><b>Likelihood rationale: </b><?php echo @$effect->likelihood->rationale; ?></li>
														<li><b>Initial Risk: </b><?php echo $effect->initial_risk_index; ?></li>
														<li><b>Predicted Residual Risk: </b><?php echo $effect->predicted_residual_risk_index; ?></li>
														<li><b>Reported By: </b><?php echo $effect->reported_by; ?></li>
													
													
													</ul>
												</td>
												<td>
												<?php echo CHtml::link($image_edit, array('effects/update', 'id'=>$effect->id, 'incident'=>$model->id), array('onClick'=>"return popup(this, 'effects')")); ?>
												</td>
											</tr>
										<?php 
												}
											}
										?>
									</table>
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'effects-form',
										// Please note: When you enable ajax validation, make sure the corresponding
										// controller action is handling ajax validation correctly.
										// There is a call to performAjaxValidation() commented in generated controller code.
										// See class documentation of CActiveForm for details on this.
										'enableAjaxValidation'=>false,
									)); ?>
									<table class="table table-striped">
								
										<input type="hidden" name="hazard_id" value="<?php echo $model->id; ?>" />
										<tr valign="top">
											<td>Consequences</td>
											<td>
												<?php
												echo CHtml::dropDownList('consequence_id', '',Effects::getPosibleConsiquesOptions($model->id),array('class'=>'form-control', ));
												?>
												<!-- <input style="width:100%;" type="text" name="effect" /> -->
											</td>
										</tr>
										<tr valign="top">
											<td >Severity</td>
											<td >
											<!-- <input type="text" name="severity" style="width: 99%;" /> -->
											<?php
												echo CHtml::dropDownList('effect_severity', '',Severities::getOptions(),array('class'=>'form-control', ));
											?>
											</td>
										</tr>
										<tr valign="top">
											<td >Severity rationale</td>
											<td >
												<!-- <input type="text" name="severity_rationale" style="width: 99%;" /> -->
												<?php
													echo CHtml::dropDownList('effect_severity_rationale', '',SeverityRationales::getOptions(),array('class'=>'form-control', 'multiple'=>'multiple'));
												?>
												
											</td>
										</tr>
										<tr valign="top">
											<td >Likelihood</td>
											<td >
												<!-- <input type="text" name="likelihood" style="width: 99%;" /> -->
												<?php
													echo CHtml::dropDownList('effect_likelihood', '',Likelihoods::getOptions(),array('class'=>'form-control', ));
												?>
											</td>
										</tr>
										<tr valign="top">
											<td >Predicted Residual Risk</td>
											<td >
												<input type="text" name="predicted_residual_risk" class="form-control" />
											</td>
										</tr>
										<tr valign="top">
											<td >Substitute Risk</td>
											<td >
												<input type="text" name="substitute_risk_index" class="form-control" />
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