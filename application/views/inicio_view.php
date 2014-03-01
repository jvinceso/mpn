 <div class="main-content">
 	<ol class="breadcrumb">
 		<li><a href="#">Casa</a></li>
 		<li><a href="#">Bread</a></li>
 		<li class="active">Example</li>
 	</ol>
 	<div class="alert alert-warning alert-dismissable bottom-margin">
 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 		<i class="fa fa-exclamation-circle"></i> <strong>Welcome!</strong> This is a dashboard of the powerful admin template.
 	</div>
 	<?php 

 	$opciones = $this->loaders->get_menu();
 	print_p( $opciones );
 	exit();

 	?>
 	<div class="row">
 		<div class="col-md-6">
 			<div class="widget widget-blue">
 				<span class="offset_anchor" id="widget_stats"></span>
 				<div class="widget-title">
 					<div class="widget-controls">
 						<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 						<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 							<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 								<li class="dropdown-header">Set Widget Color</li>
 								<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 								<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 								<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 								<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 								<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 							</ul>
 						</div>
 						<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 						<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 						<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 					</div>
 					<h3><i class="fa fa-bar-chart-o"></i> Statistics</h3>
 				</div>
 				<div class="widget-content">
 					<div class="shadowed-bottom">
 						<div class="row">
 							<div class="col-xs-6">
 								<div class="white-block clearfix">
 									<div class="value-block changed-up-border pull-left changed-up">
 										<div class="value-self">910
 											<span class="changed-icon"><i class="fa fa-caret-up"></i></span>
 											<span class="changed-value">+2.00%</span>
 										</div>
 										<div class="value-sub value-sub-bigger">Products Sold</div>
 									</div>
 								</div>
 							</div>
 							<div class="col-xs-6">
 								<div class="white-block clearfix">
 									<div class="value-block changed-down-border pull-left changed-down">
 										<div class="value-self">320
 											<span class="changed-icon"><i class="fa fa-caret-down"></i></span>
 											<span class="changed-value">+5.00%</span>
 										</div>
 										<div class="value-sub value-sub-bigger">New Users</div>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 					<div id="areachart-small" style="height: 150px;"></div>
 				</div>
 			</div>
 			<div class="widget widget-red">
 				<div class="widget-title">
 					<div class="widget-controls">
 						<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 						<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 							<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 								<li class="dropdown-header">Set Widget Color</li>
 								<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 								<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 								<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 								<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 								<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 							</ul>
 						</div>
 						<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 						<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 						<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 					</div>
 					<h3><i class="fa fa-dashboard"></i> Gauges</h3>
 				</div>
 				<div class="widget-content">
 					<div class="row">
 						<div class="col-sm-4"><div id="gauge-red" style="height:90px"></div></div>
 						<div class="col-sm-4"><div id="gauge-green" style="height:90px"></div></div>
 						<div class="col-sm-4"><div id="gauge-blue" style="height:90px"></div></div>
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class="col-md-6">
 			<div class="widget widget-blue">
 				<div class="widget-title">
 					<div class="widget-controls">
 						<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 						<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 							<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 								<li class="dropdown-header">Set Widget Color</li>
 								<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 								<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 								<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 								<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 								<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 							</ul>
 						</div>
 						<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 						<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 						<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 					</div>
 					<h3><i class="fa fa-bar-chart-o"></i> Bar Chart</h3>
 				</div>
 				<div class="widget-content">

 					<div class="shadowed-bottom">
 						<div class="row">
 							<div class="col-sm-4 bordered">
 								<div class="value-block text-center">
 									<div class="value-self">1,120</div>
 									<div class="value-sub">Total Visitors</div>
 								</div>
 							</div>
 							<div class="col-sm-8">
 								<form class="form-inline form-period-selector">
 									<label class="control-label">Time Period:</label><br>
 									<input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
 									<input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
 								</form>
 							</div>
 						</div>
 					</div>
 					<div class="padded">
 						<div id="users_barchart" style="height: 330px;"></div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="widget widget-green">
 		<span class="offset_anchor" id="widget_profit_chart"></span>
 		<div class="widget-title">
 			<div class="widget-controls">
 				<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 				<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 				<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 				<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 					<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 						<li class="dropdown-header">Set Widget Color</li>
 						<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 						<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 						<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 						<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 						<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 					</ul>
 				</div>
 				<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 				<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 				<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 			</div>
 			<h3><i class="fa fa-bar-chart-o"></i> Profit Chart</h3>
 		</div>
 		<div class="widget-content">
 			<ul class="nav nav-pills">
 				<li class="active"><a href="#">Hour</a></li>
 				<li><a href="#">Day</a></li>
 				<li><a href="#">Month</a></li>
 				<li class="hidden-xs"><a href="#">Year</a></li>
 			</ul>
 			<div class="widget-content-tp">
 				<div class="padded-no-sides">
 					<div id="areachart" style="height: 250px;"></div>
 				</div>

 				<div class="shadowed-top top-margin">
 					<div class="row">
 						<div class="col-lg-4 col-md-5 col-sm-6 bordered">
 							<div class="value-block value-bigger changed-up some-left-padding changed-up-border">
 								<div class="value-self">
 									$5,450
 									<span class="changed-icon"><i class="fa fa-caret-up"></i></span>
 									<span class="changed-value">+5.00%</span>
 								</div>
 								<div class="value-sub">Average of $450.35 Per Day</div>
 							</div>
 						</div>
 						<div class="col-lg-2 col-md-3 visible-md visible-lg bordered">
 							<div class="value-block text-center">
 								<div class="value-self">520</div>
 								<div class="value-sub">Total Sales</div>
 							</div>
 						</div>
 						<div class="col-lg-2 bordered visible-lg">
 							<div class="value-block text-center">
 								<div class="value-self">1,120</div>
 								<div class="value-sub">Total Visitors</div>
 							</div>
 						</div>
 						<div class="col-lg-4 col-md-4 col-sm-6">
 							<form class="form-inline form-period-selector">
 								<label class="control-label">Time Period:</label><br>
 								<input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
 								<input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
 							</form>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-md-6">
 			<div class="widget widget-blue">
 				<div class="widget-title">
 					<div class="widget-controls">
 						<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 						<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 							<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 								<li class="dropdown-header">Set Widget Color</li>
 								<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 								<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 								<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 								<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 								<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 							</ul>
 						</div>
 						<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 						<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 						<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 					</div>
 					<h3><i class="fa fa-user"></i> Users List</h3>
 				</div>
 				<div class="widget-content">
 					<ul class="users-list">
 						<li>
 							<div class="row">
 								<div class="col-xs-2">
 									<div class="avatar">
 										<img src="assets/images/avatar-small.jpg" alt="">
 									</div>
 								</div>
 								<div class="col-xs-10">
 									<span class="label label-success pull-right">Active</span>
 									<h4>John Mayers</h4>
 									<p>Chief Executive Officer</p>
 								</div>
 							</div>
 						</li>
 						<li>
 							<div class="row">
 								<div class="col-xs-2">
 									<div class="avatar">
 										<img src="assets/images/avatar-small.jpg" alt="">
 									</div>
 								</div>
 								<div class="col-xs-10">
 									<span class="label label-warning pull-right">Deactivated</span>
 									<h4>John Mayers</h4>
 									<p>Chief Executive Officer</p>
 								</div>
 							</div>
 						</li>
 						<li>
 							<div class="row">
 								<div class="col-xs-2">
 									<div class="avatar">
 										<img src="assets/images/avatar-small.jpg" alt="">
 									</div>
 								</div>
 								<div class="col-xs-10">
 									<span class="label label-success pull-right">Active</span>
 									<h4>John Mayers</h4>
 									<p>Chief Executive Officer</p>
 								</div>
 							</div>
 						</li>
 						<li>
 							<div class="row">
 								<div class="col-xs-2">
 									<div class="avatar">
 										<img src="assets/images/avatar-small.jpg" alt="">
 									</div>
 								</div>
 								<div class="col-xs-10">
 									<span class="label label-success pull-right">Active</span>
 									<h4>John Mayers</h4>
 									<p>Chief Executive Officer</p>
 								</div>
 							</div>
 						</li>
 						<li>
 							<div class="row">
 								<div class="col-xs-2">
 									<div class="avatar">
 										<img src="assets/images/avatar-small.jpg" alt="">
 									</div>
 								</div>
 								<div class="col-xs-10">
 									<span class="label label-success pull-right">Active</span>
 									<h4>John Mayers</h4>
 									<p>Chief Executive Officer</p>
 								</div>
 							</div>
 						</li>
 					</ul>
 				</div>
 			</div>
 		</div>
 		<div class="col-md-6">
 			<div class="widget widget-red">
 				<span class="offset_anchor" id="widget_tasks_list"></span>
 				<div class="widget-title">
 					<div class="widget-controls">
 						<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 						<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 							<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 								<li class="dropdown-header">Set Widget Color</li>
 								<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 								<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 								<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 								<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 								<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 							</ul>
 						</div>
 						<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 						<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 						<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 					</div>
 					<h3><i class="fa fa-tasks"></i> Tasks List</h3>
 				</div>
 				<div class="widget-content">
 					<ul class="tasks-list">
 						<li>
 							<div class="label label-warning">Nov 2</div>
 							<div class="checkbox">
 								<label>
 									<input type="checkbox"> Do some clean up for the party
 								</label>
 							</div>
 						</li>
 						<li>
 							<div class="label label-danger">Oct 12</div>
 							<div class="checkbox">
 								<label>
 									<input type="checkbox"> Wrap presents for Christmas
 								</label>
 							</div>
 						</li>
 						<li>
 							<div class="label label-danger">Dec 15</div>
 							<div class="checkbox">
 								<label>
 									<input type="checkbox"> Finish the coding for the upcoming project
 								</label>
 							</div>
 						</li>
 						<li>
 							<div class="label label-danger">Jul 2</div>
 							<div class="checkbox">
 								<label>
 									<input type="checkbox"> Buy milk and cookies for breakfast tomorrow
 								</label>
 							</div>
 						</li>
 						<li class="task-done">
 							<div class="label label-warning">Oct 22</div>
 							<div class="checkbox">
 								<label>
 									<input type="checkbox" checked> Send the stroller back to amazon because it's broken
 								</label>
 							</div>
 						</li>
 						<li class="task-done">
 							<div class="label label-warning">Aug 3</div>
 							<div class="checkbox">
 								<label>
 									<input type="checkbox" checked> Update the code for the version that was broken
 								</label>
 							</div>
 						</li>
 						<li>
 							<div class="label label-danger">Feb 24</div>
 							<div class="checkbox">
 								<label>
 									<input type="checkbox"> Water the plant before I go to vacation
 								</label>
 							</div>
 						</li>
 					</ul>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-md-12">
 			<div class="widget widget-blue">
 				<span class="offset_anchor" id="widget_real_time_chart"></span>
 				<div class="widget-title">
 					<div class="widget-controls">
 						<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 						<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 							<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 								<li class="dropdown-header">Set Widget Color</li>
 								<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 								<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 								<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 								<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 								<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 							</ul>
 						</div>
 						<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 						<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 						<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 					</div>
 					<h3><i class="fa fa-signal"></i> Real Time Chart</h3>
 				</div>
 				<div class="widget-content">
 					<div class="row">
 						<div class="col-md-4">
 							<div class="big-legend-w shadow-right">
 								<div class="legend-label">Pageviews</div>
 								<div class="legend-value" id="plot-chart-value">15</div>
 								<div class="stacked-bar">
 									<div class="bar-value bar-value-color-red visible-tooltip" style="width: 35%" data-toggle="tooltip" data-placement="top" data-original-title="Safari"></div>
 									<div class="bar-value bar-value-color-orange" style="width: 10%" data-toggle="tooltip" data-placement="top" data-original-title="Opera"></div>
 									<div class="bar-value bar-value-color-green" style="width: 30%" data-toggle="tooltip" data-placement="top" data-original-title="Firefox"></div>
 									<div class="bar-value bar-value-color-blue" style="width: 25%" data-toggle="tooltip" data-placement="top" data-original-title="Chrome"></div>
 								</div>
 								<div class="legend-sub-label">Total number of pageviews</div>
 							</div>
 						</div>
 						<div class="col-md-8">
 							<div id="placeholder" style="height: 250px;"></div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-md-6">
 			<div class="widget widget-green">
 				<span class="offset_anchor" id="widget_server_activity"></span>
 				<div class="widget-title">
 					<div class="widget-controls">
 						<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 						<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 							<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 								<li class="dropdown-header">Set Widget Color</li>
 								<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 								<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 								<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 								<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 								<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 							</ul>
 						</div>
 						<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 						<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 						<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 					</div>
 					<h3><i class="fa fa-warning"></i> Server Activity</h3>
 				</div>
 				<div class="widget-content">
 					<ul class="activity-list">
 						<li>
 							<div class="row">
 								<div class="col-xs-9"><p><i class="fa fa-bell activity-image"></i> You have 5 pending alerts for account</p></div>
 								<div class="col-xs-3 text-right"><span class="activity-time">5 min</span></div>
 							</div>
 						</li>
 						<li>
 							<div class="row">
 								<div class="col-xs-9"><p><i class="fa fa-fire activity-image"></i> Server crash happened <span class="label label-danger">warning</span></p></div>
 								<div class="col-xs-3 text-right"><span class="activity-time">8 min</span></div>
 							</div>
 						</li>
 						<li>
 							<div class="row">
 								<div class="col-xs-9"><p><i class="fa fa-flag-o activity-image"></i> You have 5 pending alerts for account</p></div>
 								<div class="col-xs-3 text-right"><span class="activity-time">12 min</span></div>
 							</div>
 						</li>
 						<li>
 							<div class="row">
 								<div class="col-xs-9"><p><i class="fa fa-smile-o activity-image"></i> New user registration <span class="label label-success">great</span></p></div>
 								<div class="col-xs-3 text-right"><span class="activity-time">15 min</span></div>
 							</div>
 						</li>
 						<li>
 							<div class="row">
 								<div class="col-xs-9"><p><i class="fa fa-bell activity-image"></i> You have 5 pending alerts for account</p></div>
 								<div class="col-xs-3 text-right"><span class="activity-time">25 min</span></div>
 							</div>
 						</li>
 					</ul>
 				</div>
 			</div>
 		</div>

 		<div class="col-md-6">
 			<div class="widget widget-blue">
 				<div class="widget-title">
 					<div class="widget-controls">
 						<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 						<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 							<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 								<li class="dropdown-header">Set Widget Color</li>
 								<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 								<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 								<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 								<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 								<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 							</ul>
 						</div>
 						<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 						<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 						<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 					</div>
 					<h3><i class="fa fa-comments"></i> User Chat</h3>
 				</div>
 				<div class="widget-content">
 					<ul class="chat-messages-list">
 						<li>
 							<div class="row">
 								<div class="col-xs-2">
 									<div class="avatar">
 										<img src="assets/images/avatar-small.jpg" alt="">
 									</div>
 								</div>
 								<div class="col-xs-10">
 									<div class="chat-bubble chat-bubble-right">
 										<div class="bubble-arrow"></div>
 										<div class="meta-info"><a href="#">Andres Iniesta</a> on Jun 25</div>
 										<p>Collaboratively administrate empowered markets via plug-and-play networks.</p>
 									</div>
 								</div>
 							</div>
 						</li>
 						<li>
 							<div class="row">
 								<div class="col-xs-10">
 									<div class="chat-bubble chat-bubble-left">
 										<div class="bubble-arrow"></div>
 										<div class="meta-info"><a href="#">Andres Iniesta</a> on Jun 25</div>
 										<p>Collaboratively administrate empowered markets via plug-and-play networks.</p>
 									</div>
 								</div>
 								<div class="col-xs-2">
 									<div class="avatar">
 										<img src="assets/images/avatar-small.jpg" alt="">
 									</div>
 								</div>
 							</div>
 						</li>
 						<li>
 							<div class="row">
 								<div class="col-xs-2">
 									<div class="avatar">
 										<img src="assets/images/avatar-small.jpg" alt="">
 									</div>
 								</div>
 								<div class="col-xs-10">
 									<div class="chat-bubble chat-bubble-right">
 										<div class="bubble-arrow"></div>
 										<div class="meta-info"><a href="#">Andres Iniesta</a> on Jun 25</div>
 										<p>Collaboratively administrate empowered markets via plug-and-play networks.</p>
 									</div>
 								</div>
 							</div>
 						</li>
 					</ul>
 					<div class="widget-foot">
 						<div class="create-chat-message-w">
 							<div class="input-group">
 								<input type="text" class="form-control" placeholder="Your message here...">
 								<span class="input-group-btn">
 									<button class="btn btn-primary" type="button">Send</button>
 								</span>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="widget widget-green">
 		<span class="offset_anchor" id="stat_charts_anchor"></span>
 		<div class="widget-title">
 			<div class="widget-controls">
 				<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 				<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 				<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 				<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 					<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 						<li class="dropdown-header">Set Widget Color</li>
 						<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 						<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 						<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 						<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 						<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 					</ul>
 				</div>
 				<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 				<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 				<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 			</div>
 			<h3><i class="fa fa-bar-chart-o"></i> Statistics</h3>
 		</div>
 		<div class="widget-content">
 			<div class="row">
 				<div class="col-lg-3 col-md-4 col-sm-6 text-center">
 					<div class="widget-content-blue-wrapper changed-up">
 						<div class="widget-content-blue-inner padded">
 							<div class="pre-value-block"><i class="fa fa-dashboard"></i> Total Visits</div>
 							<div class="value-block">
 								<div class="value-self">10,520</div>
 								<div class="value-sub">This Week</div>
 							</div>
 							<span class="dynamicsparkline">Loading..</span>
 						</div>
 					</div>
 				</div>
 				<div class="col-lg-3 col-md-4 col-sm-6 text-center">
 					<div class="widget-content-blue-wrapper changed-up">
 						<div class="widget-content-blue-inner padded">
 							<div class="pre-value-block"><i class="fa fa-user"></i> New Users</div>
 							<div class="value-block">
 								<div class="value-self">1,120</div>
 								<div class="value-sub">This Month</div>
 							</div>
 							<span class="dynamicsparkline">Loading..</span>
 						</div>
 					</div>
 				</div>
 				<div class="col-lg-3 col-md-4 col-sm-6 text-center hidden-md">
 					<div class="widget-content-blue-wrapper changed-up">
 						<div class="widget-content-blue-inner padded">
 							<div class="pre-value-block"><i class="fa fa-sign-in"></i> Sold Items</div>
 							<div class="value-block">
 								<div class="value-self">275</div>
 								<div class="value-sub">This Week</div>
 							</div>
 							<span class="dynamicsparkline">Loading..</span>
 						</div>
 					</div>
 				</div>
 				<div class="col-lg-3 col-md-4 col-sm-6 text-center">
 					<div class="widget-content-blue-wrapper changed-up">
 						<div class="widget-content-blue-inner padded">
 							<div class="pre-value-block"><i class="fa fa-money"></i> Net Profit</div>
 							<div class="value-block">
 								<div class="value-self">$9,240</div>
 								<div class="value-sub">Yesterday</div>
 							</div>
 							<span class="dynamicbars">Loading..</span>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-md-8">
 			<div class="widget widget-blue">
 				<span class="offset_anchor" id="widget_calendar"></span>
 				<div class="widget-title">
 					<div class="widget-controls">
 						<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 						<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 							<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 								<li class="dropdown-header">Set Widget Color</li>
 								<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 								<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 								<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 								<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 								<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 							</ul>
 						</div>
 						<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 						<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 						<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 					</div>
 					<h3><i class="fa fa-calendar"></i> Calendar</h3>
 				</div>
 				<div class="widget-content">
 					<div id="calendar"></div>
 				</div>
 			</div>
 		</div>
 		<div class="col-md-4">
 			<div class="widget widget-red">
 				<div class="widget-title">
 					<div class="widget-controls">
 						<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 						<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 						<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 							<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 								<li class="dropdown-header">Set Widget Color</li>
 								<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 								<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 								<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 								<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 								<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 							</ul>
 						</div>
 						<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 						<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 						<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 					</div>
 					<h3><i class="fa fa-bullseye"></i> Pie Chart</h3>
 				</div>
 				<div class="widget-content">
 					<div id="piechart" style=""></div>
 					<table class="table table-bordered" id="topsellers_table">
 						<thead>
 							<tr>
 								<th>Product</th>
 								<th>Qty</th>
 								<th>Price</th>
 							</tr>
 						</thead>
 						<tbody>
 							<tr>
 								<td>Floor Lamp</td>
 								<td>2</td>
 								<td>3</td>
 							</tr>
 							<tr>
 								<td>Coffee Mug</td>
 								<td>4</td>
 								<td>7</td>
 							</tr>
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="widget widget-bordered">
 		<div class="widget-title bottom-margin">
 			<div class="widget-controls">
 				<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
 				<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
 				<a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
 				<div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
 					<ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
 						<li class="dropdown-header">Set Widget Color</li>
 						<li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
 						<li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
 						<li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
 						<li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
 						<li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
 					</ul>
 				</div>
 				<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
 				<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
 				<a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
 			</div>
 			<h3><i class="fa fa-bullseye"></i> Circular Charts</h3>
 		</div>
 		<div class="widget-content">
 			<div class="row bottom-margin">
 				<div class="col-lg-3 col-md-4 col-sm-6 text-center">
 					<input type="text" value="75" class="knob" data-fgColor="#df6064" data-linecap="round" data-width="150">
 				</div>
 				<div class="col-lg-3 hidden-md col-sm-6 text-center">
 					<input type="text" value="65" class="knob" data-fgColor="#8963ac" data-linecap="round" data-width="150">
 				</div>
 				<div class="col-lg-3 col-md-4 col-sm-6 text-center">
 					<input type="text" value="85" class="knob" data-fgColor="#61a9dc" data-linecap="round" data-width="150">
 				</div>
 				<div class="col-lg-3 col-md-4 col-sm-6 text-center">
 					<input type="text" value="68" class="knob" data-fgColor="#71c280" data-linecap="round" data-width="150">
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-md-12">
 			<span class="offset_anchor" id="widget_tabs"></span>
 			<ul class="nav nav-tabs">
 				<li class="active"><a href="#tab_pie_chart" data-toggle="tab"><i class="fa fa-bullseye"></i> Pie Chart</a></li>
 				<li><a href="#tab_bar_chart" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> Bar Alert</a></li>
 				<li class="hidden-md hidden-xs"><a href="#tab_table" data-toggle="tab"><i class="fa fa-th"></i> Table</a></li>
 			</ul>
 			<div class="tab-content bottom-margin">
 				<div class="tab-pane active" id="tab_pie_chart">
 					<div class="shadowed-bottom">
 						<div class="row">
 							<div class="col-lg-3 col-md-4 col-sm-3 bordered">
 								<div class="value-block padded-left text-center">
 									<div class="value-self">520</div>
 									<div class="value-sub">Total Sales</div>
 								</div>
 							</div>
 							<div class="col-lg-3 col-sm-3 bordered hidden-md">
 								<div class="value-block text-center">
 									<div class="value-self">1,120</div>
 									<div class="value-sub">Total Visitors</div>
 								</div>
 							</div>
 							<div class="col-lg-6 col-md-8 col-sm-6">
 								<form class="form-inline form-period-selector">
 									<label class="control-label">Time Period:</label><br>
 									<input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
 									<input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
 								</form>
 							</div>
 						</div>
 					</div>
 					<div class="padded">
 						<div id="topsellers_barchart"></div>
 					</div>
 				</div>
 				<div class="tab-pane" id="tab_bar_chart">
 					<div class="shadowed-bottom">
 						<div class="row">
 							<div class="col-md-3 bordered">
 								<div class="value-block padded-left text-center">
 									<div class="value-self">256</div>
 									<div class="value-sub">Total Sales</div>
 								</div>
 							</div>
 							<div class="col-lg-3 bordered hidden-md">
 								<div class="value-block text-center">
 									<div class="value-self">3,420</div>
 									<div class="value-sub">Total Visitors</div>
 								</div>
 							</div>
 							<div class="col-lg-6 col-md-9">
 								<form class="form-inline form-period-selector">
 									<label class="control-label">Time Period:</label><br>
 									<input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
 									<input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
 								</form>
 							</div>
 						</div>
 					</div>
 					<div class="padded">
 						<div class="alert alert-warning">
 							<i class="fa fa-exclamation-circle"></i> <strong>Message example!</strong> This is an example of how to handle a case when there is no data to load for a chart.
 						</div>
 					</div>
 				</div>
 				<div class="tab-pane" id="tab_table">
 					<div class="shadowed-bottom">
 						<div class="row">
 							<div class="col-md-3 bordered">
 								<div class="value-block padded-left text-center">
 									<div class="value-self">112</div>
 									<div class="value-sub">Total Sales</div>
 								</div>
 							</div>
 							<div class="col-lg-3 bordered hidden-md">
 								<div class="value-block text-center">
 									<div class="value-self">2,340</div>
 									<div class="value-sub">Total Visitors</div>
 								</div>
 							</div>
 							<div class="col-lg-6 col-md-9">
 								<form class="form-inline form-period-selector">
 									<label class="control-label">Time Period:</label><br>
 									<input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
 									<input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
 								</form>
 							</div>
 						</div>
 					</div>
 					<div class="padded">
 						<table class="table table-bordered">
 							<thead>
 								<tr>
 									<th>Product</th>
 									<th>Qty</th>
 									<th>Price</th>
 								</tr>
 							</thead>
 							<tbody>
 								<tr>
 									<td>Floor Lamp</td>
 									<td>2</td>
 									<td>3</td>
 								</tr>
 								<tr>
 									<td>Coffee Mug</td>
 									<td>4</td>
 									<td>7</td>
 								</tr>
 								<tr>
 									<td>Television</td>
 									<td>1</td>
 									<td>3</td>
 								</tr>
 								<tr>
 									<td>Red Carpet</td>
 									<td>6</td>
 									<td>5</td>
 								</tr>
 								<tr>
 									<td>Laptop</td>
 									<td>3</td>
 									<td>6</td>
 								</tr>
 							</tbody>
 						</table>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>