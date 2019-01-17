<section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered">
                <thead>
                <tr>
                    <th style=' text-align:center;'>ID Pembeli</th>
                    <th style=' text-align:center;'>Tanggal Transaksi</th>
                    <th style=' text-align:center;'>Nomor Transaksi</th>
                    <th style=' text-align:center;'>Nama Pembeli</th>
                    <th style=' text-align:center;'>Total Transaksi</th>
                    <th style=' text-align:center;'>Detail Transaksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = $this->uri->segment('3');
                    foreach ($record as $r) { ?>
                        <tr class="gradeU">
                            <td style=' text-align:center;'><?php echo $r->id_member ?></td>
                            <td style=' text-align:center;'><?php echo $r->tgl ?></td>
                            <td style=' text-align:center;'><?php echo $r->id_transaksi ?></td>
                            <td style=' text-align:center;'><?php echo $r->nama_member ?></td>
                            <td style=' text-align:center;'>Rp. <?php echo number_format($r->total_bayar,2) ?></td>
                            <td style="text-align:center">
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-primary" onclick="detailtransaksi('<?php echo $r->id_transaksi?>')">Detail Transaksi</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
              <?php if ($_SESSION['userdata']->level == 2) {?>
                  <div class="text-center" id="superadminclear">
                      <button type="button" class="btn btn-success" onclick="clearTransaksi()">Clear Transaksi</button>
                  </div>
              <?php }?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div align="center">
						<?php
						echo $this->pagination->create_links();
						
						?>
					</div>
          
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
    <div class="modal modal-primary fade" id="modal-primary">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Transaksi</h4>
              </div>
              <div class="modal-body">
              <div class="table-responsive" style="border: 2px solid black;">
                                    <table class="table table-striped table-bordered" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th style=' text-align:center;'>Nomer</th>
                                                <th style=' text-align:center;'>Nama Barang</th>
                                                <th style=' text-align:center;'>Harga</th>
                                                <th style=' text-align:center;'>Jumlah</th>
                                                <th style=' text-align:center;'>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="modaltrans" >
                                       
                                        </tbody>
                                    </table>
                                </div>
                            <div >     

                            </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
          
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

  <script>
    function detailtransaksi(id)
{
  $.ajax({
        url:"<?php echo base_url('transaksi/getdetailtransaksi_byid');?>",
        type : "post",
        data : {id:id},
        success : function(data)
        {
        
          var result = $.parseJSON(data);
          $("#modaltrans").empty();
          var a=1;
          for(var i=0; i<result.length; i++)
          {
            $("#modaltrans").append(
                        "<tr style='color:black;' >"+
                            "<td style=' text-align:center;'>"+a+"</td>"+
                            "<td style=' text-align:center;'>"+result[i]['nama_barang']+"</td>"+
                            "<td style=' text-align:right;'>Rp "+result[i]['harga']+"</td>"+
                            "<td style=' text-align:center;'>"+result[i]['jumlah']+"</td>"+
                            "<td style=' text-align:right;'>Rp "+(result[i]['harga']*result[i]['jumlah'])+"</td>"+
                        "</tr>"
                );
                a++;
          }
        }
    });

}

 function clearTransaksi()
{
  window.location="<?php echo base_url()?>transaksi/clearrecordtransaksi";
}
  </script>