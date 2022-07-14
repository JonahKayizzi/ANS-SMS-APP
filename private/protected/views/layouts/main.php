<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Safety Management System - SMS v1.0</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/dist/css/skins/skin-blue.min.css">
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		.detail-view tbody tr td{background-color: #fff;}
		.errorSummary{
			color: red;
		}
		.required{
			color: red;
		}
	</style>
	<SCRIPT TYPE="text/javascript">
	<!--
	function popup(mylink, windowname)
	{
	if (! window.focus)return true;
	var href;
	if (typeof(mylink) == 'string')
	   href=mylink;
	else
	   href=mylink.href;
	window.open(href, windowname, 'width=400,height=200,scrollbars=yes,toolbar=no,location=no,directories=no,status=no,menubar=no');
	return false;
	}
	//-->
	</SCRIPT>
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">SMS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SMS</b>v1.0</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
			 <?php
				$login_id = @Yii::app()->user->id;
				$total_message_count = @Notifications::model()->getUserNotificationCount($login_id);
				$messages = @Notifications::model()->findAll("status = 'sent' and user = '{$login_id}' order by id desc limit 0, 7");
			?>
			<?php if(!empty($messages)){ ?>
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
				
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success"><?php echo $total_message_count; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo $total_message_count; ?> message(s)</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
					<?php foreach($messages as $message){ ?>
                      <li><!-- start message -->
						<?php echo CHtml::link('<h4>
						  '.substr($message->subject, 0, 22).'
                            <small><i class="fa fa-clock-o"></i> '.$message->date_created.'</small>
                          </h4>
                          <p>'.substr($message->description, 0, 45).'</p>', array('/notifications/view', 'id'=>$message->id)); ?>
                        
                          
                        
                      </li><!-- end message -->
					<?php } ?>
                    </ul><!-- /.menu -->
                  </li>
                  <li class="footer"><?php echo CHtml::link("See All Messages", array('/notifications/admin')); ?></li>
                </ul>
              </li><!-- /.messages-menu -->
			<?php } ?>
              
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/dist/img/user.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo @Yii::app()->user->name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/dist/img/user.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo @Yii::app()->user->name; ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->

                  <li>
                    <a href="">Change Password</a>
                  </li>
                  <li class="user-footer">
					<?php echo CHtml::link('Logout', array('/site/logout'), array('class'=>'btn btn-default btn-flat', 'style'=>'width: 100%;')); ?>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/dist/img/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo @Yii::app()->user->name; ?></p>
              <!-- Status -->
              <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
          </div>

          <!-- search form (Optional) -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->

          <!-- Sidebar Menu -->
		  <?php
			//menu control
			$m_1 = Yii::app()->user->getState('m_1');
			$m_2 = Yii::app()->user->getState('m_2');
			$m_3 = Yii::app()->user->getState('m_3');
		  ?>
		  <?php $user_info = Users::model()->findByPk(Yii::app()->user->id); ?>
		  <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li ><?php echo CHtml::link('<i class="fa fa-dashboard"></i> <span>Dashboard</span>', array('/site/dashboard')); ?></li>
			
			
            <li class="treeview <?php if($m_1 == 1){ ?> active <?php } ?>">
              <a href="#">
                <i class="glyphicon glyphicon-fire"></i> <span>Safety Risk Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li class="<?php if($m_2 == 1){ ?> active <?php } ?>">
                  <a href="#"><i class="fa fa-circle-o"></i> Occurrences <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> All', array('/incidents/index')); ?></li>
					
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Issues', array('/incidents/index', 'main_category'=>'Issue')); ?></li>
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Incidents', array('/incidents/index', 'main_category'=>'Incident')); ?></li>
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Hazards', array('/incidents/index', 'main_category'=>'Hazard')); ?></li>
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> SITREP', array('/incidents/index', 'main_category'=>'SITREP')); ?></li>
					<!--
					<?php if(Users::model()->checkIfUserIsAdmin()){ ?>
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Assigned to Officer(s)', array('/incidents/assignedToOfficers')); ?></li>
					<?php } ?>
					-->
                  </ul>
                </li>
				<li class="<?php if($m_2 == 8){ ?> active <?php } ?>">
                  <a href="#"><i class="fa fa-circle-o"></i> Risks <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Risk Indices', array('/incidents/residuals')); ?></li>
					<li ><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Reccuring', array('/incidents/reoccuring')); ?></li>
                  </ul>
                </li>
				<li class="<?php if($m_2 == 2){ ?> active <?php } ?>">
                  <a href="#"><i class="fa fa-circle-o"></i> Trends <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>KPI(s)</span>', array('/incidents/kpi')); ?></li>
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>KPI(s) Plot</span>', array('/incidents/kpiPlot2')); ?></li>
					<li class="<?php if($m_3 == 3){ ?> active <?php } ?>">
						<a href="#"><i class="fa fa-circle-o"></i> Risk Analysis <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> By Type', array('/incidents/riskAnalyseType')); ?></li>
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> By Department', array('/incidents/riskAnalyseDepartment')); ?></li>
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> By Division', array('/incidents/riskAnalyseDivision')); ?></li>
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> For Incident Category', array('/incidents/riskAnalyseIncidentCategory')); ?></li>
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> For Incident Sub-Category', array('/incidents/riskAnalyseIncidentSubCategory')); ?></li>
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> For Hazard Category', array('/incidents/riskAnalyseHazardCategory')); ?></li>
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> By Status', array('/incidents/riskAnalyseStatus')); ?></li>
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> By Operation Type', array('/incidents/riskAnalyseOperationType')); ?></li>
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> By Hazard Source', array('/incidents/riskAnalyseHazardSource')); ?></li>
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> By Cause', array('/incidents/riskAnalyseCause')); ?></li>
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> By Recurring', array('/incidents/riskAnalyseRecurring')); ?></li>
						</ul>
					
					</li>
					<li class="<?php if($m_3 == 1){ ?> active <?php } ?>">
						<a href="#"><i class="fa fa-circle-o"></i> Risk Index Analysis <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Initial Risk', array('/incidents/riskIndex')); ?></li>
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Predicted Residual Risk', array('/incidents/predictedRiskIndex')); ?></li>
							<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Substitute Risk', array('/incidents/substituteRiskIndex')); ?></li>
						</ul>
					
					</li>
					
					<!-- <li><?php /* echo CHtml::link('<i class="fa fa-circle-o"></i> Associated Risks', array('/incidents/associated')); */ ?></li> -->
					
                  </ul>
                </li>
				
              </ul>
            </li>
			
			<li class="treeview  <?php if($m_1 == 2){ ?> active <?php } ?>">
              <a href="#">
                <i class="fa fa-shield"></i> <span>Safety Assurance</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($m_2 == 3){ ?> active <?php } ?>">
                  <a href="#"><i class="fa fa-circle-o"></i> Safety Audits <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Audit Plan</span>', array('/auditPlan/admin')); ?></li>
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Audit Schedule</span>', array('/station/admin')); ?></li>
                    <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Audit Form</span>', array('/auditForm/admin')); ?></li>
					
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Audit Reports</span>', array('/auditReport/admin')); ?></li>
                  </ul>
                </li>
				
				<li class="<?php if($m_2 == 4){ ?> active <?php } ?>">
                  <a href="#"><i class="fa fa-circle-o"></i> Incident Investigations <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <!-- <li class="<?php if($m_3 == 2){ ?> active <?php } ?>">
                      <a href="#"><i class="fa fa-circle-o"></i> Workplace <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Data Collection</span>', array('/smsForm124Data/admin')); ?></li>
                        <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Contributing Factors</span>', array('/smsForm124ContributingFactors/admin')); ?></li>
						<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Corrective Actions</span>', array('/smsForm124CorrectiveActions/admin')); ?></li>
						<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Analysis Checklist</span>', array('/smsForm124DataAnalysisChecklist/admin')); ?></li>
						<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Addittional Comments</span>', array('/smsForm124Comments/admin')); ?></li>
                      </ul>
                    </li>
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Aircraft </span>', array('/aircraftIncidentInvestigations/admin')); ?></li>
					 <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Assigned to Investigator(s) </span>', array('/aircraftIncidentInvestigations/assignedToOfficers')); ?></li> -->
					
					<li class="<?php if($m_3 == 4){ ?> active <?php } ?>">
                      <a href="#"><i class="fa fa-circle-o"></i> Trends <i>by</i> <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Form of Notification</span>', array('/aircraftIncidentInvestigations/trendsNotificationForm')); ?></li>
                        <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Level of Investigation</span>', array('/aircraftIncidentInvestigations/trendsInvestigationLevel')); ?></li>
						<!-- <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Transcript</span>', array('/aircraftIncidentInvestigations/trendsTranscriptSubmitted')); ?></li>
						<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Preliminary Report</span>', array('/aircraftIncidentInvestigations/trendsPreliminaryReportSubmitted')); ?></li>
						<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Final Report</span>', array('/aircraftIncidentInvestigations/trendsFinalReport')); ?></li>
						<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Root Cause</span>', array('/aircraftIncidentInvestigations/trendsRootCause')); ?></li> -->
                      </ul>
                    </li>
                  </ul>
                </li>
				
				
				<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Investigation Report </span>', array('/investigationReport/admin')); ?></li>
				
				<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Monitor Effectiveness </span>', array('/site/effectiveness')); ?></li>
				<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Gap Analysis</span>', array('/questionnaire/admin')); ?></li>
				
				<li class="<?php if($m_2 == 6){ ?> active <?php } ?>">
                  <a href="#"><i class="fa fa-circle-o"></i> Safety Logs <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Create</span>', array('/safetyLogs/create')); ?></li>
                    <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Summary</span>', array('/safetyLogs/summary')); ?></li>
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Graph</span>', array('/safetyLogs/graphs')); ?></li>
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Data</span>', array('/safetyLogs/data')); ?></li>
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Categories</span>', array('/SafetyLogsCauses/admin')); ?></li>
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Causes</span>', array('/SafetyLogsCategories/admin')); ?></li>
                    
                  </ul>
                </li>
				
				<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Change Management</span>', array('/changeManagement/admin')); ?></li>
				<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Safety Requirementss</span>', array('/safetyRecommendations/admin')); ?></li>
				<!-- <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Critical Assets</span>', array('/criticalAssets/admin')); ?></li>
				<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Critical Assets Vulnerability</span>', array('/criticalAssetVulnerability/admin')); ?></li>
				<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Financial Risk Analysis</span>', array('/finacialRiskAnalysis/admin')); ?></li> -->
				
				<!-- <li><?php /* echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Safety Occurance Data</span>', array('/safetyOccurrenceData/admin')); */ ?></li> -->
				
              </ul>
            </li>
			
			<li class="treeview <?php if($m_1 == 3){ ?> active <?php } ?>">
              <a href="#">
                <i class="fa fa-bookmark-o"></i> <span>Safety Policy &amp; Objectives</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>System Users</span>', array('/users/admin')); ?></li>
				<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>System &amp; Task Analysis</span>', array('/tasks/admin')); ?></li>
				<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Risk Management</span>', array('/riskManagement/admin')); ?></li>
				
              </ul>
            </li>
			
			<li class="treeview <?php if($m_1 == 4){ ?> active <?php } ?>">
              <a href="#">
                <i class="fa fa-bullhorn"></i> <span>Safety Promotions</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li class="<?php if($m_2 == 7){ ?> active <?php } ?>">
                  <a href="#"><i class="fa fa-circle-o"></i> Workshop Attendance <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Workshops</span>', array('/workshops/admin')); ?></li>
                    <li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Attendance</span>', array('/workshopAttendance/admin')); ?></li>
					<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Facilitators</span>', array('/workshopFacilitators/admin')); ?></li>
					
                  </ul>
                </li>
				
				<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Employee Recognition</span>', array('/employeeRecognition/admin')); ?></li>
				
				<li><?php echo CHtml::link('<i class="fa fa-circle-o"></i> <span>Lessons Learnt</span>', array('/lessonsLearnt/admin')); ?></li>
				
				<li><a href="http://10.10.32.45/sms/public/wp-admin" target="_blank"><i class="fa fa-circle-o"></i> Public Admin</a></li>
              </ul>
            </li>
			<li><?php echo CHtml::link('<i class="fa fa-commenting-o"></i> <span>Notifications</span>', array('/notifications/admin')); ?></li>
			
          </ul><!-- /.sidebar-menu -->
          
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <?php echo $content; ?>

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Safety Management Systems
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 PC MAX LTD. Powered by BSM.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Workshop</h4>
                    <p>Will be on April 24th</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
		 <!-- DataTables -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script>
	  $(function () {
		$("#dataTable").DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
	  });
	</script>
  </body>
</html>