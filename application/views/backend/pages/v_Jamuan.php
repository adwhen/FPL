<style type="text/css">
  td{
    height: 120px;
  }
</style>

  <div class="content-wrapper">
    <div class="container">
      <!-- Main content -->
      <section class="content">
        
        <div class="box">
            <div class="box-header">
              <center><h3 class="box-title">Pelayanan Jamuan</h3></center>
            </div>
            <hr>
            <div class="box-header">
              <a class="btn btn-success" href="<?=base_url('index.php/Reception/form')?>">Ajukan Jamuan</a>  
            </div>
            <!-- /.box-header --> 
            <div class="box-body">
              <table id="table-full" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Acara</th>
                  <th>Unit Kerja</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
              <?php $no=1; foreach($data->result() as $dt){ ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td>
                    <?php if($dt->PROCESS=="KIRIM"){
                      echo " <button class='btn-default'>Tunggu Persetujuan</button> - ";
                    }elseif($dt->PROCESS=="APPROVE"){
                       echo " <button class='btn-success'>APPROVED</button> - ";
                    }elseif($dt->PROCESS=="DRAFT"){
                       echo " <button class='btn-default'>DRAFT</button> - ";
                    }else{
                       echo " <button class='btn-danger'>REJECTED</button> - ";
                    } ?>
                    <?=$dt->ACARA_J?></td>
                  <td><?=$dt->UNIT_KERJA_J?></td>
                  <td><?=$dt->DATE_J?></td>
                  <td>
                    <?php if($this->session->userdata('status')==0){ ?>
                      <a href="<?=base_url('index.php/Reception/form/'.$dt->IDX_J)?>" class="btn btn-warning"><i class="fa fa-edit"> Edit</i></a>
                      <a target="_BLANK" href="<?=base_url('index.php/Reception/REC/'.$dt->IDX_J)?>" class="btn btn-primary"><i class="fa fa-file-pdf-o"> PDF</i></a>
                    <?php }else{ ?>
                      <?php if($dt->PROCESS=="KIRIM"){ ?>
                      <a href="#" onclick="pop_up('<?=$dt->IDX_J?>')" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-check"></i></a>
                      <?php }else{ ?>
                              <a target="_BLANK" href="<?=base_url('index.php/Reception/REC/'.$dt->IDX_J)?>" class="btn btn-success"><i class="fa fa-file-pdf-o"> PDF</i></a>
                      <?php } ?>
                    <?php } ?>
                    
                  </td>
                </tr>
              <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Acara</th>
                  <th>Unit Kerja</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>

        <div class="modal fade" id="modal-default" >
          <div class="modal-dialog" style="width:100%;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Persetujuan</h4>
              </div>
              <div class="modal-body col-md-12">
                <div class="col-md-8" id="frame_popup">
                  
                </div>
                <div class="col-md-4">
                  <label><h3>ACTION</h3></label>
                    <div class="form-group">
                      <label>STATUS KIRIM</label>
                      <input type="hidden" name="IDX" id="IDX">
                      <select class="form-control" name="ACTION" id="ACTION">
                        <option value="HOLD">Kembalikan</option>
                        <option value="PASS">Setujui</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>KOMENTAR</label>
                      <textarea name="KOMENTAR" id="KOMENTAR" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary" type="button" onclick="save_pel(IDX.value)">SUBMIT</button>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<script type="text/javascript">
  function pop_up(IDX){
    var url = '<?=base_url('index.php/Reception/REC_Approve/')?>'
    $("#frame_popup").html('<iframe style="height:700px;width: 100%;" src="'+url+'/'+IDX+'"></iframe>')
    $("#IDX").val(IDX)
  }
  function save_pel(idx){
    var status=$("#ACTION").val()
    var komentar = $("#KOMENTAR").val()
    $.post('<?=base_url('index.php/Reception/approval/')?>',{IDX:idx,KOMENTAR:komentar,STATUS:status},
      function(data){
        if(data.trim()=="OK"){
          Swal.fire({
            icon: 'success',
            title: 'Data Berhasil di Proses',
            showConfirmButton: false,
            timer: 1500
          })
          window.open('<?=base_url()?>index.php/Reception','_self');

        }else{
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