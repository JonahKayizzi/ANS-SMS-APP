
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Main Page</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			
          <div class="row">
            <?php /* $this->renderPartial('dashboard-main'); */ ?>
          </div><!-- /.row -->
		  
		  <div class="row">
			<section class="col-lg-7 connectedSortable">
				<?php $this->renderPartial('to-do-list'); ?>
				
			</section>
			<section class="col-lg-5 connectedSortable">
				<?php $this->renderPartial('messages'); ?>
				
			</section>
		  </div>
		  
		  
			<!-- <div class="row">
				<div class="col-lg-6 col-md-6 col-xs-6">
				
				<section class="col-lg-12 connectedSortable ui-sortable">
          
          <div class="box box-primary">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">To Do List</h3>
            </div>
           
            <div class="box-body">
              <ul class="todo-list ui-sortable">
                <li>
                  
                  <span class="text">Design a nice theme</span>
                  
                  <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                  
                  <div class="tools">
                    <i class="fa fa-search"></i>
                  </div>
                </li>
                <li>
                      
                  
                  <span class="text">Make the theme responsive</span>
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                  <div class="tools">
                    <i class="fa fa-search"></i>
                  </div>
                </li>
                <li>
                      
                  
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                  <div class="tools">
                    <i class="fa fa-search"></i>
                  </div>
                </li>
                <li>
                      
                  
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                  <div class="tools">
                    <i class="fa fa-search"></i>
                  </div>
                </li>
                <li>
                      
                  
                  <span class="text">Check your messages and notifications</span>
                  <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                  <div class="tools">
                    <i class="fa fa-search"></i>
                  </div>
                </li>
                <li>
                      
                  
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                  <div class="tools">
                    <i class="fa fa-search"></i>
                  </div>
                </li>
              </ul>
            </div>
            
            
          </div>
         


        </section>
				
				</div>
			
			</div> -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->