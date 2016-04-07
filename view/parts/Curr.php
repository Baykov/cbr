        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Курс валют рубль/<?php echo $this->result['list'][0]['Nominal'] .' '. $this->result['list'][0]['CurName'];?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Сегодняшний курс рубль/<?php echo $this->result['list'][0]['Nominal'] .' '. $this->result['list'][0]['CurName'];?> 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php echo $this->result['today'][2];?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            История курса рубль/<?php echo $this->result['list'][0]['Nominal'] .' '. $this->result['list'][0]['CurName'];?> за последние 30 дней
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        </div>
     <!-- Morris Charts JavaScript -->
    <script src="../view/bower_components/raphael/raphael-min.js"></script>
    <script src="../view/bower_components/morrisjs/morris.min.js"></script>
<script>
    Morris.Area({
        element: 'morris-area-chart',
        data: [<?php foreach($this->result['list'] as $i=>$curr_data){
				echo "{period: '".$curr_data['Date']."',course: ".str_replace(',', '.', $curr_data['Value'])."}";
				if($i!==(count($this->result['list'])-1)){echo ',';}
					$i++;}?>],
        xkey: 'period',
        ykeys: ['course'],
        labels: ['Курс'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });
</script>

