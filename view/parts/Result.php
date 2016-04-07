<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $this->view;?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Дата</th>
									<th>Сообщение</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($this->result as $date => $message) { ?>
									<tr class="odd">
										<td><a href="index.php?view=Currency&date=<?php echo $date;?>"><?php echo $date;?></a></td>
										<td><?php echo $message;?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>
<!-- /#page-wrapper -->
