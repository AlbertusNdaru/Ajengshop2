<div class="content-wrapper"  style="margin-left: 0px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <?php echo form_open_multipart('product/edit'); ?>
                            <input type="hidden" name="id" value="<?php echo $record->id_barang?>">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input id="inputnamabarang" class="form-control" name="nama_barang" placeholder="Nama barang" value="<?php echo $record->nama_barang?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select id="inputkategori" name="kategori" class="form-control">
                                    <?php foreach ($kategori as $k) {
                                            echo "<option value='$k->id_kategori'";
                                            echo $record->jenis_barang==$k->jenis_barang?'selected':'';
                                            echo">$k->jenis_barang</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input id="inputmerk" class="form-control" name="merk" placeholder="Merk" value="<?php echo $record->merk?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input required onkeypress='validate(event)' onchange="validateharga()"  id="inputharga" class="form-control" name="harga" placeholder="Harga" value="<?php echo $record->harga?>" >
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="number" class="form-control" name="stok" min="1" value='<?php echo $record->stok?>' required>
                                </div>
                                <div class="form-group">
                                    <label>Upload Foto</label>
                                    <input id="inputfoto" multiple='multiple' accept="image/x-png,image/gif,image/jpeg" type="file" class="form-control" name="berkas[]" placeholder="upload">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select id="inputstatus" name="status" class="form-control" required>
                                    <option value='bestseller'>Best Seller</option>
                                    <option value='sale'>Sale</option>
                                    </select>
                                </div>
                                <button type="submit" id="btnsimpanbarang" name="submit" class="btn btn-primary btn-sm" >Update</button> | 
                                <?php echo anchor('barang','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                           </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
function validateharga() {


  


    var hargajual=parseInt($('#inputhargajual').val());
    if(hargajual<=10)
    {
        alert('<?php echo get_current_date()?>')
        $('#btnsimpanbarang').attr("disabled",'disabled');
      
    }
    else
    {
        $('#btnsimpanbarang').removeAttr('disabled');
    }
}
</script>