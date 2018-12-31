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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Harga</th>
                    <th style="text-align:center">Stok</th>
                    <th>Foto<th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = $this->uri->segment('3');
                    foreach ($record->result() as $r) { ?>
                        <tr class="gradeU">
                            <td><?php echo $r->nama_barang ?></td>
                            <td><?php echo $r->jenis_barang ?></td>
                            <td>Rp. <?php echo number_format($r->harga,2) ?></td>
                            <td style="text-align:center"><?php echo $r->stok ?></td>
                            <td><img src="<?php echo base_url('assets/img_product/').$r->foto; ?>" width="60" height="80p"></td>
                            <td class="center">
                                <?php echo anchor('product/edit/'.$r->id_barang,'Edit','class="btn btn-primary"'); ?> 
                                <?php echo anchor('product/delete/'.$r->id_barang,'Delete','class="btn btn-danger"'); ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  

