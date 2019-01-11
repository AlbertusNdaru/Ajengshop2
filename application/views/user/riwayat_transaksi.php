

    <!-- Main content -->
    <section class="content" style="margin-top: 20px;">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header" align="center">
              <h3 class="box-title">Riwayat Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered">
                <thead>
                <tr>
                    <th style=' text-align:center;'>Tanggal Transaksi</th>
                    <th style=' text-align:center;'>Nomor Transaksi</th>
                    <th style=' text-align:center;'>Total Transaksi</th>
                    <th style=' text-align:center;'>Detail Transaksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = $this->uri->segment('3');
                    foreach ($record->result() as $r) { ?>
                        <tr class="gradeU">
                            <td style=' text-align:center;'><?php echo $r->tgl ?></td>
                            <td style=' text-align:center;'><?php echo $r->id_transaksi ?></td>
                            <td style=' text-align:center;'>Rp. <?php echo number_format($r->total_bayar,2) ?></td>
                            <td style="text-align:center">
                              <button type="button" class="btn btn-success" onclick="detailtransaksimember('<?php echo $r->id_transaksi?>')">Detail Transaksi</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div align="center">
						<?php
						echo $this->pagination->create_links();
						
						?>
            </div>
        </div><!-- /.col -->

        <div class="col-md-6">
          <div class="box">
            <div class="box-header" align="center">
              <h3 class="box-title">Detail Transaksi </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered">
                <thead>
                <tr>
                        <th style=' text-align:center;'>Nomer</th>
                        <th style=' text-align:center;'>Nama Barang</th>
                        <th style=' text-align:center;'>Harga</th>
                        <th style=' text-align:center;'>Jumlah</th>
                        <th style=' text-align:center;'>Total</th>
                </tr>
                </thead>
                <tbody id="detailnya">
                   
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div align="center">
						<?php
						echo $this->pagination->create_links();
						
						?>
            </div>
        </div><!-- /.col -->
       </div><!-- /.row -->
      
    </section>
    <!-- /.content -->
  
  <script>
    function detailtransaksimember(id)
{
  $.ajax({
        url:"<?php echo base_url('transaksi/getdetailtransaksi_byid');?>",
        type : "post",
        data : {id:id},
        success : function(data)
        {
        
          var result = $.parseJSON(data);
          console.log(result);
          $("#detailnya").empty();
          var a=1;
          for(var i=0; i<result.length; i++)
          {
            $("#detailnya").append(
                        "<tr style='color:black;' >"+
                            "<td style=' text-align:center;'>"+result[i]['id_transaksi']+"</td>"+
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
  </script>