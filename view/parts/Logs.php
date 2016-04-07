<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $this->view;?></h1>
		</div>
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo $this->view;?>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Запрос</th>
									<th>Ответ</th>
									<th>Время выполнения запроса</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($this->result as $i => $log) { ?>
									<tr class="odd">
										<td><?php echo $log['request'];?></td>
										<td><?php echo implode(' , ', json_decode($log['code_answer']));?></td>
										<td><?php echo (float)$log['date_response'] - (float)$log['date_request'];?></td>
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
<!-- DataTables JavaScript -->
<script src="../view/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../view/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});
</script>