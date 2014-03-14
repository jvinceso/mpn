<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/administrador/trabajador/trabajador_panel.js'></script>
<div class="page-header">
	<h1>
		<?php echo $aplicacion; ?>
		<small>
			<i class="icon-double-angle-right"></i>
			<?php echo $objeto; ?>
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- codigo propio del cuerpo -->


		<div class="tabbable tabs-left">
			<ul class="nav nav-tabs" id="myTab3">
				<li class="active">
					<a data-toggle="tab" href="#home3">
						<i class="pink icon-dashboard bigger-110"></i>
						Registrar
					</a>
				</li>

				<li>
					<a id="tb_lista_trabajador" data-toggle="tab" href="#profile3">
						<i class="blue icon-user bigger-110"></i>
						Listado
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div id="home3" class="tab-pane in active">
					
					<?php $this->load->view('administrador/trabajador/ins_view'); ?>						
					
				</div>

				<div id="profile3" class="tab-pane">
					<p>				
						<form class="form-horizontal" >
							<div class="row">
								<div class="col-xs-12 col-sm-5">
									<div class="input-group">
										<input type="text" class="form-control search-query" placeholder="Ingrese el nombre del módulo" />
										<span class="input-group-btn">
											<button type="button" class="btn btn-purple btn-sm">
												Buscar
												<i class="icon-search icon-on-right bigger-110"></i>
											</button>
										</span>
									</div>
								</div>
							</div>
						</form>	
					</p>
					<p>
						<div class="table-responsive">
							<table id="sample-table-2" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th class="center">
											<label>
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</th>
										<th>Domain</th>
										<th>Price</th>
										<th class="hidden-480">Clicks</th>

										<th>
											<i class="icon-time bigger-110 hidden-480"></i>
											Update
										</th>
										<th class="hidden-480">Status</th>

										<th></th>
									</tr>
								</thead>

								<tbody>

									<tr>
										<td class="center">
											<label>
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</td>

										<td>
											<a href="#">right.com</a>
										</td>
										<td>$50</td>
										<td class="hidden-480">4,400</td>
										<td>Apr 01</td>

										<td class="hidden-480">
											<span class="label label-sm label-warning">Expiring</span>
										</td>

										<td>
											<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
												<a class="blue" href="#">
													<i class="icon-zoom-in bigger-130"></i>
												</a>

												<a class="green" href="#">
													<i class="icon-pencil bigger-130"></i>
												</a>

												<a class="red" href="#">
													<i class="icon-trash bigger-130"></i>
												</a>
											</div>

											<div class="visible-xs visible-sm hidden-md hidden-lg">
												<div class="inline position-relative">
													<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
														<i class="icon-caret-down icon-only bigger-120"></i>
													</button>

													<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
														<li>
															<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																<span class="blue">
																	<i class="icon-zoom-in bigger-120"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																<span class="green">
																	<i class="icon-edit bigger-120"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																<span class="red">
																	<i class="icon-trash bigger-120"></i>
																</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</td>
									</tr>

									<tr>
										<td class="center">
											<label>
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</td>

										<td>
											<a href="#">once.com</a>
										</td>
										<td>$20</td>
										<td class="hidden-480">1,400</td>
										<td>Apr 04</td>

										<td class="hidden-480">
											<span class="label label-sm label-info arrowed arrowed-righ">Sold</span>
										</td>

										<td>
											<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
												<a class="blue" href="#">
													<i class="icon-zoom-in bigger-130"></i>
												</a>

												<a class="green" href="#">
													<i class="icon-pencil bigger-130"></i>
												</a>

												<a class="red" href="#">
													<i class="icon-trash bigger-130"></i>
												</a>
											</div>

											<div class="visible-xs visible-sm hidden-md hidden-lg">
												<div class="inline position-relative">
													<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
														<i class="icon-caret-down icon-only bigger-120"></i>
													</button>

													<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
														<li>
															<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																<span class="blue">
																	<i class="icon-zoom-in bigger-120"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																<span class="green">
																	<i class="icon-edit bigger-120"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																<span class="red">
																	<i class="icon-trash bigger-120"></i>
																</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</p>
				</div>
			</div>
		</div>



		<!-- fin codigo propio del cuerpo -->
	</div>			

</div>
