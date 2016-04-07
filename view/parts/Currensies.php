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
				<div class="panel-heading">
					<?php echo $this->view;?>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>NumCode</th>
									<th>Name</th>
									<th>CharCode</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($this->result as $i => $cyrr) { ?>
									<tr class="odd">
										<td><?php echo $cyrr->NumCode;?></td>
										<td><a href="index.php?view=Curr&id=<?php echo $cyrr->NumCode;?>"><?php echo $cyrr->Name;?></a></td>
										<td><?php echo $cyrr->CharCode;?></td>
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