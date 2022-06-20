<style type="text/css">
    td {
        height: 120px;
    }
</style>

<div class="content-wrapper">
    <div class="container">
        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header">
                    <center>
                        <h3 class="box-title">Pelayanan Umum</h3>
                    </center>
                </div>
                <hr>
                <div class="box-header">
                    <!-- <a class="btn btn-success" href="<?= base_url('index.php/Loan/form') ?>">Ajukan Peminjaman</a> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
</div>



<script type="text/javascript">
    function pop_up(IDX) {
        var url = '<?= base_url('index.php/Loan/REC_Approve/') ?>'
        $("#frame_popup").html('<iframe style="height:700px;width: 100%;" src="' + url + '/' + IDX + '"></iframe>')
        $("#IDX").val(IDX)
    }

    function save_pel(idx) {
        var status = $("#ACTION").val()
        var komentar = $("#KOMENTAR").val()
        $.post('<?= base_url('index.php/Loan/approval/') ?>', {
                IDX: idx,
                KOMENTAR: komentar,
                STATUS: status
            },
            function(data) {
                if (data.trim() == "OK") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Berhasil di Proses',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.open('<?= base_url() ?>index.php/Loan', '_self');

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Terjadi Kesalahan, silahkan coba kembali',
                        footer: 'atau hubungi Administrator'
                    })
                }
            })

    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    };

    const config = {
        type: 'line',
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