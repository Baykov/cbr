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
					<div class="row">
						<div class="col-lg-6">
							<form role="form" action="/index.php?view=Result" method="get">
								<div class="form-group">
									<label>Выберите дату для парсинга курсов валют</label>
									<input class="form-control" id="datepicker" name="date">
									<p class="help-block">Можно выбирать любой из дней за последние 30 дней.</p>
									<p class="alert alert-danger hidden" id="alert_date">Если дата не выбрана - берутся данные за последние 30 дней.</p>
								</div>
								<input type="hidden" name="view" value="Result"/>
								<button type="submit" class="btn btn-default">Submit Button</button>
								<button type="reset" class="btn btn-default">Reset Button</button>
							</form>
						</div>
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
<!-- Datepicker for Bootstrap -->
<script src="../view/js/bootstrap-datepicker.min.js"></script>
<script>
	$(document).ready(function() {
		$('#datepicker').datepicker({
			format: 'dd/mm/yyyy',
			startDate: '-30d',
			endDate: '+0d'
		});
	});
</script>