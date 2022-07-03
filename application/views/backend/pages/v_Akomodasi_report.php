<style type="text/css">
    td {
        height: 120px;
    }

    #CanvasID {
        width: 500px;
    }

    .tengah {
        padding: 0 25% 0 25%;
    }
</style>

<div class="content-wrapper">
    <div class="container">
        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header">
                    <center>
                        <h3 class="box-title">Akomodasi SPPD <b>#REPORT</b></h3>

                    </center>
                </div>
                <hr>
                <!-- /.box-header -->
                <div class="box-body tengah">
                    <form target="_blank" action="<?= base_url('index.php/Accomodation/excel') ?>">
                        <div class="form-group">
                            <label>START</label>
                            <input type="date" name="START" id="START" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>FINISH</label>
                            <input type="date" name="FINISH" id="FINISH" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button>submit</button>
                        </div>

                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    <center>
                        <h3 class="box-title">Akomodasi SPPD <B>#DIAGRAM</B></h3>
                    </center>
                </div>
                <hr>
                <!-- /.box-header -->
                <div class="box-body">
                    <center>
                        <div id="CanvasID">
                            <canvas id="myChart"></canvas>
                        </div>
                    </center>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const labels = [
        <?php foreach ($report_uk as $rp) : ?> '<?= $rp->NAMA_UK ?>', <?php endforeach; ?>
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: ['crimson', 'navy', 'tosca', 'orange'],
            borderColor: 'white',
            data: [<?php foreach ($report_uk as $rp) : ?> '<?= $rp->JUMLAH ?>', <?php endforeach; ?>],
        }]
    };

    const config = {
        type: 'pie',
        data: data,
        options: {}
    };
</script>
<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>